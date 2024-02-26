<?php /** @noinspection ALL */

namespace App\Controllers;

class ErrorController {

  /**
   * Return a 404 Not Found error
   *
   * @param string $message
   *
   * @return void
   */
  public static function notFound(string $message = "Resource not found."): void {
    sendResponse($message, 404);
    exit;
  }

  /**
   * Send a 401 Unathorized erorr
   *
   * @param string $message
   *
   * @return void
   */
  public static function unauthorized(string $message = "You need to be logged in to access this resource."): void {
    sendResponse($message, 401);
    exit;
  }

  /**
   * Send a 400 Bad Request error.
   *
   * @param string $message
   *
   * @return void
   */
  public static function badRequest(string $message = "Bad request."): void {
    sendResponse($message, 400);
    exit;
  }

  /**
   * Send a 403 Forbidden error.
   *
   * @param string $message
   *
   * @return void
   */
  public static function forbidden(string $message = "You are not allowed to perform this operation."): void {
    sendResponse($message, 403);
    exit;
  }
}