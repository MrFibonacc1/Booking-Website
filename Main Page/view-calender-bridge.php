<?php

//This is a bridge for the calender page
//When the PHP form was submitted, all the inputs and selections are being sent to this page which then sends it back
//This is done to fix the problems of multiple PHP forms

include 'config.php';

error_reporting(0);


session_start();

// $received_name = $_SESSION['name'];
// $received_email = $_SESSION['email'];

$received_location = $_POST['location_2'];
$_SESSION['view_location'] = $received_location;







 header("Location: view-calendar.php");
