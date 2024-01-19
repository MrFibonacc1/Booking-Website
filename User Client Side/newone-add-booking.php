<?php 

//This page will allow teachers to add a booking to the database
//It will first get requried variables from the global variables that were created upon user login
//Check if user is not blocked and accepted into a valid school

//All the inputs are via PHP form, when submitted will save into new variables
//It will check for any previous bookings to avoid double booking
//If everythign is perfect, it will get the table name using my get method,
//Then it will get the PHP form's data and connect to the database to insert 
//it into the correct table

include 'config.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$username = ($_SESSION['username']);

$get_id = ($_SESSION['id']);


$location_redirect = ($_SESSION['chosen_location']);



$email_display = "SELECT email FROM users WHERE id='$get_id'";
$email_result = mysqli_query($conn, $email_display);
$email_check = mysqli_num_rows($email_result);

if($email_check > 0 ){

    while ($row = mysqli_fetch_assoc($email_result)){
        // $current_code = $row['1'];
        $get_email = $row['email'];

    }
}

$code_display = "SELECT code_1 FROM users WHERE id='$get_id'";
$code_result = mysqli_query($conn, $code_display);
$code_check = mysqli_num_rows($code_result);

if($code_check > 0 ){

    while ($row = mysqli_fetch_assoc($code_result)){
        // $current_code = $row['1'];
        $get_code = $row['code_1'];

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


<section class="teach-page" id="admin-profile">
<div class="profile-title"> 
<h1 class="heading"> <span></span>Add Booking</h1>
</div>

    <div class="code-center">


    <form action="newone-add-booking.php" method="POST">

    <div class="booking_main">
            <div class="box_create">
                <div class="input-content specialcase">
                    <input type="text" placeholder="Fullname" name="fullname" value="" required>
                </div>

                <div class="input-content specialcase" id="input-content-id">
                        <input type="text" placeholder="Booking Name" name="booking_name" value="" required>
                </div>

                <div class="input-content specialcase" id="input-content-id">

                    <select name="location" class="select_d">
            
                        <option value=""><?php echo $location_redirect ?></option>

                    <?php
                        $number = mysqli_query($conn, "SELECT DISTINCT(location) FROM $get_table_name ORDER BY location ASC");

                        while ($row = mysqli_fetch_array($number, MYSQLI_NUM)) {

                            $location_name = $row[0];

                            if(!($location_name == $location_redirect)){

                                $pass_location = $location_name;
                  
                    ?>

                            <option value=""><?php echo $pass_location ?></option>

<?php

      }
  }

?>

                    </select>

                </div>
            </div>
        
            <div class="box_create">
                <div class="input-content specialcase">
                        <input type="date" placeholder="dd/mm/yy" name="date" value="" required>
                </div>

                <div class="input-content specialcase" id="input-content-id">
                        <input type="time" placeholder="dd/mm/yy" name="time_start" value="" required>
                </div>

                <div class="input-content specialcase" id="input-content-id">
                        <input type="time" placeholder="dd/mm/yy" name="time_end" value="" required min="2022-01-01">
                </div>
            </div>

    </div>

    <div class="input-content createbooking">
             <button name="submit" class="code-button">Add</button>
    </div>
    </form>


    </div>
<?php

if (isset($_POST['submit'])) {
	$name = ($_POST['fullname']);
    $booking_name = ($_POST['booking_name']);
    $location = ($_POST['location']);

    $date = ($_POST['date']);
    $time_start = ($_POST['time_start']);
    $time_end = ($_POST['time_end']);

    $description = "blank";

		// $row = mysqli_fetch_assoc($result);

        $sql_3 = "INSERT INTO $get_table_name (name, email, description, school_code, location, school, date, time_start, time_end)
			VALUES ('$name', '$get_email', '$description', '$get_code', '$location', '$school_name', '$date', '$time_start', '$time_end')";
			$result = mysqli_query($conn, $sql_3);

        if ($result) {
            echo "<script>alert('Wow! User Registration Completed.')</script>";


            
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }



	

}


?>






</section>



</div>

</body>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>





</html>

