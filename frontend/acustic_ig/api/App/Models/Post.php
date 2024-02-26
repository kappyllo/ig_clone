<?php

namespace App\Models;

use App\Controllers\ErrorController;
use App\Models\Model;
use Framework\Session;
use Framework\Query;

class Post extends Model {
  public function __construct() {
    parent::__construct("posts");
  }

  public function getAll(): array {
    $queryString = "
      SELECT posts.id, description, json_build_array(media_ids) AS media_ids, posts.created_at, posts.updated_at,
             json_build_object('id', users.id, 'profile_pic', profile_pic, 'tag', tag, 'name', name) AS user
      FROM posts
      JOIN users
      ON posts.user_id = users.id
    ";
    $query = new Query($queryString);
    $query->decodeJSONFields("media_ids")->populate("media", "media_ids", "uri", "media_uri");
    $query->decodeJSONFields("user");

    return $query->getResults();
  }

  /**
   * Get all posts from users who the user follows
   *
   * @param string $userId
   *
   * @return array
   */
  public function getAllFromFollowedUsers(string $userId): array {
    $params = ["id" => $userId];

    $followedByUser = $this->db->query("SELECT * FROM follows WHERE following_user_id = :id", $params)->fetchAll();

    foreach ($followedByUser as $follow) {
      $queryForPosts = "
        SELECT 
        posts.id, posts.user_id, posts.description, json_build_array(posts.media_ids) AS media_ids, posts.created_at, posts.updated_at
        FROM posts WHERE user_id = :id
    ";

      $posts = decodeJSONFromQuery($this->db->query($queryForPosts, ["id" => $follow->followed_user_id])->fetchAll(), "media_ids", 0);
    }

    return array_values($posts);
  }

  public function create(): void {
    if (!$_POST['description']) ErrorController::badRequest("The description field cannot be empty.");

    // Handle the file

    $filename = uploadFile('media');

    // Insert the Media (SINGLE!)
    $params = [
      "uri" => $filename,
      "userId" => Session::get("user")->id
    ];

    (new Query("INSERT INTO media (user_id, uri) VALUES (:userId, :uri)", $params))->execute();

    // Insert the Post
    $params = [
      "user_id" => $userId,
      "description" => htmlspecialchars(trim($_POST['description'])),
      "media_ids" => "{{$this->db->pdo->lastInsertId()}}"
    ];

    (new Query("INSERT INTO posts (user_id, media_ids, description) VALUES (:user_id, :media_ids, :description)", $params))->execute();
  }
}