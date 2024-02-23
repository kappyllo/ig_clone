<?php

namespace Framework;

use stdClass;

class Query {
  protected $db;
  public string $query;
  public array $params;
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
//    $this->limit();
//    $this->paginate();

    $this->stmt = $this->db->query($this->query, $this->params);

    return $this;
  }

  public function getResults(): array {
    if (is_null($this->stmt)) $this->execute();
    return $this->stmt->fetchAll();
  }

  public function getResult(): stdClass {
    if (is_null($this->stmt)) $this->execute();
    return $this->stmt->fetch();
  }

  public function setQuery(string $query, array $params = []): static {
    $this->query = $query;
    $this->params = $params;

    return $this;
  }

  public function setParams(array $params): static {
    $this->params = $params;

    return $this;
  }

  public function setAllowedQueryOptions(string|array $allowedQueryOptions): static {
    $this->allowedQueryOptions = $allowedQueryOptions === 'all' ? $this->queryOptions : $allowedQueryOptions;;

    return $this;
  }

  private function limit(): static {
    if (!in_array("limit", $this->allowedQueryOptions) || !isset($_GET['limit'])) return $this;

    $limit = $_GET['limit'];

    $this->query = $this->query . " LIMIT $limit";

    return $this;
  }

  private function paginate(): static {
    if (!in_array("paginate", $this->allowedQueryOptions) || !isset($_GET['page'])) return $this;

    $page = $_GET['page'];
    $limit = 10;

    $offset = $page > 1 ? $page * $limit : 0;

    $this->query = $this->query . " OFFSET $offset";

    return $this;
  }
}