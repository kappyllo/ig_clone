<?php /** @noinspection ALL */

namespace App\Controllers;

use App\Models\Media;
use App\Models\File;

class MediaController {
  protected $mediaModel, $fileModel;

  public function __construct() {
    $this->mediaModel = new Media();
    $this->fileModel = new File();
  }

  public function getOne($params) {
    $media = $this->mediaModel->getOne($params);

    sendResponse('', 200, $media);
  }

  public function getAssociatedFile($params) {
    $filename = $this->mediaModel->getAssociatedFileUri($params);

    $filename = substr($filename, strrpos($filename, '/') + 1);

    $file = $this->fileModel->getOne(["filename" => $filename]);

    sendFile($file);
  }
}