<?php
$host='localhost';
$dbname='raunak';
$pass='';
$user='root';
$conn=new mysqli($host,$user,$pass,$dbname);
if($conn->connect_error){
    echo "Connection Failed";
    die;
}
?>