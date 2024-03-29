<?php

namespace Framework;

use stdClass;

class Query {
  protected $db;
  public string $query;
  public array $params;
<<<<<<< HEAD
=======
  private array|stdClass|null $results = null;
  protected int $resultLimit = 5;
>>>>>>> working
  protected array|string $allowedQueryOptions;
  protected array $queryOptions;
  protected $stmt;

  public function __construct(string $query, array $params = [], array|string $allowedQueryOptions = []) {
    $this->queryOptions = [
      'paginate'
    ];

    $this->db = new Database();
    $this->query = $query;
    $this->params = $params;
    $this->allowedQueryOptions = $allowedQueryOptions === 'all' ? $this->queryOptions : $allowedQueryOptions;
    $this->stmt = null;
  }

  public function execute(): static {
<<<<<<< HEAD
//    $this->limit();
//    $this->paginate();
=======
    // Query options
    $this->limit()->paginate();
>>>>>>> working

    $this->stmt = $this->db->query($this->query, $this->params);

    return $this;
  }

<<<<<<< HEAD
  public function getResults(): array {
    if (is_null($this->stmt)) $this->execute();
    return $this->stmt->fetchAll();
  }

  public function getResult(): stdClass {
    if (is_null($this->stmt)) $this->execute();
    return $this->stmt->fetch();
=======
  public function fetchResults(): static {
    if (is_null($this->stmt)) $this->execute();

    if ($this->stmt->rowCount() === 1) {
      $this->results = $this->stmt->fetch();
    } else {
      $this->results = $this->stmt->fetchAll();
    }

    return $this;
  }

  public function getResults(): array {
    if (is_null($this->stmt)) $this->execute();
    if (is_null($this->results)) $this->fetchResults();

    return $this->results;
>>>>>>> working
  }

  public function setQuery(string $query, array $params = []): static {
    $this->query = $query;
    $this->params = $params;

    return $this;
  }

<<<<<<< HEAD
=======
  public function setResultLimit(int $limit): static {
    $this->resultLimit = $limit;

    return $this;
  }

>>>>>>> working
  public function setParams(array $params): static {
    $this->params = $params;

    return $this;
  }

  public function setAllowedQueryOptions(string|array $allowedQueryOptions): static {
    $this->allowedQueryOptions = $allowedQueryOptions === 'all' ? $this->queryOptions : $allowedQueryOptions;;

    return $this;
  }

<<<<<<< HEAD
  private function limit(): static {
    if (!in_array("limit", $this->allowedQueryOptions) || !isset($_GET['limit'])) return $this;

    $limit = $_GET['limit'];
=======
  public function decodeJSONFields(string $fieldName, int|null $index = null): static {
    if (is_null($this->results)) $this->fetchResults();

    $entities = $this->results;

    if (is_array($entities)) {
      foreach ($entities as $entity) {
        $entity->$fieldName = isset($index) ? json_decode($entity->$fieldName)[$index] : json_decode($entity->$fieldName);
      }
    } else {
      $entities->$fieldName = isset($index) ? json_decode($entities->$fieldName)[$index] : json_decode($entities->$fieldName);
    }

    return $this;
  }

  public function populate(string $resourceName, string $fieldName, string $targetResourceFieldName, string $newFieldName = ''): static {
    if (is_null($this->results)) $this->fetchResults();

    if (!is_array($this->results)) {
      $entity = $this->results;

      $newFieldName = $newFieldName ?? $fieldName;

      $entity->$newFieldName = $this->db->query("SELECT * FROM $resourceName WHERE id = :id", ["id" => $entity->$fieldName])->fetch()->$targetResourceFieldName;
    } else {
      $entities = $this->results;

      foreach ($entities as $entity) {
        $entityArr = '{' . implode(',', $entity->$fieldName[0]) . '}';
        $targetEntities = $this->db->query("SELECT * FROM $resourceName WHERE media.id = ANY(:ids)", ['ids' => $entityArr])->fetchAll();

        foreach ($targetEntities as $targetEntity) {
          $entity->$newFieldName[] = $targetEntity->$targetResourceFieldName;
        }
      }
    }

    return $this;
  }

  private function limit(): static {
    if (strpos($this->query, "LIMIT")) return $this;

    $limit = $_GET['limit'] ?? $this->resultLimit;
>>>>>>> working

    $this->query = $this->query . " LIMIT $limit";

    return $this;
  }

  private function paginate(): static {
<<<<<<< HEAD
    if (!in_array("paginate", $this->allowedQueryOptions) || !isset($_GET['page'])) return $this;

    $page = $_GET['page'];
    $limit = 10;

    $offset = $page > 1 ? $page * $limit : 0;
=======
    if (!isset($_GET['page'])) return $this;

    $page = $_GET['page'];
    $limit = $this->resultLimit;

    $offset = $page > 1 ? ($page - 1) * $limit : 0;
>>>>>>> working

    $this->query = $this->query . " OFFSET $offset";

    return $this;
  }
}