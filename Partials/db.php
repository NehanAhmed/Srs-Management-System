<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'srs';

$connect = mysqli_connect($host, $username, $password, $db);


if (!$connect) {
    die("Error" . mysqli_connect_error());
}else{
    // echo "added";
}

?>