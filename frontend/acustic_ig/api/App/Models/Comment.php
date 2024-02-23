<?php

namespace App\Models;

use Framework\PDOStatement;
use Framework\Session;
use App\Controllers\ErrorController;

class Comment extends Model {
  public function __construct() {
    parent::__construct("comments");
  }

  public function getAll(): array {
    $query = "
        SELECT comments.*, json_build_object('tag', users.tag, 'id', users.id, 'profile_pic', users.profile_pic) AS author
        FROM comments
        JOIN users
        ON comments.user_id = users.id
      ";

    if (isset($_GET['type']) && $_GET['type'] === 'reply') $query = $query . " WHERE reply_to IS NOT NULL";

    $comments = $this->db->query($query)->fetchAll();

    foreach ($comments as $comment) {
      $params = ["commentId" => $comment->id];

      $likeCount = $this->db->query("SELECT COUNT(*) FROM comment_likes WHERE comment_id = :commentId", $params)->fetch();
      $replyCount = $this->db->query("SELECT COUNT(*) FROM comments WHERE reply_to = :commentId", $params)->fetch();

      $comment->likeCount = $likeCount->count;
      $comment->replyCount = $replyCount->count;
    }

    return decodeJSONFromQuery($comments, "author");
  }

  /**
   * Post a comment on a Post. Available for users.
   *
   * @param array $params
   *
   * @return void
   */
  public function commentPost(array $params): void {
    if (!$this->db->query("SELECT * FROM posts WHERE id = :id", $params)->fetch()) ErrorController::notFound("Post not found.");

    $params = ["postId" => $params['id'], "userId" => Session::get("user")->id, "content" => $_POST['content'] ?? null,];

    if (!$params['content']) ErrorController::badRequest("Please provide a content for the comment.");

    $this->db->query("INSERT INTO comments (post_id, user_id, content) VALUES(:postId, :userId, :content)", $params);
  }

  /**
   * Reply to a Comment on a Post. Available for users.
   *
   * @param array $params
   *
   * @return void
   */
  public function replyToComment(array $params): void {
    $originalComment = $this->db->query("SELECT * FROM comments WHERE id = :id", $params)->fetch();

    if (!$originalComment) ErrorController::notFound("Comment not found.");

    $params = ["postId" => $originalComment->post_id, "userId" => Session::get("user")->id, "replyTo" => $params['id'] ?? null, "content" => $_POST['content'] ?? null];

    if (!$params['content']) ErrorController::badRequest("Please provide a content for the comment.");
    if (!$params['replyTo']) ErrorController::badRequest("Please provide a reply_to field.");

    $this->db->query("INSERT INTO comments (post_id, user_id, content, reply_to) VALUES(:postId, :userId, :content, :replyTo)", $params);
  }

  /**
   * Edit a Comment. Available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function editComment(array $params): void {
    $comment = $this->db->query("SELECT * FROM comments WHERE id = :id", $params)->fetch();

    if (!$comment) ErrorController::notFound("Comment not found.");

    if ($comment->user_id !== Session::get("user")->id) ErrorController::forbidden("You are not allowed to edit this comment.");

    $params = [
      "id" => $params['id'],
      "content" => $_POST['content'],
      "updatedAt" => date('Y-m-d H:i:s')
    ];

    $this->db->query("UPDATE comments SET content = :content, updated_at = :updatedAt WHERE id = :id", $params);
  }

  /**
   * Remove a Comment. Available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function removeComment(array $params): void {
    $comment = $this->getOne($params);

    if (!$comment) ErrorController::notFound("Comment not found.");
    if ($comment->user_id !== Session::get("user")->id) ErrorController::forbidden("You are not allowed to delete this comment.");

    $this->deleteOne($params);
  }
}