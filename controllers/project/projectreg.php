<?php
    include("../../database/database.php");
    if(isset( $_POST["email"]) && isset($_POST["password"])){
        if(!empty( $_POST["email"]) && !empty($_POST["password"])){

            $email = $_POST["email"];
            $password = $_POST["password"];
            $date = date("Y-m-d H:i:s");

            if($db->query("SELECT * FROM members WHERE email = '$email' AND password = '$password'" )->num_rows != 0){   
                
                $id = mysqli_fetch_assoc($db->query("SELECT id FROM members WHERE email = '$email' AND password = '$password'"))['id'];

                if(isset( $_POST["title"])){
                    if(!empty( $_POST["title"])){

                        $title = $_POST["title"];
                        $db->query("INSERT INTO projects (title, leader) VALUES('$title', '$id')");
                        echo "project successfully registered";

                    }  
                    else{
                        echo "title is empty";
                    }
                }
                else{
                    echo "title ain't set";
                }
            }
            else{
                echo "no user with such email and password";
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