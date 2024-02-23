<?php /** @noinspection ALL */

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
use App\Models\User;

class AuthController {
  protected $db;
  protected $userModel;

  public function __construct() {
    $this->db = new Database();
    $this->userModel = new User();
  }

  /**
   * Register a user
   *
   * @return void
   */
  public function register() {
    $acceptedParams = ['email', 'tag', 'name', 'password', 'password_confirm', 'bio', 'gender', 'is_private'];

    $params = array_intersect_key($_POST, array_flip($acceptedParams));

    $user = $this->db->query("SELECT * FROM users WHERE email = :email", ["email" => $params['email']])->fetch();

    // Validate fields
    if ($user) ErrorController::badRequest("User already exists!");
    if ($_POST['password'] !== $_POST['password_confirm']) ErrorController::badRequest("Passwords are not identical!");
    if (!Validation::email($params['email'])) ErrorController::badRequest("This email address is not valid.");
    if (!Validation::stringLength($params['tag'], 0, 4, 32)) ErrorController::badRequest("The tag's length must be between 4 and 32 characters.");
    if (!Validation::stringLength($params['tag'], 2, 64)) ErrorController::badRequest("The name's length must be between 2 and 64 characters.");

    // Convert some fields
    $params['tag'] = strtolower(trim($params['tag']));

    // Unset the password_confirm field, it's unnecessary
    unset($params['password_confirm']);

    // Hash the password
    $params['password'] = password_hash($params['password'], PASSWORD_DEFAULT);

    $fields = implode(', ', array_keys($params));
    $placeholders = implode(", ", array_map(fn($item) => ":$item", array_keys($params)));

    $this->db->query("INSERT INTO users($fields) VALUES ($placeholders)", $params);

    $user = ["id" => $this->db->pdo->lastInsertId(), "tag" => $params['tag'], "name" => $params['name'], "email" => $params['email']];

    // Set a session
    Session::set("user", $user);

    sendResponse("User registered successfully!", 201);

    // TODO: Add more validation, add profile picture functionality, create methods to transform certain fields;
  }

  /**
   * Login a user
   *
   * @return void
   */
  public function login() {
    $params = ["email" => $_POST['email']];

    $this->userModel->login($params);

    sendResponse("Logged in successfully!", 200);
  }

  /**
   * Logout a uset
   *
   * @return void
   */
  public function logout() {
    Session::destroyAll();
    setcookie("user", '', time() - 1);

    sendResponse("Logged out successfully!", 200);
  }
}