<?php
    require_once("../../database/database.php");
    require_once("../../utils/responseWriter.php");
    class SqlHelper{

        static function RequestUserJoin(int $eventId, int $userId, $db){
            $sql = "INSERT INTO `requests` (`id`, `user_id`, `event_id`) VALUES (NULL, '$userId', '$eventId')";
            $q = mysqli_query($db, $sql);
            return $q;
        }

        static function UpdateEventJoinRequestsCount(int $eventId, $db){
            $sql = "UPDATE `events` SET `request_count` = `request_count` + 1 WHERE `events`.`id` = $eventId";
            $q = mysqli_query($db, $sql);
            return $q;
        }

        static function ApproveUserToEvent(int $eventId, int $userId, $db){
            //status - 2 - участник
            $sql = "INSERT INTO `member_event` (`id`, `event_id`, `member_id`, `status`) VALUES (NULL, $eventId, $userId, 2)";
            $q = mysqli_query($db, $sql);
            return $q;
        }

        static function DeleteRequestUserJoin(int $eventId, int $userId, $db){
            //status - 2 - участник
            $sql = "DELETE FROM `requests` WHERE `requests`.`user_id` = $userId AND `requests`.`event_id` = $eventId";
            $q = mysqli_query($db, $sql);
            return $q;
        }

    }
?>