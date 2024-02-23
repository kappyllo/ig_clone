<?php

namespace Framework;

use PDO;

class Database {
  public PDO $pdo;

  public function __construct() {
    $dbString = parse_url(getenv("DATABASE_URL"));
    $dsn = "pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $dbString["host"],
        $dbString["port"],
        $dbString["user"],
        $dbString["pass"],
        ltrim($dbString["path"], "/"));

    try {
      $this->pdo = new PDO($dsn);

      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      print "Database connection failed: " . $e->getMessage();
    }
  }

  /**
   * Perform a query
   *
   * @param string $query
   * @param array $params
   *
   * @return false|PDOStatement|void
   */

  public function query(string $query, array $params = []) {
    $stmt = $this->pdo->prepare($query);

    foreach ($params as $key => $value) {
      $stmt->bindValue(":$key", $value);
    }

    try {
      $stmt->execute();

      return $stmt;
    } catch (PDOException $e) {
      print "Query failed: " . $e->getMessage();
    }
  }
}