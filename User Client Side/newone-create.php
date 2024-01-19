<?php 

//This page is where the user can select the location to make their booking
//It will first get requried variables from the global variables that were created upon user login
//Check if user is not blocked and accepted into a valid school

//Then will get number of unique locations in the table
//The number will be put in a for loop, each cycle creating a new div box and row,
//With the data of each location
//Each new div box created is in the shape of a form
//So every time a div box is clicked, it will redirect the user to the booking page 
//Where the user can make bookings in that location


include 'config.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$get_id = ($_SESSION['id']);


$username_display = "SELECT username FROM users WHERE id='$get_id'";
$username_result = mysqli_query($conn, $username_display);
$username_check = mysqli_num_rows($username_result);

if($username_check > 0 ){

    while ($row = mysqli_fetch_assoc($username_result)){
        // $current_code = $row['1'];
        $username = $row['username'];

    }
}



$school_display = "SELECT school_1 FROM users WHERE username='$username'";
$name_result = mysqli_query($conn, $school_display);
$name_check = mysqli_num_rows($name_result);

if($name_check > 0 ){

    while ($row = mysqli_fetch_assoc($name_result)){
        // $current_code = $row['1'];
        $school_name = $row['school_1'];

    }
}



$request_display = "SELECT access_1 FROM users WHERE username='$username'";
$request_result = mysqli_query($conn, $request_display);
$request_check = mysqli_num_rows($request_result);

if($request_check > 0 ){

    while ($row = mysqli_fetch_assoc($request_result)){
        // $current_code = $row['1'];
        $get_access_number = $row['access_1'];

    }
}

$table_display = "SELECT locations_1 FROM users WHERE username='$username'";
$table_result = mysqli_query($conn, $table_display);
$table_check = mysqli_num_rows($table_result);

if($table_check > 0 ){

    while ($row = mysqli_fetch_assoc($table_result)){
        // $current_code = $row['1'];
        $get_table_name = $row['locations_1'];

    }
}










?>


<!DOCTYPE html>
<html lang="en">



<head>
    
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
 
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style2.css">

</head>

<body id="teach-content">

<!-- <div id="teach-nav"> -->
    <div class="adminnavigation">

<ul>
        <li = class="list">
            <a href="newone.php">
                <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Profile</span>
               
                
            </a>
        </li>

        <!-- <li = class="list">
            <a href="#viewbookings">
            <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Password</span>
                
            </a>
        </li> -->

        <li = class="list">
            <a href="#admin-settings">
                <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">View Bookings</span>
            </a>
        </li>

        <li = class="list active">
            <a href="newone-create.php">
                <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Add Booking</span>
            </a>
        </li>

        <li = class="list">
            <a href="newone-join.php">
                <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Join Code</span>
            </a>
        </li>

        <li = class="list">
            <a href="index.php">
            <span class = "icon"><ion-icon name="home-outline"></ion-icon></span>

                <span class = "title">Home</span>
            </a>
        </li>

        <li = class="list">
            <a href="logout.php">
                <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Sign Out</span>
            </a>
        </li>


    </ul>

</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>

const list = document.querySelectorAll('.list');
function activeLink(){
    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');
}
list.forEach((item) =>
item.addEventListener('click',activeLink));
</script>

<div id="teach-pages">

<div class="profile-title-menu">
<h1 class="heading"> <span></span>Add Booking</h1>
<h3 class="heading_sub"> <br><br> (Choose Location)   </h3>

<style>

    .heading_sub{
        font-family: 'Roboto', sans-serif;
        margin-left: 30px;
    }

</style>
<!-- <a href="admin-page-location.php" class="request_1_active">Current Locations<hr></a> -->
</div>

<div class="teach-page-1" >
<?php 

if($get_access_number == 3){


    $r = mysqli_query($conn, "SELECT DISTINCT(location), school FROM $get_table_name ");

    while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
    
        //  $fullname = $row[0];
        //  $email = $row['1'];
    
        //  $_SESSION['name'] = $fullname;
        //  $_SESSION['email'] = $email;
            
      
        $location_name = $row[0];
        $get_school_name = $row[1];

        ?>

<!-- <button type="submit"name="submitbtn" value="" onclick="location.href='index.php'" class="request_box requestbutton"> -->

    

    <form action="newone-create.php" method="POST">
        <input type="hidden" name="location" value="<?php echo $location_name ?>">
     

        <!-- <input type="submit" name="submitbtn" class="request_buttons_new" id="req_btn_2" value="Accept"> -->
        <button type="submit" name="submit" value="" onclick="location.href='index.php'" class="request_box requestbutton">

        <h1> <?php echo $location_name   ?></h1>
        <h3 class="move_left_h3"><br><br>(<?php echo $get_school_name   ?>)</h3>

        </button>

        
    </form>

    
<?php

if (isset($_POST['submit'])) {
	$location_redirect = $_POST['location'];
    $_SESSION['chosen_location'] = $location_redirect;



		header("Location: newone-add-booking.php");

}


?>







        <style>

.move_left_h3{
    margin-left: 20px;
}

</style>
    











<?php 
    }
} ?>


    




</div>

</div>

</body>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>





</html>

