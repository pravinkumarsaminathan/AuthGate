<?php

class Sanitize
{
    static public function username($username)
    {
        return filter_var($username, FILTER_SANITIZE_STRING);
    }

    static public function email($email) 
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    static public function phone($phone) {
        return preg_replace('/[^0-9]/', '', $phone);
    }
}