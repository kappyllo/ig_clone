<?php /** @noinspection ALL */

namespace App\Controllers;

class FileController {
  protected $fileModel;

  public function __construct() {
    $this->fileModel = new File();
  }

  /**
   * Get a single file
   *
   * @param $params
   *
   * @return void
   */
  public function getOne($params) {

    sendFile($filename);
  }
}