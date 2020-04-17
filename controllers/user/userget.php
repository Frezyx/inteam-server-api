<?php
    include("../../database/database.php");

    $email = $_POST["email"];
    $password = $_POST["password"];

    $date = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    
    if(!empty($email) && !empty($password)){
        if($result->num_rows != 0){
            $db->query(
                "UPDATE members 
                SET date_lastseen = '$date' 
                WHERE email = '$email' AND password = '$password'"
            );
            $result = mysqli_query($db, $sql);    
            echo json_encode(mysqli_fetch_assoc($result));
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