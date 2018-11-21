<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'cms_system';

$conn = mysqli_connect($server,$user,$password,$db);
// Change character set to utf8
mysqli_set_charset($conn,"utf8");

// $veritabani = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $user, $password);

if(!$conn){
    die("Connection Failed!:".mysqli_connect_error());
}
?>