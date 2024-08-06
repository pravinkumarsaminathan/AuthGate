<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assests/icon.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <?php if (file_exists($_SERVER['DOCUMENT_ROOT']."/AuthGate/css/".basename($_SERVER['PHP_SELF'],".php").".css"))
    { ?>
    <link 
        href="/AuthGate/css/<?php print(basename($_SERVER['PHP_SELF'],".php"))?>.css"
        rel="stylesheet">
    <?php } ?>
    <title>AuthGate</title>
</head>