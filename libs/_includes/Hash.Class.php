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

    public static function verify($username, $password)
    {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM `authup` WHERE `username` = '$username'";
        $count = $conn->query($sql);
        $results = $count->fetch_assoc();
        if ($results) {
            if (password_verify($password, $results["password"])) {
                Session::set("username", $results["username"]);
                return $results['id'];
            } else {
                return false;
            }
        } 
    //     else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    }
}