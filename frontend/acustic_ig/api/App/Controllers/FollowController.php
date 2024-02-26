<?php /** @noinspection ALL */

namespace App\Controllers;

use Framework\Database;

class FollowController {
  protected $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function getAll() {
    $results = $this->db->query("SELECT * FROM follows")->fetchAll();

    sendResponse("", 200, $results);
  }

  public function create() {
    $followedUserId = $_POST['followed_user_id'];

    if (!is_numeric($followedUserId)) exit;

    $params = ["id" => $followedUserId];

    $followedUser = $this->db->query("SELECT * FROM users WHERE id = :id", $params)->fetch();

    if (!$followedUser) exit;

    $params = ["following_user_id" => 1, "followed_user_id" => $followedUserId];

    $this->db->query("INSERT INTO follows (following_user_id, followed_user_id) VALUES (:following_user_id, :followed_user_id)", $params);

    sendResponse("Follow added successfully!", 201);
  }
}