<?php 

include_once('libs/load.php');

$conn = Database::getConnection();
if ($conn)
{
    $sql = "SELECT * FROM `authup` WHERE `username` = 'pravin' ";
    $count = $conn->query($sql);
    $results = $count->fetch_assoc();
    echo "<pre>";
    print($results["id"]);
    echo "</pre>";
}
else
{
    print("connection error");
}
?>
<form method="GET">
            <button type="submit" name="logout">Log out</button>
    </form>

<?php
print_r($_GET);