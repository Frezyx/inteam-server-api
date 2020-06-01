<?php
    require_once("../../database/database.php");
    require_once("../../utils/sqlHelper.php");

    if(isset($_POST["event_id"]) && isset($_POST["user_id"])){
        if(!empty($_POST["event_id"]) && !empty($_POST["user_id"])){
            //Каст к интам
            $eventId = ctype_digit($_POST["event_id"]) ? intval($_POST["event_id"]) : null;
            $userId = ctype_digit($_POST["user_id"]) ? intval($_POST["user_id"]) : null;

            if(mysqli_query($db, "SELECT * FROM members WHERE id = '$userId'")->num_rows == 0){
                echo "no user with such id";
                return;
            }
            if(mysqli_query($db, "SELECT * FROM events WHERE id = '$eventId'")->num_rows == 0){
                echo "no event with such id";
                return;
            }
            
            if($eventId !== null && $userId !== null){
                if(mysqli_query($db, "SELECT * FROM requests WHERE event_id = '$eventId' AND user_id = '$userId'")->num_rows != 0){
                    SqlHelper::ApproveUserToEvent($eventId, $userId, $db);
                    SqlHelper::DeleteRequestUserJoin($eventId, $userId, $db);
                    SqlHelper::UpdateEventJoinRequestsCount($eventId, $db);
                    echo "approval succeed";
                }
                else{
                    echo "no request with such event_id or user_id";
                }
            }
            else{
                echo "event_id or user_id is null";
            }
        }
        else{
            echo "event_id or user_id is empty";
        }
    }
    else{
        echo "event_id or user_id ain't set";
    }
?>