<?php
    require_once("../../database/database.php");
    require_once("../../utils/responseWriter.php");

    if(isset( $_POST["email"]) && isset($_POST["password"])){
        if(!empty( $_POST["email"]) && !empty($_POST["password"])){

            $email = $_POST["email"];
            $password = $_POST["password"];
        
            $date = date("Y-m-d H:i:s");
            $sql = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($db, $sql);
            
            if($result->num_rows != 0){
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $location = $_POST["location"];
                $competencies = $_POST["competencies"];
                $experience = $_POST["experience"];
                $summary = $_POST["summary"];

                if(isset($name) && isset($surname) && isset($location) &&
                   isset($competencies) && isset($experience) && isset($summary)){

                }
                else{
                    echo "some of these fields ain't set: (name, surname, location, competencies, experience, summary)";
                    return;
                }
                
                $db->query(
                    "UPDATE members 
                    SET date_lastseen = '$date', name = '$name', surname = '$surname', location = '$location', 
                        competencies = '$competencies', experience = '$experience', summary = '$summary'
                    WHERE email = '$email' AND password = '$password'"
                );
                echo "update succeed";
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
        echo "password or email ain't set";
    }
?>