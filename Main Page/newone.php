<?php 

//This is the main profile page for teacher when they first login
//The page will get the requried variables from the global variables like the user's ID
//The user's ID used to get other information about the user
//This will display the user's current name in a box and gives them the choice to edit them and change
//their name or email

//When submitting the PHP form, it will connect to the database and check if the new name or email is in use
//If input not in use, it will update the user's details in the database
//All connections to the database is done through MySqli Queries


include 'config.php';

error_reporting(0);

session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$username = ($_SESSION['username']);
$get_id = ($_SESSION['id']);






$name_display = "SELECT username FROM users WHERE id='$get_id'";
$name_result = mysqli_query($conn, $name_display);
$name_check = mysqli_num_rows($name_result);

if($name_check > 0 ){

    while ($row = mysqli_fetch_assoc($name_result)){
        // $current_code = $row['1'];
        $get_name = $row['username'];

    }
}



$email_display = "SELECT email FROM users WHERE id='$get_id'";
$email_result = mysqli_query($conn, $email_display);
$email_check = mysqli_num_rows($email_result);

if($email_check > 0 ){

    while ($row = mysqli_fetch_assoc($email_result)){
        // $current_code = $row['1'];
        $get_email = $row['email'];

    }
}












if (isset($_POST['submit_2'])) {
	$new_name = ($_POST['name']);
    $new_email = ($_POST['email']);
    

    
    
	$sql = "SELECT * FROM users WHERE id = '$get_id'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		// $row = mysqli_fetch_assoc($result);

        $con = mysqli_query($conn, "Update users set username = '$new_name', email = '$new_email' where id = '$get_id'");

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Wow! User Registration Completed.')</script>";

            
            $get_name = $new_name;
            $get_email = $new_email; 
            header("Location: newone.php");
            // $adminusername = $new_name;



        
            
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }



	} else {
		echo "<script>alert('Woops!  or Password is Wrong.')</script>";
	}

}








// if (isset($_POST['submit'])) {

//     $code_1 = ($_POST['input_code_1']);
    
//     // $code_2 = ($_POST['input_code_2']);

// $sql = "SELECT * FROM adminusers WHERE special_code ='$code_1'";
// $code_result = mysqli_query($conn, $sql);

// $result_check = mysqli_num_rows($code_result);

//             if($result_check > 0 ){
//                 $access_1 = 2;


//                 $sql = "INSERT INTO users (code_1, access_1)
//                                 VALUES ('$code_1', '$access_1')";

//             $result = mysqli_query($conn, $sql);
//             if ($result) {
//                 echo "<script>alert('Wow! User Registration Completed.')</script>";
//                $code_1 = "";
//                $access_1 = "";
//             } else {
//                 echo "<script>alert('Woops! Something Wrong Went.')</script>";
//             }

// }
// else {
//     echo "<script>alert('Woops! No School Exists.')</script>";
// }


// }








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
        <li = class="list active">
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

        <li = class="list">
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
<h1 class="heading"> <span></span> schools </h1>
</div>


<div class="code-center">


<form action="newone.php" method="POST" class="special-code">

                  

          

                  <div class="input-content">
                              <input type="text" placeholder="fullname" name="name" value="<?php echo $get_name?>" >
                          </div>

                  <div class="input-content" id="input-content-id">
                              <input type="email" placeholder="email" name="email" value="<?php echo $get_email?>">
                          </div>
                          
                         
                  


                  <div class="input-content">
                              <button name="submit_2" class="code-button">Update</button>
                          </div>

                  </form>


</div>








</section>














</div>

</body>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>





</html>

