<?php

class Validate
{
    static public function username($username)
    {
        return preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username);
    }

    static public function password($password)
    {
        if (strlen($password) >= 8 && preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password) && preg_match('/[0-9]/', $password) && preg_match('/[\W]/', $password)) {
            return true;
        } else {
            return false;
        }
    }

    static public function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    static public function phone($phone)
    {
        return preg_match('/^\d{10}$/', $phone);
    }

    public $errors = [];

    static public function all($username, $email, $phone, $password)
    {
        if (!Validate::username($username)) {
            $errors[] = "Invalid username.";
        }
        
        if (!Validate::email($email)) {
            $errors[] = "Invalid email";
        }
        
        if (!Validate::phone($phone)) {
            $errors[] = "Invalid phone number.";
        }
        
        if (!Validate::password($password)) {
            $errors[] = "Invalid password.";
        }

        if (empty($errors)) {
            return true;
        } else {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            return false;
        }
    }

    public $error = [];

    static public function authin($username, $password)
    {
        if (!Validate::username($username)) {
            $error[] = "Invalid username.";
        }

        if (!Validate::password($password)) {
            $error[] = "Invalid password.";
        }

        if (empty($error)) {
            return true;
        } else {
            foreach ($error as $err) {
                echo $err . "<br>";
            }
            return false;
        }
    }
}