<?php

namespace App\Models;

use App\Controllers\ErrorController;
use App\Models\Model;
use Framework\Session;
use stdClass;

class User extends Model {
  public function __construct() {
    parent::__construct("users");
  }

  /**
   * Log in user
   *
   * @param array $params
   *
   * @return bool
   */
  public function login(array $params): bool {
    $user = $this->db->query("SELECT * FROM $this->resourceName WHERE email = :email", $params)->fetch();

    if (!$user) ErrorController::notFound();

    if (!password_verify($_POST['password'], $user->password)) ErrorController::unauthorized("Incorrect password.");

    unset($user->password);

    Session::set("user", $user);

    setcookie("user", json_encode($user), time() + 60 * 60 * 24, "/");

    return true;
  }

  /**
   * Get all posts from specified user
   *
   * @param array $params
   *
   * @return array
   */
  public function getPosts(array $params): array|stdClass {
    $user = $this->db->query("SELECT * FROM users WHERE id = :id", $params)->fetch();

    if (!$user) ErrorController::notFound("User not found.");

    return decodeJSONFromQuery($this->db->query("SELECT posts.id, posts.user_id, posts.description, json_build_array(posts.media_ids) AS media_ids, posts.created_at, posts.updated_at
        FROM posts WHERE user_id = :id", $params)->fetch(), "media_ids", 0);
  }
}