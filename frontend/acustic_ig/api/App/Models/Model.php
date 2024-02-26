<?php

namespace App\Models;

use Framework\Database;
use Framework\Query;
use stdClass;

abstract class Model {
  protected $db;
  protected string $resourceName;

  public function __construct($modelName) {
    $this->db = new Database();
    $this->resourceName = $modelName;
  }

  /**
   * Get all resource entities
   *
   * @return array
   */
  public function getAll(): array {
<<<<<<< HEAD
    $query = new Query("SELECT * FROM $this->resourceName", [], ['paginate']);
=======
    $query = new Query("SELECT * FROM $this->resourceName");
>>>>>>> working

    return $query->getResults();
  }

  /**
   * Get single resource entity
   *
   * @param array $params
   *
   * @return stdClass|bool
   */
  public function getOne(array $params): stdClass|bool {
    return $this->db->query("SELECT * FROM $this->resourceName WHERE id = :id", $params)->fetch();
  }

  /**
   * Delete single resource entity
   *
   * @param array $params
   *
   * @return bool
   */
  public function deleteOne(array $params): bool {
    $stmt = $this->db->query("DELETE FROM $this->resourceName WHERE id = :id", $params);

    return $stmt->rowCount() === 1;
  }
}