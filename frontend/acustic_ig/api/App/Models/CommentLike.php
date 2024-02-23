<?php /** @noinspection ALL */

namespace App\Models;

use App\Controllers\ErrorController;
use App\Models\Model;
use Framework\Session;

class CommentLike extends Model {
  public function __construct() {
    parent::__construct("comment_likes");
  }

  /**
   * Like Comment. Available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function likeComment(array $params): void {
    $comment = $this->db->query("SELECT * FROM comments WHERE id = :id", $params)->fetch();

    if (!$comment) ErrorController::notFound("Comment not found.");

    $params = [
      "commentId" => $params['id'],
      "userId" => Session::get("user")->id
    ];

    if ($this->db->query("SELECT * FROM comment_likes WHERE comment_id = :commentId AND user_id = :userId", $params)->fetch()) ErrorController::badRequest("You already like this comment.");

    $this->db->query("INSERT INTO comment_likes (user_id, comment_id) VALUES(:userId, :commentId)", $params);
  }
}