<?php /** @noinspection ALL */

namespace App\Models;

use App\Models\Model;
use App\Controllers\ErrorController;
use Framework\Session;
use Framework\Query;

class StoryView extends Model {
  public function __construct() {
    parent::__construct("story_views");
  }

  public function create($params) {
    $query = new Query("SELECT * FROM stories WHERE id = :id", $params);
    $story = $query->getResult();

    $params = [
      "storyId" => $params['id'],
      "userId" => Session::get("user")->id
    ];

    $existingStoryView = $query->setQuery("SELECT * FROM story_views WHERE user_id = :userId AND story_id = :storyId", $params)->getResult();

    if (!$story) ErrorController::notFound("Story not found.");
    if ($story->user_id === Session::get("user")->id || $existingStoryView) ErrorController::badRequest("You already viewed this story.");

    $query->setQuery("INSERT INTO story_views (story_id, user_id) VALUES (:storyId, :userId)", $params)->execute();
  }
}