<?php

include_once("libs/load.php");

if ( isset($_POST['username']) and isset($_POST['password']))
{
    $email = $_POST['username'];
    $password = $_POST['password'];

    $conn = Database::getConnection();
    $sql = "SELECT * FROM `authup` WHERE `username` = 'pravin'";
    $count = $conn->query($sql);
    $results = $count->fetch_assoc();
    if ($results) {
        if ($password === $results["password"]) {
        header("Location: http://127.0.0.1:8000/AuthGate/note.php");
        exit;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}