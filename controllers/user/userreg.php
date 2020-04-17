<?php
    include("../../database/database.php");

    $email = $_POST["email"];
    $password = $_POST["password"];
    $date = date("Y-m-d H:i:s");

    if(!empty($email) && !empty($password)){
        if($db->query("SELECT * FROM members WHERE email = '$email'")->num_rows == 0){
            $db->query("INSERT INTO members VALUES(id, '$email', '$password', '$date')");
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