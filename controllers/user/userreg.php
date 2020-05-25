<?php
    include("../../database/database.php");
    if(isset( $_POST["email"]) && isset($_POST["password"])){
        if(!empty( $_POST["email"]) && !empty($_POST["password"])){

            $email = $_POST["email"];
            $password = $_POST["password"];
            $date = date("Y-m-d H:i:s");

            if($db->query("SELECT * FROM members WHERE email = '$email'")->num_rows == 0){
                $db->query("INSERT INTO members (email, password, date_reg, date_lastseen) VALUES('$email', '$password', '$date', '$date')");
                echo "registration succeed";
            }
            else{
                echo "such email is already exist";
            }
        }  
        else{
            echo "password or email is empty";
        }
    }
    else{
        echo "password or email ain't set";
    }
?>