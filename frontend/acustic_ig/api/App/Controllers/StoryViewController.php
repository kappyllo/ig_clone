<?php /** @noinspection ALL */

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\StoryView;

class StoryViewController extends Controller {
  public function __construct() {
    parent::__construct(new StoryView());
  }

  public function create($params) {
    $this->model->create($params);

    sendResponse("Story View created successfully.", 201);
  }
}