<?php

class Usersession
{
    public static function authenticate($id)
    {
        $conn = Database::getConnection();
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $token = md5(rand(0,99999999) .$ip.$agent.time());
        $sql = "INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`)
                VALUES ('$id', '$token', now(), '$ip', '$agent');";

        if ($conn->query($sql))
        {
            Session::set("session_token", $token);
            Session::set("id", $id);
            return $token;
        }
        else
        {
            return false;
        }


    }

    public static function authorice($token)
    {
        if ($token)
        {
            $conn = Database::getConnection();
            $user_id = Session::get('id');
            $sql = "SELECT `token` FROM `session` WHERE `uid` = '$user_id' ORDER BY `id` DESC LIMIT 1";
            $result = $conn->query($sql);
            if ($result->num_rows == 1)
            {
                $result = $result->fetch_assoc();
                $ser_token = $result['token'];
                if ($ser_token == Session::get('session_token'))
                {
                    return true;
                }
                else
                    print("authorice is unsucessful");
            }
            else
            {
                printf("error in authorice result");
            }
        }
        else
        {
            print("error in this->result");
        }   
    }

    // public static function logout($user_id)
}