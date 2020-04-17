<?php
    //http_response_code(501);

    include("debug_funcs.php");
    include("database.php");
    
    echo $_POST . $_GET();

/*
    if(isset($_GET["name"])){
        echo $_GET["name"];
    }else{
        print_r("name not stated");
    }
*/
?>