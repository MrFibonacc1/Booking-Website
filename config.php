<?php 

//This is a config file
//This file is very important is included in most of the PHP files
//This is where the code actually connects to the database
//The server and details are provided by PHPMyAdmin

// $server = "localhost";
// $user = "root";
// $pass = "";
// $database = "login_register";

// $conn = mysqli_connect($server, $user, $pass, $database);



// if (!$conn) {
//     die("<script>alert('Connection Failed.')</script>");
// }

 ?> <?php


$server = "sql307.epizy.com";
$user = "epiz_31249316";
$pass = "j8i7xIW2Nn";
$database = "epiz_31249316_main";

$conn = mysqli_connect($server, $user, $pass, $database);



if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>