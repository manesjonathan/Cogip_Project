<?php
namespace App\Services;

class ValidatorService{
    
    public static function isInputEmpty($input)
    {
        return empty($input);
    }

    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public static function sanitize_text($input)
    { 
        // Strip whitespace from the beginning and end of a string
        $input = trim($input);
        
        // Remove backslashes
        $input = stripslashes($input);

        // Strip HTML and PHP tags 
        $input = strip_tags($input);

        return $input;
    }

    public static function isValidPhonenumebr($input)
    {
        return; // To do
    }

    public static function isAplhaNumeric($input)
    {
        return; // To do
    }

    public static function verifyDate($date, $strict = true)
    {
        $dateTime = DateTime::createFromFormat('m/d/Y', $date);
        if ($strict) {
            $errors = DateTime::getLastErrors();
            if (!empty($errors['warning_count'])) {
                return false;
            }
        }
        return $dateTime !== false;
    }
}