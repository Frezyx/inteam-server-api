<?php
class ResponseWriter{

    static function getArrayFromDataBase($db, $table){
        $data = array();
        //Берем все данные из таблицы 
        $q = mysqli_query($db, "SELECT * FROM $table");
        //Превращаем строки из бд в асоциативный масиив
        while($row = mysqli_fetch_assoc($q)){
            $data[] = $row;
        }
        //Выводим перекодированный в json фрмат масиив
        //---Костя--- должен его принять и распарсить на клиенте
        echo json_encode($data);
    }

}

?>