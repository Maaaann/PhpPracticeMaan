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
        $GLOBALS['query']= $first;
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

        mysqli_query($GLOBALS['connect'],$sql);
        $first = mysqli_query($GLOBALS['connect'],"select * from ".$table." where id=".$id);
        $data= mysqli_fetch_assoc($first);
        $GLOBALS['query']= $first;
        return $data;


    }
}


//---------------Deleting Data Query-------------//
//DELETE FROM table_name WHERE id= $id

if(!function_exists('db_delete')){
    function db_delete(string $table, int $id){
        $query = mysqli_query($GLOBALS['connect'],"DELETE FROM " . $table . " WHERE id = " . $id);
        $GLOBALS['query']= $query;
        return $query;
    }
}

//---------------Find Data-------------//
//SELECT * FROM table_name WHERE id= $id

if(!function_exists('db_find')){
    function db_find(string $table, int $id){
        $query = mysqli_query($GLOBALS['connect'],"SELECT * FROM " . $table . " WHERE id = " . $id);
        $result = mysqli_fetch_assoc($query);
        $GLOBALS['query']= $query;
        return $result;
    }
}

//---------------Find Data By Query-------------//
// SELECT * FROM {table} {query_str}

if(!function_exists('db_find_by_query')){
    function db_find_by_query(string $table,string $query_str){
        $query = mysqli_query($GLOBALS['connect'],"SELECT * FROM " . $table ." ".$query_str);
        $result = mysqli_fetch_assoc($query);
        $GLOBALS['query']= $query;
        return $result;
    }
}



//---------------Find Multiple Data By Query-------------//


if(!function_exists('db_get')){
    function db_get(string $table,string $query_str){
        
        $query = mysqli_query($GLOBALS['connect'],"SELECT * FROM " . $table ." ".$query_str);
        $num = mysqli_num_rows($query);
        $GLOBALS['query']= $query;
        return [
            'query' => $query,
            'num' => $num,

        ];
    }
}
