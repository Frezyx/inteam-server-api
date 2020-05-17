<?php
    include("../../database/database.php");
    if(isset( $_GET["email"]) && isset($_GET["password"])){
        if(!empty( $_GET["email"]) && !empty($_GET["password"])){

            $email = $_GET["email"];
            $password = $_GET["password"];
        
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
        }
    }
?>