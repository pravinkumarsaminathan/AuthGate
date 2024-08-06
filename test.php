<?php 

include_once('libs/load.php');

$conn = Database::getConnection();
if ($conn)
{
    print("connection success");
}
else
{
    print("connection error");
}