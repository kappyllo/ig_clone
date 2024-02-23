<?php

namespace App\Models;

use App\Controllers\ErrorController;
use App\Models\Model;

class Media extends Model {
  public function __construct() {
    parent::__construct("media");
  }

  public function getAssociatedFileUri(array $params): string {
    $media = $this->db->query("SELECT uri FROM media WHERE id = :id", $params)->fetch();

    if (!$media) ErrorController::notFound("Media not found.");

    return $media->uri;
  }
}