<?php


// Inserting data 

if(!function_exists('db_create')){
    function db_create($table,array $data):array{
        $sql = "INSERT INTO ".$table;
        $columns = '';
        $values = '';

        foreach($data as $key=>$value){
            $columns .= $key.","; 
            $values .=" '".$value."',"; 
        }
        $columns = rtrim($columns,',');
        $values = rtrim($values,',');
        $sql .= " (".$columns.") VALUES (".$values.")"; 
        $query = mysqli_query($GLOBALS['connect'],$sql);
        $id =  mysqli_insert_id($GLOBALS['connect']);
        $first = mysqli_query($GLOBALS['connect'],"select * from ".$table." where id=".$id);
        mysqli_close($GLOBALS['connect']);
        $data= mysqli_fetch_assoc($first);
        return $data;
    }
}

