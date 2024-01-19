<?php 

//This is the main home page, the first page when you visit the website
//There is only text and images on this page
//The nav bar contains some PHP to change the options on the nav bar, 
//It checks if a user is loggin in, if they are logged in,
//The nav buttons, log in and sign up are removed and replaced with profile


session_start();


?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
      <title>Portfolio site template</title>
      <link href="home.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
      <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Repl.it_logo.svg/220px-Repl.it_logo.png">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="script.js"></script>

	  <link rel="shortcut icon" type="image/jpg" href="Untitled_design_26_-removebg-preview.png"/>
      
  </head>
    <body>
        
	  
		<!--────────────────Header───────────────-->
	<header id="homeheader">

	<img src="Where_easy_is_easier-removebg-preview.png" class="move_down">
		
		<nav>	
		 <ul class="nav-bar"><div class="bg"></div>

		 <?php if (($_SESSION['username']) or ($_SESSION['adminusername']) ) 
		 		{ ?> 


			
					<li><a class="nav-link" href="#home">Home</a></li>

							
					

					<li><a class="nav-link" href="#links">Links</a></li>
					<li><a class="nav-link" href="contactus.php">Contact</a></li>
					<li><a class="nav-link" href="view-calendar.php">View Bookings</a></li>
					<li><a class="nav-link" href="logout.php">Log Out</a></li>

					<?php if (($_SESSION['username']) ) { ?> 

										<li><a class="nav-link navactive" href="newone.php">Profile</a></li>

							<?php } else { ?> 

										<li><a class="nav-link navactive" href="admin-page-profile.php">Profile</a></li>

							<?php } ?>

		<?php } else { ?> 

					<li><a class="nav-link" href="#home">Home</a></li>
					<li><a class="nav-link" href="#links">Links</a></li>
					<li><a class="nav-link" href="contactus.php">Contact</a></li>
					<li><a class="nav-link" href="view-calendar.php">View Bookings</a></li>
					

		 </ul>
		 </nav>
		 <ul class="nav-bar">
		 			<li><a class="nav-link" href="adminlogin.php">Admin</a></li>
					<li><a class="nav-link" href="login.php">Login</a></li>
					<li><a class="nav-link navactive" href="register.php">Register</a></li>

					</ul>	


		<?php } ?>




			<!-- <li><a class="nav-link active" href="#home">Home</a></li>
			<li><a class="nav-link" href="adminlogin.php">Admin</a></li>
			<li><a class="nav-link" href="#links">Links</a></li>
			<li><a class="nav-link" href="#contact">Contact</a></li>
			<li><a class="nav-link" href="login.php">Login</a></li>
			<li><a class="nav-link" href="register.php">Register</a></li> -->


			<!-- <li><a class="nav-link" href = "#home" onclick="openLoginForm()" >Login</a></li>
			<li><a class="nav-link" href="#home" onclick="openSignupForm()" >Sign up</a></li> -->


			<!-- <li><a href="#home" ><button class ="nav-btn" onclick="openLoginForm()">Login</button></a></li>
			<li><a href="#home" ><button class ="nav-btn" onclick="openSignupForm()">Sign Up</button></a></li> -->

		 <!-- </ul> -->
			
			
		





	</header>

	


	<main id="mainhomepage">
		<!--─────────────────Home────────────────-->
	  <div id="home">
		 <div class="filter"></div>
		 <div class="intro">
		  <h3>If You Want To Know,<br> Look in EduBooking.</h3>
		  <br><br><br><hr class="box_hr"><br><p>From the small stuff to the big picture, EduBooking organizes events so instructors know what to do, why it matters, and how to get it done.</p>
		  <br>
			<style>
				.box_hr{
					width: 100px;
					float: left;
					/* margin-left: -20px; */
				}
				</style>

				<div class="bottom_box">
					<button class="half_button" id="button_1_home">Get Started</button>
					<button class="half_button" id="button_2_home">Watch Video</button>

				</div>

		</div> 
		<div class="box_color"></div>
		<!-- <img src=""> -->
		<div class="picture_1"></div>
		
	  </div>  
		
	  <!--───────────────Projects───────────────-->
	  <!-- <div id="links"> 
		 <h3>Additional Links<hr></h3>

		 <div class = "boxrow1">

			<a href="covid.php"><div class ="box2"><div class = "box-content">Covid Guidelines</div></div></a>
			<a href="contactus.php"><div class ="box2"><div class = "box-content">Contact</div></div></a>
	
		</div>	
		<div class = "boxrow2">
			<a href="aboutus.php"><div class ="box2"><div class = "box-content">About Us</div></div></a>

		</div>
		
		  
	  </div> -->

	  <!-- <ul class="nav-bar"><div class="bg"></div>
		<li><a class="nav-link active" href="#home">Home</a></li>
		<li><a class="nav-link" href="#links">Links</a></li>
		<li><a class="nav-link" href="#contact">Contact</a></li>
		


	 </ul> -->
	 <section id="services">
    <div class="services contain">
      
      <div class="service-bottom">
        <div class="service-item">
          <!-- <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div> -->
		  <hr class="top_up">
          <h2>Stay Organized And Connected</h2>
          <p>Bring your venues work together in one shared space. No matter where you are!</p>
        </div>
        <div class="service-item">
          <!-- <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div> -->
		  <hr class="top_up">
          <h2>One Platform To Manage Events</h2>
          <p>View all your bookings from the same platform. </p>
        </div>
        <div class="service-item">
          <!-- <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div> -->
		  <hr class="top_up">
          <h2>For All Service Based Industries</h2>
          <p>This software allows you create bookings for all venues. Schools. Resraurants. Fields. You Name It!</p>
        </div>

		<div class="service-top">
			<hr class="top_up">
        <h1 class="section-title">Our Mission</h1>
        <p>We aim to provide a secure and efficient booking software that allows users to add and view all bookings. We aim for our website to be used for schools across Canada</p>
		<button class="half_button_new" id="button_1_home"><a href="aboutus.php" class="nav-link none">About Us</a></button>


	</div>

	  <style>

		  .top_up{
			  margin-bottom: 40px;

		  }
		  </style>


        <!-- <div class="service-item">
          <div class="icon four"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Web Design</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div> -->
      </div>
	  
    </div>
  </section>

	


		


		 
		<!--──────────────Contact────────────────-->
	  <!-- <div id="contact">
		  
		   <h3>Contact.<hr></h3>
		   <p>Feel free to contact me on my social media.</p>
		    <div class="social-media">
			  <a href="#" target="_blank"><i class='fab fa-codepen'></i></a>
			  <a href="#" target="_blank"><i class='fab fa-twitter'></i></a>
			  <a href="#" target="_blank"><i class='fab fa-github'></i></a>
			  <a href="#" target="_blank"><i class='fab fa-linkedin-in'></i></a>
			  <a href="#" targt="_blank"><i class="fab fa-youtube"></i></a>
		    </div>
		  </div> -->

	</main>
	  <footer class="copyright">© 2020 
		  <!-- <a href="https://repl.it/@lilykhan" target="_blank"> Lilykhan.</a> -->
     </footer>
	  
  
  </body>
</html>
