<?php 

//Other pages will be sent here only when a user is loggin out
//This will just destroy the session which will reset the values and send user back to home page

session_start();
session_destroy();

header("Location: index.php");

?>