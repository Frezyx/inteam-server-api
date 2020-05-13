<?php
    include("../../database/database.php");

    if($_SERVER["CONTENT_TYPE"] != 'application/json')
    {
        echo "wrong format (not json)";
        return;
    } 

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $email = $data["email"];
    $password = $data["password"];

    $date = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    
    if(!empty($email) && !empty($password))
    {
        if($result->num_rows != 0)
        {
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
            echo "bad request (no user with such email & pass)";
        }
    }
    else
    {
        echo "bad request (null data)";
    }
    
?>