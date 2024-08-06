<?php 

function load_templates($name)
{
    include $_SERVER['DOCUMENT_ROOT']."/AuthGate/_templates/$name.php";
}