<?php /** @noinspection ALL */

namespace Framework;

class Session {

  /**
   * Start a new session
   */
  public function __construct() {
    if (session_status() === PHP_SESSION_NONE) session_start();
  }

  /**
   * Get a session value by key
   *
   * @param string $key
   *
   * @return mixed|null
   */
  public static function get(string $key) {
    return $_SESSION[$key] ?? null;
  }

  /**
   * Set a session variable
   *
   * @param string $key
   * @param mixed $value
   *
   * @return void
   */
  public static function set(string $key, mixed $value) {
    $_SESSION[$key] = $value;
  }

  /**
   * Unset a session variable
   *
   * @param $key
   *
   * @return void
   */
  public static function destroy($key) {
    if (isset($_SESSION[$key])) unset($_SESSION[$key]);
  }

  /**
   * Destroy the entire session
   *
   * @return void
   */
  public static function destroyAll() {
    session_unset();
    session_destroy();
  }
}