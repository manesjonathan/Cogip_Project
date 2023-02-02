<?php
namespace App\Services;

class ValidatorService{

    public static function sanitizeInput($input)
    {
        return trim(htmlspecialchars($input));
    }

    public static function validateInput($input)
    {
        return !empty($input);
    }

    public static function validateEmail($email)
    {
        $regex = '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/';
        return preg_match($regex, $email);
    }
}