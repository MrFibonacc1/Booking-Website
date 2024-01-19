<?php 

//This is a contact us page
//On this page, there is a html form where users can send any questions to us
//When you press submit the input is saved as multiple variable which are directly sent to a
//thrid party service called formspree. They collect the data and then send it to us
//Only needed to connect a link to form

session_start();


?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="referrer" content="origin">
 
        <title>Contact Us Page</title>
        <link rel="stylesheet" type="text/css" href="home.css">
    </head>
    <body id="covid-body">

    <header id="homeheader">
		
		<nav>	
		 <ul class="nav-bar"><div class="bg"></div>

         <?php if (($_SESSION['username']) or ($_SESSION['adminusername']) ) { ?> 

        <li><a class="nav-link active" href="index.php">Home</a></li>
        <li><a class="nav-link" href="logout.php">Log Out</a></li>

        <?php } else { ?> 

        <li><a class="nav-link active" href="index.php">Home</a></li>
        <li><a class="nav-link" href="adminlogin.php">Admin</a></li>
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


        <section class="contact-page">
        <!-- <a href="index.php" class="covid-back">Home</a> -->

            <div class="covid-content">
                <h2>Contact Us</h2>
                <p>Use this page to report any bugs or issues that you have encountered.</p>
            </div>
            <div class="contact-container">
                <div class="contactInfo">
                    <div class="contact-box">
                        <div class="icon"></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>4 The Pkwy,<br>Ottawa, Ontario</p>
                        </div>
                    </div>
                    <div class="contact-box">
                        <div class="icon"></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>613-592-3361</p>
                        </div>
                    </div>
                    <div class="contact-box">
                        <div class="icon"></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>noreply@ocdsb.ca</p>
                        </div>
                    </div>
                </div>
                <div class="contactForm">
                    <form action="https://formspree.io/f/xrgrndwr" method="POST">
                        <h2>Send Message</h2>
                        <input type="hidden" name="_subject" value="NEW SUBMISSION">
                        <div class="inputBox">
                            <input type="text" name="Full Name" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="email" name="Email" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea name="Message" required="required"></textarea>>
                            <span>Type your message...</span>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="" value="Send">
                        </div>
 
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>

