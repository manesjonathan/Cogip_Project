<?php
namespace App\Services;

class ValidatorService{
    
    public static function isInputEmpty($input)
    {
        return empty($input);
    }

    public static function sanitizeEmail($email)
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function sanitize_text($input)
    { 
        // Remove backslashes
        $input = stripslashes($input);
        
        // Strip HTML and PHP tags 
        $input = strip_tags($input);
        
        // Strip whitespace from the beginning and end of a string
        $input = trim($input);

        return $input;
    }

    public static function isValidPhonenumber($phoneNumber)
    {
        return filter_var($phoneNumber, FILTER_SANITIZE_NUMBER_INT);
    }

    public static function isAlphaNumeric($input)
    {
        return preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $input);
    }

    public static function isNumber($number)
    {
        return is_numeric($number);
    }

}