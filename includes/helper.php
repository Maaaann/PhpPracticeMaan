<?php


//---------------Inserting Data-------------//
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

//---------------Updating Data-------------//

if (! function_exists('db_update')){
    function db_update(string $table , array $data , int $id){
        $sql = "update ".$table." set ";
        $column_value = '';

        foreach($data as $key=>$value){
            $column_value .= $key."'='".$value."' , '"; 
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

db_update('users',[
    'name'=> "tayeeeb",
    'email'=> "testets@gmail.com",
        'password'=>'dasaffaadndon'
],5);