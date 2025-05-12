<?php


//---------------Inserting Data-------------//

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
        
        // data is converted into associative array by fetching it with this funciton
        $data= mysqli_fetch_assoc($first);
        mysqli_close($GLOBALS['connect']);
        return $data;
    }
}

//---------------Updating Data-------------//

if (! function_exists('db_update')){
    function db_update(string $table , array $data , int $id){
        $sql = "update ".$table." set ";
        $columns = '';
        //$values = '';

        foreach($data as $key=>$value){
            $columns .= $key."'='".$value."' and '"; 
            //$values .=" '".$value."',"; 
        }
    
        $columns = rtrim($columns,'and ');
        //$values = rtrim($values,',');
        $sql .= $columns." where id=".$id;
        echo $sql;
        //mysqli_query($GLOBALS['connect'],$sql);



    }
}

db_update('users',[
    'name'=> "tayeeeb",
    'email'=> "testets@gmail.com",
        'password'=>'dasaffaadndon'
],5);