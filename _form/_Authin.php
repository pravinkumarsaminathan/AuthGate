<?php

include_once ("libs/load.php");

if (isset($_POST['username']) and isset($_POST['password'])) {
    $username = Sanitize::username($_POST['username']);
    $password = $_POST['password'];

    $validate = Validate::authin($username, $password);
    if ($validate) {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM `authup` WHERE `username` = '$username'";
        $count = $conn->query($sql);
        $results = $count->fetch_assoc();
        if ($results) {
            if (password_verify($password, $results["password"])) {
                header("Location: http://127.0.0.1:8000/AuthGate/note.php");
                exit;
            } else {
                echo "Username or Password incorrect";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}