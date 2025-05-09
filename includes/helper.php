<?php

if(!function_exists('db_create')){
    function db_create($table,array $data){
        $sql = "";

        mysqli_query($GLOBALS['connect'],$sql);
        

    }    
}

db_create([]); 