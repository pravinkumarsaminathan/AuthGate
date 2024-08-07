<?php
ob_start();
include_once ("libs/load.php");

if (isset($_POST['username']) and isset($_POST['password'])) {
    $username = Sanitize::username($_POST['username']);
    $password = $_POST['password'];

    $validate = Validate::authin($username, $password);
    if ($validate) {
        $verify = Hash::verify($username, $password);
        if ($verify) {
            if (!isset($_SESSION['session_token']))
            {
            $authenticate = Usersession::authenticate($verify);
            // $authorice = Usersession::authorice($authenticate);
            // header("Location: http://127.0.0.1:8000/AuthGate/note.php");
            // exit;
            }
            if (Usersession::authorice($_SESSION['session_token'])){
                // echo "already loged in";
                header("Location: http://127.0.0.1:8000/AuthGate/note.php");
                exit;
            }
            else {
                Session::destroy();
            }
        } else {
            echo "Username or Password incorrect";
        }
    }
}
ob_end_flush();