<?php
    require_once("../../database/database.php");
    require_once("../../utils/responseWriter.php");
    ResponseWriter::getArrayFromDataBase($db, "projects");
?>