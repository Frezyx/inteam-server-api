<?php
class ResponseWriter{

    private static $http_response_header = null;

    public static function http_response_header() {
        if (self::$http_response_header == null) {
           self::$http_response_header = array( 
            200 => "Все хорошо",
            400 => "Что-то не так из-за пользователя",
            500 => "Что-то не так из-за сервера"
            );
        }
        return self::$http_response_header;
    }

    static function getArrayFromDataBase($db, $table, $arrayName){
        $data = array("$arrayName" => array());
        //Берем все данные из таблицы 
        $q = mysqli_query($db, "SELECT * FROM $table");
        //Превращаем строки из бд в асоциативный масиив
        while($row = mysqli_fetch_assoc($q)){
            $data["$arrayName"][] = $row;
        }
        //Выводим перекодированный в json фрмат масиив
        //---Костя--- должен его принять и распарсить на клиенте
        echo json_encode($data);
    }

    static function getJsonArrayFromSqlResult($result){
        echo json_encode(mysqli_fetch_assoc($result));
    }

}

?>