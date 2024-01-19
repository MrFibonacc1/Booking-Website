<?php 

//This page is where the use can add a code and request to join a school
//First required variables are recieved from the global variables created upon logging in

//Their a input field which is a PHP form
//Upon submitting the form, it will check if the code matches a school in the database
//If there is a match, it will get the schools name and display it as requested to join ......
//The code will update the teachers status to requested in the database
//A request will then be sent to join the school

//Once accepted, the text will say, you have joined .....
//And update users status to accepted

include 'config.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$request_display = 0;
$school_req = "School:";


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
        $request_display = $row['access_1'];

    }
}

$code_display = "SELECT code_1 FROM users WHERE username='$username'";
$code_result = mysqli_query($conn, $code_display);
$code_check = mysqli_num_rows($code_result);

if($code_check > 0 ){

    while ($row = mysqli_fetch_assoc($code_result)){
        // $current_code = $row['1'];
        $get_code = $row['access_1'];

    }
}





// if($request_display == 3){

   


//     $loc_display = "SELECT locations_table FROM adminusers WHERE special_code = '$get_code'";
//     $loc_result = mysqli_query($conn, $loc_display);
//     $loc_check = mysqli_num_rows($loc_result);
    
//     if($loc_check > 0 ){
    
//         while ($row = mysqli_fetch_assoc($loc_result)){
//             // $current_code = $row['1'];
//             $get_table_name = $row['locations_table'];
    
//         }


//         $sql = "Update users set locations_1 = '$get_table_name' where id = '$get_id'";
					
// 			$result = mysqli_query($conn, $sql);




//     }




    
// }












if (isset($_POST['submit'])) {
    
	
    $code_1 = ($_POST['code']);
    

	$sql = "SELECT * FROM adminusers WHERE special_code='$code_1' ";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
	
     
        $con = mysqli_query($conn, "Update users set code_1 = '$code_1' where username = '$username'  ");
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('working.')</script>";

            $school_come = "SELECT school FROM adminusers WHERE special_code='$code_1' ";

            $school_result = mysqli_query($conn, $school_come);
            $school_check = mysqli_num_rows($school_result);
            
            if($school_check > 0 ){
            
                while ($row = mysqli_fetch_assoc($school_result)){
                    // $current_code = $row['1'];
                    $school_name = $row['school'];
                    $request_sent = 1;
                    $saveinto = mysqli_query($conn, "Update users set school_1 = '$school_name', access_1 = '$request_sent' where username = '$username'  ");
            
                }
            }






            
        }else{
            echo "<script>alert('mistake!scascong.')</script>";
        }






	} else {
		echo "<script>alert('Woops!scascong.')</script>";
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

        <li = class="list">
            <a href="newone-create.php">
                <span class = "icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class = "title">Add Booking</span>
            </a>
        </li>

        <li = class="list active">
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











<section class="teach-page" id="join-code">

<div class="profile-title">
<h1 class="heading"> <span></span>Join Code</h1>
</div>
<div class="code-center">

                <form action="newone-join.php" method="POST" class="special-code" id="code-1-form">

                

                
                
                <?php if ($request_display == 1) {
                    $school_req = "School: <br> (Requested)";
                    ?>

                    <style>

                    .code-content{
                        background-color: yellow;
                    }

                        </style>

                <?php } elseif ($request_display == 3) {
                    
                    $school_req = "School: <br> (Joined)";
                    
                    
                    ?>

                <style>

                    .code-content{
                        background-color: green;

                    }

                        </style>

                        <?php }else { 
                            $school_req = "School:";

                            ?>

                            <style>

                    .code-content{
                        background-color: white;
                    }

                        </style>

                        <?php }?>
                




                        <div class="code-content">
                <h1><?php echo $school_req ?></h1>
                <h2><?php echo $school_name ?></h2>
                </div>


                <div class="input-content">
                            <input type="text" placeholder="Code" name="code" value="<?php echo $_POST['code']; ?>" >
                        </div>

                <div class="input-content">
                            <button name="submit" class="code-button" id="code-button">Join</button>
                        </div>

                </form>

       
    </div>

    
<!-- 
    <div class="code-center">

                <form action="" method="POST" class="special-code">

                <div class="code-content">
                <h1>School:</h1>
                <h2>Not Enrolled
                     
                
            </h2>
                </div>

                <div class="input-content">
                            <input type="text" placeholder="Code" name="code" value="" >
                        </div>

                <div class="input-content">
                            <button name="submit" class="code-button">Join</button>
                        </div>

                </form>
    </div> -->
</section>




</div>

</body>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>





</html>

