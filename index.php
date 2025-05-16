<?php

require_once __DIR__."/includes/app.php";





// $data = db_create('users',[
//     'name'=>'fgh',
//     'email'=>'fgf@yahoo',
//     'password'=>'dasaffaadndon'
// ]); 


// db_update('users',[
//     'name'=> "tayeeeb",
//     'email'=> "testets@gmail.com",
//     'password'=>'dasaffaadndon'
// ],4);


// db_delete('users',5);


// db_find('users',1);

// db_find_by_query('users', 'where email=""');


$users = db_get('users',"where email LIKE '%g%'");
if($users['num']> 0 ){
    while($row = mysqli_fetch_assoc($users['query'])){
        echo $row['email']."<br>";
    }

}

if (!empty($GLOBALS['query'])){
    mysqli_free_result($GLOBALS['query']);

}
mysqli_close($connect);
