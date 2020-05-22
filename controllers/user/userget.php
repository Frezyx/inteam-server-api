<?php
    require_once("../../database/database.php");
    if(isset( $_POST["email"]) && isset($_POST["password"])){
        if(!empty( $_POST["email"]) && !empty($_POST["password"])){

            $email = $_POST["email"];
            $password = $_POST["password"];
        
            $date = date("Y-m-d H:i:s");
            $sql = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($db, $sql);
            
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
                echo "no user with such email and password";
            }
        }
        else{
            echo "password or email is empty";
        }
    }
    else{
        echo "password of email ain't set";
    }
?>