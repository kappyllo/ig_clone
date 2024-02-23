<?php /** @noinspection ALL */

namespace App\Controllers;

use App\Models\Comment;

class CommentController {
  protected $commentModel;

  public function __construct() {
    $this->commentModel = new Comment();
  }

  public function getAll() {
    $comments = $this->commentModel->getAll();

    sendResponse('', 200, $comments);
  }

  public function getOne($params) {
    $comment = $this->commentModel->getOne($params);

    sendResponse('', 200, $comment);
  }

  /**
   * Delete a Comment. This method is for moderators and administrators only.
   *
   * @param array $params
   *
   * @return void
   */
  public function deleteOne(array $params): void {
    if (!$this->commentModel->deleteOne($params)) ErrorController::notFound("Comment not found.");

    sendResponse("Comment deleted successfully.", 204);
  }

  /**
   * Edit a Comment. Available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function editComment(array $params): void {
    $this->commentModel->editComment($params);

    sendResponse("Comment edit performed successfully!", 200);
  }

  /**
   * Comment a Post. Available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function commentPost(array $params): void {
    $this->commentModel->commentPost($params);

    sendResponse("Post commented!", 201);
  }

  /**
   * Reply to a Comment. Available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function replyToComment(array $params): void {
    $this->commentModel->replyToComment($params);

    sendResponse("Reply posted successfully.", 201);
  }

  /**
   * Remove a Comment. Available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function removeComment(array $params): void {
    $this->commentModel->removeComment($params);

    sendResponse("Comment removed successfully.", 204);
  }
}