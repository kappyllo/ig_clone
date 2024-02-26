<?php /** @noinspection ALL */

namespace App\Models;

use App\Controllers\ErrorController;
use App\Models\Model;
use Framework\Session;

class Story extends Model {
  public function __construct() {
    parent::__construct('stories');
  }

  public function getAllFromUser(array $params): array {
    $user = $this->db->query("SELECT * FROM users WHERE id = :id", $params)->fetch();

    if (!$user) ErrorController::notFound("User not found.");

    $activeTime = date("Y-m-d H:i:s", strtotime("-24 hours"));

    $params = [
      "id" => $params['id'],
      "activeTime" => $activeTime
    ];

    return populateMediaUris($this->db->query("SELECT * FROM stories WHERE user_id = :id AND created_at > :activeTime", $params)->fetchAll(), "media_id", "media_uri", $this->db);
  }

  public function create() {
    if (!isset($_FILES['media'])) ErrorController::badRequest("Please provide a media for the Story.");
    if (isset($_POST['display_time']) && ($_POST['display_time'] > 18 || $_POST['display_time'] < 4)) ErrorController::badRequest("Please provide a display time between 4 and 18 seconds.");

    $filename = uploadFile('media');

    $params = [
      "userId" => Session::get("user")->id,
      "uri" => $filename
    ];

    $this->db->query("INSERT INTO media (user_id, uri) VALUES (:userId, :uri)", $params);

    $mediaId = $this->db->pdo->lastInsertId();

    $params = [
      "userId" => Session::get("user")->id,
      "mediaId" => $mediaId,
      "isForCloseFriends" => $_POST['is_for_close_friends'] ?? 'false',
      "displayTime" => $_POST['display_time'] ?? 8
    ];

    $this->db->query("INSERT INTO stories (media_id, user_id, display_time, is_for_close_friends) VALUES (:mediaId, :userId, :displayTime, :isForCloseFriends)", $params);
  }
}