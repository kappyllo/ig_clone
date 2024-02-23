<?php /** @noinspection ALL */

namespace App\Controllers;

use App\Models\PostLike;
use Framework\Session;

class PostLikeController {
  protected $postLike;

  public function __construct() {
    $this->postLike = new PostLike();
  }

  public function getAll() {
    $postLikes = $this->postLike->getAll();

    sendResponse('', 200, $postLikes);
  }

  public function getOne($params) {
    $postLike = $this->postLike->getOne($params);

    sendResponse('', 200, $postLike);
  }

  public function getLikes($params) {
    $postLikes = $this->postLike->getLikes($params);

    sendResponse('', 200, $postLikes);
  }

  public function getLikeCount($params) {
    $postLikeCount = $this->postLike->getLikeCount($params);

    sendResponse('', 200, $postLikeCount);
  }

  /**
   * Create a Post Like object. This method is available to meoderators and administrators.
   *
   * @param array $params
   *
   * @return void
   */
  public function create(array $params): void {
    $this->postLike->create($params);

    sendResponse("Post Like created successfully!", 201);
  }

  /**
   * Like a Post. Available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function like(array $params): void {
    $params = ["userId" => Session::get("user")->id, "postId" => $params['id']];

    $this->postLike->like($params);

    sendResponse("Post liked successfully!", 201);
  }

  /**
   * Delete a Post Like. This method is available only for moderators and administrators.
   *
   * @param array $params
   *
   * @return void
   */
  public function deleteOne(array $params): void {
    if (!$this->postLike->deleteOne($params)) ErrorController::notFound("Like not found.");

    sendResponse("Like deleted successfully!", 204);
  }

  /**
   * Dislike already liked Post. This method is available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function dislike(array $params): void {
    if ($this->postLike->deleteOne($params)) {
      sendResponse("Post like deleted successfully.", 204);
    } else {
      sendResponse("This like doesn't exist.", 404);
    }
  }
}