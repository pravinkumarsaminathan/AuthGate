<?php

class Hash
{
    public static function pass($password)
    {
        $option = [
            'cost' => 8,
        ];
        
        $pass = password_hash($password, PASSWORD_BCRYPT, $option);
        return $pass;

    }
}