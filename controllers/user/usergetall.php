<?php
    include("../../database/database.php");

    $date = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM members";
    $result = mysqli_query($db, $sql);    

    $resarray = array("users" => array());
    while($row = mysqli_fetch_assoc($result))
    {
        $resarray["users"][] = $row;
        //echo json_encode(array($row));
    }
    echo json_encode($resarray);
?>