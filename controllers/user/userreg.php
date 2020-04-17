<?php
    //include("../../database/database.php");

    $bd = mysqli_connect("localhost", "root", "", "inteam");
    $email = $_POST["email"];
    $password = $_POST["password"];
    $date = date("Y-m-d H:i:s");

    if(!empty($email) && !empty($password)){
        if($bd->query("SELECT * FROM members WHERE email = '$email'")->num_rows == 0){
            $bd->query("INSERT INTO members VALUES(id, '$email', '$password', '$date')");
            http_response_code(200);
        }
        else
        { 
            http_response_code(400); 
        }
    }
    else{
        http_response_code(400); 
    }
?>