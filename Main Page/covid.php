<?php 

//This page is just informational, it contains covid guidelines
//Option to click on button which will take you to Ottawa screen test
//Page contains text and pictures

session_start();


?>

<!DOCTYPE html>
<html>
    <head>
        <title>COVID 19 Section</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <link rel="stylesheet" type="text/css" href="home.css">
    </head>
    <body id="covid-body">

    <header id="homeheader">
		
		<nav>	
		 <ul class="nav-bar"><div class="bg"></div>

        <?php if (($_SESSION['username']) or ($_SESSION['adminusername']) ) { ?> 

        <li><a class="nav-link active" href="index.php">Home</a></li>
        <li><a class="nav-link" href="contactus.php">Contact</a></li>
        <li><a class="nav-link" href="logout.php">Log Out</a></li>

        <?php } else { ?> 

        <li><a class="nav-link active" href="index.php">Home</a></li>
        <li><a class="nav-link" href="adminlogin.php">Admin</a></li>
        <li><a class="nav-link" href="contactus.php">Contact</a></li>
        <li><a class="nav-link" href="login.php">Login</a></li>
        <li><a class="nav-link" href="register.php">Register</a></li>

        <?php } ?>

			<!-- <li><a class="nav-link" href = "#home" onclick="openLoginForm()" >Login</a></li>
			<li><a class="nav-link" href="#home" onclick="openSignupForm()" >Sign up</a></li> -->


			<!-- <li><a href="#home" ><button class ="nav-btn" onclick="openLoginForm()">Login</button></a></li>
			<li><a href="#home" ><button class ="nav-btn" onclick="openSignupForm()">Sign Up</button></a></li> -->

		 </ul>

			
		</nav>





	</header>





        <div class="section">
            <div class="container">
                
                <!-- <a href="index.php" class="covid-back">Home</a> -->

                
                <div class="title">
                    <h1>COVID 19 </h1>
                    </div>
                    <div class="covid-content">
                        <div class="covid-article">
                            <h3>Safety Measures</h3>
                            <p>- Students are exempt from wearing masks outdoors or when active in the gym.<br>- Practice social distance to the best of your ability at all times.<br>- Complete the screening test prior to games.</p>
                            <div class="button">
                                <button class="btn btn-success" onclick=" window.open('https://covid-19.ontario.ca/school-screening/')"> Screening Tool</button>
 
                            </div>
                        </div>
                    </div>
                    <div class="covid-image-section">
                        <img src="https://cdn.cnn.com/cnnnext/dam/assets/200828163542-01-gym-class-online-school-wellness-large-169.jpg">
                    </div>
<div class="covid-social">
    <a href=""><i class="fab fa-facebook-f"></i></a>
    <a href=""><i class="fab fa-twitter"></i></a>
    <a href=""><i class="fab fa-instagram"></i></a>
 
</div>
                </div>
            </div>
    </body>
</html>

