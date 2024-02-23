<?php /** @noinspection ALL */

namespace App\Controllers;

use Framework\Database;
use App\Models\User;

class UserController {
  protected $db;
  protected $userModel;

  public function __construct() {
    $this->db = new Database();
    $this->userModel = new User();
  }

  public function getAll() {
    $users = $this->userModel->getAll();

    sendResponse('', 200, $users);
  }

  public function getOne($params) {
    $user = $this->userModel->getOne($params);

    if (!$user) ErrorController::notFound("User not found.");

    sendResponse('', 200, $user);
  }

  public function deleteOne($params) {
    if ($this->userModel->deleteOne($params)) {
      sendResponse("User {$params['id']} deleted successfully.", 204);

    } else {
      ErrorController::notFound("User with that ID doesn't exist.");
    }
  }

  public function getFollowers($params) {
    $user = $this->db->query("SELECT * FROM users WHERE id = :id", $params);

    if (!$user) exit;

    $results = $this->db->query("SELECT users.id, tag, name, profile_pic FROM follows JOIN users ON follows.following_user_id = users.id WHERE followed_user_id = :id", $params)->fetchAll();

    sendResponse("", 200, $results);
  }

  public function getFollowed($params) {
    $results = $this->db->query("SELECT users.id, tag, name, profile_pic FROM follows JOIN users ON follows.followed_user_id = users.id WHERE following_user_id = :id", $params)->fetchAll();

    sendResponse("", 200, $results);
  }

  public function getPosts($params) {
    $posts = $this->userModel->getPosts($params);

    sendResponse('', 200, $posts);
  }
}