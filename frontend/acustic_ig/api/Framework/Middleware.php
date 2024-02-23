<?php /** @noinspection ALL */

namespace Framework;

use App\Controllers\ErrorController;

class Middleware {

  /**
   * Process JSON request data and save it into the $_POST super global
   *
   * @return void
   */
  public static function processJsonRequestData(): void {
    $acceptedMethods = ["POST", "PUT", "PATCH"];

    if (!in_array($_SERVER['REQUEST_METHOD'], $acceptedMethods)) return;

    $data = json_decode(file_get_contents("php://input"), true);

    if (empty($data)) return;

    $_POST = $data;
  }

  /**
   * Make route accessible only to logged-in users
   *
   * @return void
   */
  public function protect() {
    if (!Session::get("user")) ErrorController::unauthorized();
  }

  /**
   * Make route accessible only to specified roles
   *
   * @param array $roles
   *
   * @return void
   */
  public function restrict(array $roles): void {
    $userRole = Session::get("user")['role'];

    if (!in_array($userRole, $roles)) ErrorController::forbidden();
  }
}