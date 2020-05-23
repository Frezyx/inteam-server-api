<?php
    require_once("../../database/database.php");
    require_once("../../utils/sqlHelper.php");

    if(isset($_GET["party_id"]) && isset($_GET["user_id"])){
        if(!empty($_GET["party_id"]) && !empty($_GET["user_id"])){
            //Каст к интам
            $partyId = ctype_digit($_GET["party_id"]) ? intval($_GET["party_id"]) : null;
            $userId = ctype_digit($_GET["user_id"]) ? intval($_GET["user_id"]) : null;
            if($partyId !== null && $userId !== null){
                //Записываем запрос на вступление на мероприятие
                $res = SqlHelper::RequestUserJoin($partyId, $userId, $db);
                if($res){
                    // Обновляем кол-во запросов на вступление
                    $resUpdate = SqlHelper::UpdateEventJoinRequestsCount($partyId, $db);
                    // Пишем ответ для вывода на мобиле (До JSON decode он будет непонятными символами)
                    if($resUpdate){echo json_encode(ResponseWriter::http_response_header()[200]);}
                    else{echo json_encode(ResponseWriter::http_response_header()[400]);}

                }
            }
        }
    }

?>