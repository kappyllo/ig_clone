<?php

namespace App\Controllers;

abstract class Controller {
  protected $model;

  public function __construct($model) {
    $this->model = $model;
  }

  /**
   * Get all entities of the Resource.
   *
   * @return void
   */
  public function getAll(): void {
    $results = $this->model->getAll();

    sendResponse('', 200, $results);
  }

  /**
   * Get single resource entity
   *
   * @param array $params
   *
   * @return void
   */
  public function getOne(array $params): void {
    $result = $this->model->getOne($params);

    sendResponse('', 200, $result);
  }

  /**
   * Delete single resource entity
   *
   * @param array $params
   *
   * @return bool
   */
  public function deleteOne(array $params): void {
    if (!$this->model->deleteOne($params)) ErrorController::notFound();

    sendResponse("Object deleted successfully!", 204);
  }
}