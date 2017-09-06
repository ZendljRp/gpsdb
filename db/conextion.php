<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function conn(){
    $user = "root";
    $pass = "";
    $datb = "gpsdb";
    $host = "localhost";
    
    $conn = new mysqli($host, $user, $pass, $datb);
    if($conn->connect_error){
        return $conn->connect_error;
    }else{
        return $conn;
    }
    
}
