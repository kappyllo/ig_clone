<?php /** @noinspection ALL */

namespace App\Models;

use App\Models\Model;

class File {
  public function getOne($params): string {
    $filename = $params['filename'];

    $path = basePath("uploads/$filename");

    if (!file_exists($path)) ErrorController::notFound("File not found.");

    return $path;
  }
}