<?php

if(!function_exists('db_create')){
    function db_create($table,array $data){
        $sql = "INSERT INTO ".$table;
        $columns = '';
        $values = '';

        foreach($data as $key=>$value){
            $columns .= $key.","; 
            $values .=" '".$value."',"; 
        }
        $columns = rtrim($columns,',');
        $values = rtrim($values,',');
        echo $values;


        mysqli_query($GLOBALS['connect'],$sql);
        

    }
}

db_create('users',['name'=>'value', 'email'=>'t@yahoo']); 