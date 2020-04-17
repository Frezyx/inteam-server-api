<?php
    //include("../../database/database.php");
    $bd = mysqli_connect("localhost", "root", "", "inteam");

    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if($bd->query("SELECT * FROM members WHERE email = '$email'")->num_rows == 0){
            $bd->query("INSERT INTO members VALUES(id, '$email', '$password', date_reg)");
            http_response_code(200);
        }
        else{
            http_response_code(400);
        }
    }else{
        http_response_code(400); //BAD REQUEST
    }
?>