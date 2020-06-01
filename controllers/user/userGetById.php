<?php
    require_once("../../database/database.php");
    require_once("../../utils/responseWriter.php");

    if(isset( $_POST["id"])){
        if(!empty( $_POST["id"])){

            $id = $_POST["id"];

            $sql = "SELECT * FROM members WHERE id = '$id'";
            $result = mysqli_query($db, $sql);
            
            if($result->num_rows != 0){
                $result = mysqli_query($db, $sql);    
                ResponseWriter::getJsonArrayFromSqlResult($result);
            }
            else
            { 
                echo "no user with such id";
            }
        }
        else{
            echo "id is empty";
        }
    }
    else{
        echo "id ain't set";
    }
?>