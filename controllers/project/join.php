<?php
    require_once("../../database/database.php");
    require_once("../../utils/sqlHelper.php");

    if(isset($_GET["event_id"]) && isset($_GET["user_id"])){
        if(!empty($_GET["event_id"]) && !empty($_GET["user_id"])){
            //Каст к интам
            $eventId = ctype_digit($_GET["event_id"]) ? intval($_GET["event_id"]) : null;
            $userId = ctype_digit($_GET["user_id"]) ? intval($_GET["user_id"]) : null;
            if($eventId !== null && $userId !== null){
                //Записываем запрос на вступление на мероприятие
                $res = SqlHelper::RequestUserJoin($eventId, $userId, $db);
                if($res){
                    // Обновляем кол-во запросов на вступление
                    $resUpdate = SqlHelper::UpdateEventJoinRequestsCount($eventId, $db);
                    // Пишем ответ для вывода на мобиле (До JSON decode он будет непонятными символами)
                    if($resUpdate){echo json_encode(ResponseWriter::http_response_header()[200]);}
                    else{echo json_encode(ResponseWriter::http_response_header()[400]);}

                }
                else{
                    echo json_encode(ResponseWriter::http_response_header()[400]);
                }
            }
            else{
                echo json_encode(ResponseWriter::http_response_header()[400]);
            }
        }
        else{
            echo json_encode(ResponseWriter::http_response_header()[400]);
        }
    }
    else{
        echo json_encode(ResponseWriter::http_response_header()[400]);
    }

?>