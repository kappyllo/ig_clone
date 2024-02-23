<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Story;

class StoryController extends Controller {
  public function __construct() {
    parent::__construct(new Story());
  }

  public function getAllFromUser($params) {
    $stories = $this->model->getAllFromUser($params);

    sendResponse('', 200, $stories);
  }

  public function create() {
    $this->model->create();

    sendResponse("Story created successfully!", 201);
  }
}