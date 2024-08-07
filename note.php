<?php 
ob_start();
include_once("libs/load.php"); 
if (isset($_SESSION['session_token']))
{
    if (Usersession::authorice($_SESSION['session_token'])){
        ?>
    <?php load_templates("_note"); ?>
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