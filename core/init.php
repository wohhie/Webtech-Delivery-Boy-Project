<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

date_default_timezone_set("Asia/Dhaka");
//error_reporting(0);
session_start();
error_reporting(0);

$GLOBALS['config']  =   array(
    'mysql' =>  array(
        'host'  =>  '127.0.0.1',
        'username'  =>  'root',
        'password'  =>  '',
        'dbname'  =>  'deliveryboy',
    ),
    
    
);



spl_autoload_register(function($class){

    require_once 'classes/'. $class .'.php';
    
});


require_once 'functions/sanitize.php';





/**
 * USER DATA
 */

//CONNECTED TO DATABASE
DB::getInstance();

if(Users::logged_in()){
    
    $role = $_SESSION['role'];
        
    if($_SESSION['role'] == 'STORE') {
        //RETRIVE STORE INFORMATION
        $session_user_id = $_SESSION['user'];
        
        $user_data = Users::user_data($session_user_id,$role, 'store_name', 'store_location', 'owner_name', 'str_owner_email', 'phone', 'store_image_path', 'image', 'str_password', 'created', 'firstname', 'lastname');

        
    }else if($_SESSION['role'] == 'CUSTOMER'){
        //RETRIVE CUSTOMER INFORMATION
        $session_user_id = $_SESSION['user'];

        $user_data = Users::user_data($session_user_id,$role,'username','email', 'password', 'gender', 'firstname', 'lastname', 'address', 'phone','photo', 'user_image_path');

        
    }else{
        echo 'PROBLEM';
    }
    
   
}