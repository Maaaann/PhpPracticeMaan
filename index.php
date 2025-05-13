<?php

require_once __DIR__."/includes/app.php";





// $data = db_create('users',[
//     'name'=>'fgh',
//     'email'=>'fgf@yahoo',
//     'password'=>'dasaffaadndon'
// ]); 


db_update('users',[
    'name'=> "tayeeeb",
    'email'=> "testets@gmail.com",
    'password'=>'dasaffaadndon'
],4);