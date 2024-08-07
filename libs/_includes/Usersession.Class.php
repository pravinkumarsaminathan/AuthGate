<?php
ob_start();
class Usersession
{
    public static function authenticate($id)
    {
        // $conn = Database::getConnection();
        // $ip = $_SERVER['REMOTE_ADDR'];
        // $agent = $_SERVER['HTTP_USER_AGENT'];
        // $token = md5(rand(0,99999999) .$ip.$agent.time());
        // $sql = "INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`)
        //         VALUES ('$id', '$token', now(), '$ip', '$agent');";

        // if ($conn->query($sql))
        // {
        //     Session::set("session_token", $token);
        //     Session::set("id", $id);
        //     return $token;
        // }
        // else
        // {
        //     return false;
        // }
        $conn = Database::getConnection();
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $token = md5(rand(0,99999999) . $ip . $agent . time());

        $stmt = $conn->prepare("INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`) VALUES (?, ?, now(), ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
        }

        $stmt->bind_param("isss", $id, $token, $ip, $agent);

        if ($stmt->execute()) {
            Session::set("session_token", $token);
            Session::set("id", $id);
            return $token;
        } else {
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
                    echo "<script>alert('Session ended,try to login')</script>";
                    header("Location: http://127.0.0.1:8000/AuthGate/Authin.php");
                    exit;
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

    public static function logout()
    {
        $del_id = $_SESSION['id'];
        $conn = Database::getConnection();
        $sql = "DELETE FROM `session`
                WHERE ((`uid` = '$del_id'));";
        $conn->query($sql);
        Session::destroy();
        header("Location: http://127.0.0.1:8000/AuthGate/Authin.php");
        exit;        
    }
}
ob_end_flush();