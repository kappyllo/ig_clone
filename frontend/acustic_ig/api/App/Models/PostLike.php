<?php

namespace App\Models;

use App\Controllers\ErrorController;
use App\Models\Model;
use Framework\Session;

class PostLike extends Model {
  public function __construct() {
    parent::__construct('post_likes');
  }

  public function getLikeCount($params) {
    return $this->db->query("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = :id", $params)->fetchAll();
  }

  public function getLikes($params) {
    return $this->db->query("SELECT * FROM post_likes WHERE post_id = :id", $params)->fetchAll();
  }

  /**
   * Create a Post Like object and insert it into the database.
   *
   * @param array $params
   *
   * @return void
   */
  public function create(array $params): void {
    $this->db->query("INSERT INTO post_likes (user_id, post_id) VALUES (:userId, :postId)", $params);
  }

  /**
   * Like a Post. Available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function like(array $params): void {
    $existingLike = $this->db->query("SELECT * FROM post_likes WHERE user_id = :userId AND post_id = :postId", $params)->fetch();

    if ($existingLike) ErrorController::badRequest("You already like this post.");

    $this->create($params);
  }

  /**
   * Dislike already liked Post, only possible for original users.
   *
   * @param $params
   *
   * @return bool
   */
  public function deleteOne($params): bool {
    $postLike = $this->db->query("SELECT * FROM post_likes WHERE id = :id", $params)->fetch();

    if (!$postLike) ErrorController::notFound("Like not found");

    if (Session::get("user")->id !== $postLike->user_id) ErrorController::forbidden("Only the person who liked can take back his decision.");

    return parent::deleteOne($params);
  }
}