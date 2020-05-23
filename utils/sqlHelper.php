<?php
    require_once("../../database/database.php");
    require_once("../../utils/responseWriter.php");
    class SqlHelper{

        static function RequestUserJoin(int $partyId, int $userId, $db){
            $sql = "INSERT INTO `requests` (`id`, `user_id`, `event_id`) VALUES (NULL, '$userId', '$partyId')";
            $q = mysqli_query($db, $sql);
            return $q;
        }

        static function UpdateEventJoinRequestsCount(int $partyId, $db){
            $sql = "UPDATE `events` SET `request_count` = `request_count` + 1 WHERE `events`.`id` = $partyId";
            $q = mysqli_query($db, $sql);
            return $q;
        }

    }
?>