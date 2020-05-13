<?php
    include("../../database/database.php");

    if($_SERVER["CONTENT_TYPE"] != 'application/json'){
        echo "wrong format (not json)";
        return;
    } 

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $email = $data["email"];
    $password = $data["password"];
    $date = date("Y-m-d H:i:s");

    if(!empty($email) && !empty($password))
    {
        if($db->query("SELECT * FROM members WHERE email = '$email'")->num_rows == 0)
        {
            $db->query("INSERT INTO members (email, password, date_reg, date_lastseen) VALUES('$email', '$password', '$date', '$date')");
            echo "registration succeed";
        }
        else
        { 
            echo "bad request (email is already exist)";
        }
    }
    else
    {
        echo "bad request (null data)";
    }
?>