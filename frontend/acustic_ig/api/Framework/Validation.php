<?php

namespace Framework;

class Validation {

  /**
   * Validate an email
   *
   * @param string $email
   *
   * @return bool
   */
  public static function email(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function stringLength(string $string, int $minLength, int $maxLength): bool {
    return strlen($string) <= $maxLength || strlen($string) >= $minLength;
  }
}