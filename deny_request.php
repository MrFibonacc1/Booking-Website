<?php

//This page is used to deny a request when someones tries to join a school system
//When the global variables are received, it will find that persons record and deny it
//It will update their status back to nuetral, which means they can request to join again
//Or when a member is removed from a school, it will reset their data related to the school on the database
//It will then return to the previous page

include 'config.php';

error_reporting(0);


session_start();


$received_name = $_POST['name'];
$received_email = $_POST['email'];
$received_locations_table = $_POST['table'];




$accepted = (int)0;

$school_reset = "";

$code_reset = "";

$location_table_reset = " ";

$con = mysqli_query($conn, "Update users set access_1 = '$accepted', school_1 = '$school_reset', code_1 = '$code_reset'
, locations_1 = '$location_table_reset'
 where username = '$received_name'");

// $con_1 = mysqli_query($conn, "Update users set school_1 = '$school_reset' where username = '$received_name'");

// $con_2 = mysqli_query($conn, "Update users set code_1 = '$code_reset' where username = '$received_name'");



// header("Location: admin-page-requests.php");
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>