<?php 

//This page is where the admin can add new locations 
//Their is an input field which is just a PHP form with one input field
//When the submit is pressed the users input will be saved
//It will connect to the SQL database and check if that location exists or not
//If that location doesn't exist, it will add an instance of it into the database
//When inserting the new location into the database, it will get the admin's details and their table name
//When the table name is recieved thorugh a method, it will have the exact location to where to insert the
//new location

include 'config.php';

error_reporting(0);


session_start();

if (!isset($_SESSION['adminusername'])) {
    header("Location: index.php");
}


$get_id = ($_SESSION['id']);

$access_check_1 = "1";

$code_1 = "SELECT special_code FROM adminusers WHERE id='$get_id'";
$code_result = mysqli_query($conn, $code_1);
$code_check = mysqli_num_rows($code_result);

if($code_check > 0 ){

    while ($row = mysqli_fetch_assoc($code_result)){
        // $current_code = $row['1'];
        $get_code = $row['special_code'];

    }
}


$username_1 = "SELECT adminusername FROM adminusers WHERE id='$get_id'";
$username_result = mysqli_query($conn, $username_1);
$username_check = mysqli_num_rows($username_result);

if($username_check > 0 ){

    while ($row = mysqli_fetch_assoc($username_result)){
        // $current_code = $row['1'];
        $get_username = $row['adminusername'];

    }
}

$email_1 = "SELECT email FROM adminusers WHERE id='$get_id'";
$email_result = mysqli_query($conn, $email_1);
$email_check = mysqli_num_rows($email_result);

if($email_check > 0 ){

    while ($row = mysqli_fetch_assoc($email_result)){
        // $current_code = $row['1'];
        $get_email = $row['email'];

    }
}

$school_1 = "SELECT school FROM adminusers WHERE id='$get_id'";
$school_result = mysqli_query($conn, $school_1);
$school_check = mysqli_num_rows($school_result);

if($school_check > 0 ){

    while ($row = mysqli_fetch_assoc($school_result)){
        // $current_code = $row['1'];
        $get_school_name = $row['school'];

    }
}

$table_1 = "SELECT locations_table FROM adminusers WHERE id='$get_id'";
$table_result = mysqli_query($conn, $table_1);
$table_check = mysqli_num_rows($table_result);

if($table_check > 0 ){

    while ($row = mysqli_fetch_assoc($table_result)){
        // $current_code = $row['1'];
        $get_table_name = $row['locations_table'];

    }
}









if (isset($_POST['create_location'])) {
	
    $get_location = ($_POST['location']);

    
	// $sql = "SELECT * FROM adminusers WHERE id='$get_id'";
    $fix_name = str_replace(' ','',$get_table_name);
    $get_table = (string)$fix_name;
    $get_description = "This is a location added by the admin";

    $sql = "SELECT * FROM $get_table WHERE location = '$get_location'";
	$result_2 = mysqli_query($conn, $sql);

    if (!$result_2 -> num_rows > 0){

    

    $create = "INSERT INTO $get_table (name, email, description, school_code, location, school)
    VALUES ('$get_username', '$get_email', '$get_description', '$get_code', '$get_location', '$get_school_name')";




    $create_now = mysqli_query($conn, $create);

    }
}



?>


<!DOCTYPE html>
<html lang="en">



<head>
    
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Booking</title>
 
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
            <a href="admin-page-profile.php">
                <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Profile</span>
               
                
            </a>
        </li>

        <li = class="list active">
            <a href="admin-page-location.php">
            <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Locations</span>
                
            </a>
        </li>

        <li = class="list">
            <a href="admin-booking-create.php">
                <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Add Booking</span>
            </a>
        </li>

        <li = class="list">
            <a href="admin-page-code.php">
                <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Code</span>
            </a>
        </li>

        <li = class="list">
            <a href="admin-page-members.php">
                <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Teachers</span>
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


<a href="admin-page-location.php" class="request_1">Current Locations<hr></a>



<a href="admin-page-create.php" class="request_1_active">Add Location<hr></a>



</div>






<div class="teach-page-1" >



 <div class="code-center-new">

                        

                        <form action="admin-page-create.php" method="POST" class="special-code">

                        

                        <div class="input-content">
                                    <input type="text" placeholder="Location" name="location" value="" >
                                </div>

                        <!-- <div class="input-content" id="input-content-id">
                                    <input type="text" placeholder="Schoolname" name="school" value="" >
                                </div> -->


                        <div class="input-content">
                                    <button name="create_location" class="code-button">Add</button>
                                </div>

                        </form>
                        </div>








</div>


</div>

</body>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


</html>