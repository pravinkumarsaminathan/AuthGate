<?php

include_once ("libs/load.php");

if (isset($_POST['username']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['password'])) {
    $username = Sanitize::username($_POST['username']);
    $email = Sanitize::email($_POST['email']);
    $phone = Sanitize::phone($_POST['phone']);
    $password = $_POST['password'];

    $validate = Validate::all($username, $email, $phone, $password);
    if ($validate) {
        $password = Hash::pass($password);
        $conn = Database::getConnection();
        $checkUserQuery = "SELECT * FROM authup WHERE username='$username'";
        $result = $conn->query($checkUserQuery);

        if ($result->num_rows > 0) {
            echo "<script>alert('Username already exits. Please choose a different username.')</script>";
        } 
        else {
            $stmt = $conn->prepare("INSERT INTO `authup` (`username`, `email`, `phone`, `password`, `date`) VALUES (?, ?, ?, ?, now())");
        
            if ($stmt === false) {
                die("Prepare failed: " . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
            }
        
            $stmt->bind_param("ssss", $username, $email, $phone, $password);
            if ($stmt->execute()) {
                header("Location: http://127.0.0.1:8000/AuthGate/Authin.php");
                exit;
            } else {
                echo "Error: " . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8') . "<br>";
            }
        }        
        // else {
        //     $sql = "INSERT INTO `authup` (`username`, `email`, `phone`, `password`, `date`)
        //     VALUES ('$username', '$email', '$phone', '$password', now());";
        //     if ($conn->query($sql) === TRUE) {
        //         header("Location: http://127.0.0.1:8000/AuthGate/Authin.php");
        //         exit;
        //     } else {
        //         echo "Error: " . $sql . "<br>" . $conn->error;
        //     }
        // }
    }
}