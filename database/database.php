<?php
    $user = "root";
    $password = "";

    //$db = new PDO("mysql:host=localhost;dbname=inteam", $user, $password);
    $db = mysqli_connect("localhost", $user, $password, "inteam");
?>