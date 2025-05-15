<?php


//---------------Inserting Data Query-------------//
// INSERT INTO users (name,email,password) VALUES ('John','man@gmail.com','123456') 
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
        $sql .= " (".$columns.") VALUES (".$values.")";  // the full SQL statment is assembled here
        
        mysqli_query($GLOBALS['connect'],$sql);
        $id =  mysqli_insert_id($GLOBALS['connect']);
        $first = mysqli_query($GLOBALS['connect'],"select * from ".$table." where id=".$id);
        $data= mysqli_fetch_assoc($first);
        mysqli_close($GLOBALS['connect']);
        return $data;
    }
}

//---------------Updating Data Query-------------//
// update users set name='man' , 'email'='test@gmail.com' , 'password'='123' , ' where id=5;
if (! function_exists('db_update')){
    function db_update(string $table , array $data , int $id):array{
        $sql = "update ".$table." set ";
        $column_value = '';

        foreach($data as $key=>$value){
            $column_value .= $key."='".$value."','"; 
        }
    
        $column_value = rtrim($column_value,',');
        $sql .= $column_value." where id=".$id.";";
        echo $sql;
        mysqli_query($GLOBALS['connect'],$sql);
        $first = mysqli_query($GLOBALS['connect'],"select * from ".$table." where id=".$id);
        $data= mysqli_fetch_assoc($first);
        mysqli_close($GLOBALS['connect']);
        return $data;


    }
}


//---------------Deleting Data Query-------------//
//DELETE FROM table_name WHERE condition

if(!function_exists('db_delete')){
    function db_delete(string $table, int $id){
        $query = mysqli_query($GLOBALS['connect'],"DELETE FROM " . $table . " WHERE id = " . $id);
        mysqli_close($GLOBALS['connect']);
        return $query;
    }
}

