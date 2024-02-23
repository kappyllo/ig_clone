<?php

/**
 * Get path to a file
 *
 * @param $path
 *
 * @return string|void
 */

function basePath($path) {
  $file = __DIR__ . "/" . $path;

  if (file_exists($file)) {
    return $file;
  } else {
    trigger_error("File has not been found: $file", E_USER_ERROR);
  }
}

/**
 * Inspect a variable
 *
 * @param $data
 *
 * @return void
 */

function inspect($data): void {
  echo "<pre style='padding: 12px; border: 3px solid #000; font-size: 20px; width: max-content'>";
  var_dump($data);
  echo "</pre><br>";
}

/**
 * Inspect a variable and exit the application
 *
 * @param $data
 *
 * @return void
 */

function inspectAndDie($data): void {
  echo "<pre style='padding: 12px; border: 3px solid #000; font-size: 20px; width: max-content'>";
  var_dump($data);
  echo "</pre><br>";
  exit;
}

/**
 * Send JSON response to the client
 *
 * @param string $message
 * @param int $statusCode
 *
 * @param mixed $data
 * @return void
 */

function sendResponse(string $message, int $statusCode, mixed $data = []): void {
  http_response_code($statusCode);

  if (array_key_exists("HTTP_ORIGIN", $_SERVER)) {
    $origin = $_SERVER["HTTP_ORIGIN"];
  } else if (array_key_exists("HTTP_REFERER", $_SERVER)) {
    $origin = $_SERVER["HTTP_REFERER"];
  } else {
    $origin = $_SERVER["REMOTE_ADDR"];
  }

  header("Access-Control-Allow-Origin: $origin");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Allow-Methods: PATCH, PUT, GET, POST, DELETE, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Cookie, X-Requested-With');
  header('Access-Control-Max-Age: 86400');
  header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
  header("Content-Type: application/json");

  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit;
  }

  $status = $statusCode >= 200 && $statusCode < 300 ? "success" : "error";
  $response = ["statusCode" => $statusCode, "status" => $status];

  if ($message) $response['message'] = $message;
  if (is_array($data)) $response["resultCount"] = count($data);
  if (!empty($data)) $response["data"] = $data;

  echo json_encode($response);
}

/**
 * Send file as a response
 *
 * @param string $filename
 *
 * @return void
 */
function sendFile(string $filename): void {
  header("Content-disposition: attachment; filename=$filename");
  readfile($filename);
}

/**
 * Convert a field that has JSON value into an array or an object.
 *
 * @param array|stClass $entities
 * @param string $fieldName
 * @param int|null $index
 *
 * @return array|stdClass
 */
function decodeJSONFromQuery(array|stClass $entities, string $fieldName, int|null $index = null): array|stdClass {
  $convertedEntities = [];

  if (is_array($entities)) {
    foreach ($entities as $entity) {
      $entity->$fieldName = isset($index) ? json_decode($entity->$fieldName)[$index] : json_decode($entity->$fieldName);
      $convertedEntities[] = $entity;

    }

    return $convertedEntities;
  }

  $entities->$fieldName = isset($index) ? json_decode($entities->$fieldName)[$index] : json_decode($entities->$fieldName);
  return $entities;
}

/**
 * Upload a file from $_FILES to the server
 *
 * @param string $file
 *
 * @return bool
 */
function uploadFile(string $file): string|bool {
  $media = $_FILES[$file];

  if ($media['error'] === UPLOAD_ERR_OK) {
    $uploadDir = basePath("/uploads/");

    $filename = uniqid() . "-" . $media['name'];

    if (!move_uploaded_file($media['tmp_name'], $uploadDir . $filename)) ErrorController::badRequest("File couldn't be saved successfully.");

    return $uploadDir . $filename;
  }

  return false;
}

function populateMediaUris(array|stdClass $entities, string $fieldName, string $newFieldName, $db): array|stdClass {
  if (is_array($entities)) {
    foreach ($entities as $entity) {
      $mediaUri = $db->query("SELECT * FROM media WHERE id = :id", ["id" => $entity->$fieldName])->fetch();

      $entity->$newFieldName = $mediaUri->uri;
    }
  } else {
    $entity->$newFieldName = $db->query("SELECT * FROM media WHERE id = :id", ["id" => $entity->$fieldName])->fetch()->uri;
  }

  return $entities;
}