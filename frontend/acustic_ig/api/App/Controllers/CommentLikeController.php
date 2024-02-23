<?php /** @noinspection ALL */

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\CommentLike;

class CommentLikeController extends Controller {
  public function __construct() {
    parent::__construct(new CommentLike());
  }

  /**
   * Like Comment. Available for regular users.
   *
   * @param array $params
   *
   * @return void
   */
  public function likeComment(array $params): void {
    $this->model->likeComment($params);

    sendResponse("Comment liked!", 201);
  }
}