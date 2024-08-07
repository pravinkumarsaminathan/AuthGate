<?php 
ob_start();
include_once("libs/load.php"); 
if (isset($_SESSION['session_token']))
{
    if (Usersession::authorice($_SESSION['session_token'])){
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php load_templates("_head"); ?>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome!</h1>
        <p>We're glad to have you here. Click the button below to get started from first.</p>
        <a href="#">Get Started</a>
    </div>
    <form method="GET">
            <button type="submit" name="logout">Log out</button>
    </form>
</body>
</html>
<?php
}
}
else
{
    header("Location: http://127.0.0.1:8000/AuthGate/Authin.php");
    exit;
}


if (isset($_GET["logout"]))
{
    Usersession::logout();
}

ob_end_flush();
?>