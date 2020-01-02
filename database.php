<?php

$username="root"; 
$password="";
$hostname = "localhost";  
$db = "studyforfuture"; 
$connect = new PDO("mysql:hostname=$hostname;db=$db;charset=utf8;",$username,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

?>