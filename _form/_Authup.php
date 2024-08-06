<?php

include_once("libs/load.php");

if (isset($_POST['username']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['password']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $conn = Database::getConnection();
    $checkUserQuery = "SELECT * FROM list WHERE username='$username'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows > 0) {
        echo "<script>alert('Username already exits. Please choose a different username.')</script>";
    }
    else{
    $sql = "INSERT INTO `authup` (`username`, `email`, `phone`, `password`, `date`)
            VALUES ('$username', '$email', '$phone', '$password', now());";
    if ($conn->query($sql) === TRUE) {
        header("Location: http://127.0.0.1:8000/AuthGate/Authin.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}