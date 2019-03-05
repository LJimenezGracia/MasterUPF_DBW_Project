<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135000982-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135000982-1');
</script>


<!DOCTYPE HTML>
<!--
	Theory by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<title>PrimerSTOCK</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="#one" class="logo">Registration / Log in</a>
					<!-- <a href="index.html" class="logo"><img src="images/PrimerStock.svg" alt="logo" height="50" width="125"/></a> -->
					<nav id="nav">
						<!-- <a href="#one">Registration / Log in</a> -->
						<a href="#two">Services</a>
						<a href="#three">Statistics</a>
						<a href="#four">About</a>
						<a href="#five">Contact us</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>


		<!-- Banner -->
			<section id="banner">
			</br>
				<img src="images/PrimerStock_initial.png" alt="logo" height="125" width="500" class="responsive"/>
				<!-- <h1>PrimerSTOCK</h1> -->
				<p>PrimerStock is a new web application that provides a personalized </br>
					and dynamic primer database for private laboratory use,</br>
					 allowing a quick and effective primer search.</p>
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
						<article>
							<header>
								<h3>Laboratory registration</h3>
							</header>
							<p>Do you handle a huge number of primers?</br>
								Are you thinking of something bigger? </br>
								Just create your own primer database!</p>
							<footer>
								<a href="users/labform.php" class="button special">Register your lab!</a>
							</footer>
						</article>
						<article>
							<header>
								<h3>User sign up</h3>
							</header>
							<p>Do you need a personal account?</br>
								Has your lab already signed up?</br>
								Create your account using your lab code!</p>
							<footer>
								<a href="users/signupform.php" class="button special">Sign up!</a>
							</footer>
						</article>
						<article>
							<header>
								<h3>Log in</h3>
							</header>
							<p>Already a member?</br>
								Use your personal account and lab code</br>
								 to access your private area!</p>
							<footer>
								<a href="users/loginform.php" class="button special">Log in!</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style1 special">
				<div class="inner">
					<header class="align-center">
						<h2>Services</h2>
						<p>PrimerSTOCK provides a wide range of primer related services to research laboratories and industries.<br>
					Being a small firm, we are able to give our clients personalized quality service.<br>
					Below, we have listed the services that we offer to our clients along with a brief description.</p>
					</header>
					<div class="flex flex-2">
						<article>
							<h3>Primer storage</h3>
								<p align="justify">We provide an user-friendly database where to store the most relevant and
								useful primer information, which will be share among all laboratory workers.</p>
							<h3>Primer search</h3>
								<p align="justify">It is possible to perform different searches depending on the users' needs:
								a quick search, an advance search by selecting several fields or a BLAST to the database,
								which checks if	there are any primers in your database that could amplify the target sequence.</p>
							<h3>Primer resources</h3>
								<p align="justify">We facilitate several links to useful primer tools, which vary among
								primer designing, primer evaluating or external primer databases, and links to providers,
								to directly order new primers.</p>
						</article>
						<article>
							<h3>Are you new here? Don't worry, we have the solution...</h3>
							<div class="video">
								<video width=100% height=auto; controls>
									<source src="images/primerstock.mp4" type="video/mp4">
								  </video> 
							</div>
							<br>
							<a href="manual.pdf" target="_blank" class="button" >PrimerSTOCK User Guide</a>
						</article>
					</div>
				</div>
			</section>

		<!-- Three -->
		<section id="three" class="wrapper special">
				<div class="inner">
					<header class="align-center">
						<h2>Statistics</h2>
					</header>
					<iframe width="1000" height="400" src="https://datastudio.google.com/embed/reporting/1bslfGyS69lpfWD9KwqYbHQLiSggoa4-F/page/As5i" frameborder="0" style="border:0" allowfullscreen class="responsive-b" ></iframe>
					<br>

					<?php
					include('connection.php');
					$con = getdb();

					$numlabs = mysqli_query($con,"SELECT COUNT(*) FROM Lab");
					$numusers = mysqli_query($con,"SELECT COUNT(*) FROM Users");
					$numprimers = mysqli_query($con,"SELECT COUNT(*) FROM Primer");

					$valuenumlabs = mysqli_fetch_assoc($numlabs);
					$valuenumusers = mysqli_fetch_assoc($numusers); 
					$valuenumprimers = mysqli_fetch_assoc($numprimers); 

					$con->close();
					?>
					<p></p>
				<div class="flex flex-3">
						<div class="box">
							<h3>Number of registered labs</h3>
							<h2><?php print($valuenumlabs['COUNT(*)'])?></h2>
						</div>
						<div class="box">
							<h3>Number of current users</h3>
							<h2><?php print($valuenumusers['COUNT(*)'])?></h2>
						</div>
						<div class="box">
							<h3>Number of primers stored</h3>
							<h2><?php print($valuenumprimers['COUNT(*)'])?></h2>
						</div>
				</div>
			</section>


		<!-- Four -->
		<section id="four" class="wrapper style1 special">
				<div class="inner">
					<header>
						<h2>About us</h2>
						<p>PrimerSTOCK is a web application created by a group of four students from the University 
							Pompeu Fabra (UPF)</br> of Barcelona during their Master's degree subject Databases and Web
							Development.<br></p>
						<p>The project came up as a way of digitalizing and improving everyday laboratory tasks,<br>
							helping not only to organize and share all primers information and details within a lab,<br>
							but also to have a precise control of primers' storage position, available stocked and ordered primers.
							</p>
					</header>
					<div class="flex flex-4">
						<div class="box person">
							<div class="image round">
								<img src="images/Alda.jpg" alt="Person 1" />
							</div>
							<h3>Alda Sabalić</h3>
							<p>MSc in Bioinformatics for Health Sciences at UPF. BSc in Physics at University of Zagreb.</p>
							<ul class="icons"><li><a href="https://www.linkedin.com/in/alda-sabalic/" class="icon-a fa-linkedin" style="font-size: 1.5em;">
								<span class="label">Linkedin</span></a></li></ul>
						</div>
						<div class="box person">
							<div class="image round">
								<img src="images/Laura.jpg" alt="Person 2" />
							</div>
							<h3>Laura Jiménez</h3>
							<p>MSc in Bioinformatics for Health Sciences at UPF. BSc in Biomedical Sciences at University of Barcelona.</p>
							   <ul class="icons"><li><a href="https://www.linkedin.com/in/ljimenezgracia" class="icon-a fa-linkedin" style="font-size: 1.5em;">
									<span class="label">Linkedin</span></a></li></ul>
						</div>
						<div class="box person">
							<div class="image round">
								<img src="images/Bea.jpg" alt="Person 3" />
							</div>
							<h3>Beatriz Urda</h3>
							<p>MSc in Bioinformatics for Health Sciences at UPF. BSc in Biochemistry at University of Granada.</p>
							<ul class="icons"><li><a href="https://www.linkedin.com/in/beatriz-urda-a55864a9/" class="icon-a fa-linkedin" style="font-size: 1.5em;">
									<span class="label">Linkedin</span></a></li></ul>
						</div>
						<div class="box person">
							<div class="image round">
								<img src="images/Carla.jpg" alt="Person 4" />
							</div>
							<h3>Carla Castignani</h3>
							<p>MSc in Bioinformatics for Health Sciences at UPF. BSc in Human Biology at University Pompeu Fabra.</p>
							<ul class="icons"><li><a href="https://www.linkedin.com/in/carla-castignani-viladomiu-a34202171/" class="icon-a fa-linkedin" style="font-size: 1.5em;">
									<span class="label">Linkedin</span></a></li></ul>
						</div>
					</div>
					<header>
						<h2>Collaborations</h2>
						<p>We want to specially thank those researchers that provided us some tips in our first steps.</p>
					</header>
					<div class="flex flex-2">
						<div class="box" onclick="location.href='http://gallegolab.org/';" style="cursor: pointer;">
						<p align="center">PhD. Oriol Gallego Moli <br>Department of Experimental and Health Sciences (DCEXS) and Pompeu Fabra University (UPF), Barcelona (Spain)</p>
						</div>
						<div class="box" onclick="location.href='http://www.sing-group.org/people';" style="cursor: pointer;">
						<p align = "center">PhD Student. Aitor Blanco-Míguez <br>Department of Computer Science of University of Vigo (UVIGO), Vigo (Spain)</p>
						</div>
					</div>
				</div>
			</section>

			<!-- Five -->
			<section id="five" class="wrapper special">
					<div class="inner">
						
									<header class="align-center">
											<h2>Contact us</h2>
											<p>Do you have any questions for us? Do you want to make any suggestion? Are you interested in collaborating with us? </p>
											<p>You can easily fill the following form or send an email to <a href="mailto:primerstock.customer@gmail.com" target="_top"><b>primerstock.customer@gmail.com</b>.</a></p>
										</header>

							<form method="post" action="">
								<div class="row uniform">
									<div class="6u 12u$(xsmall)">
										<input type="text" name="firstname" id="name" value="" placeholder="First name" required />
									</div>
									<div class="6u 12u$(xsmall)">
										<input type="text" name="lastname" id="name" value="" placeholder="Last name" required />
									</div>
									<div class="6u 12u$(xsmall)">
										<input type="email" name="email" id="email" value="" placeholder="Email" required />
									</div>
									<div class="6u 12u$(xsmall)">
											<div class="select-wrapper">
											<select name="category" id="category" required>
												<option value="">- Select a category -</option>
												<option value="Questions">Questions</option>
												<option value="Database issues">Database issues</option>
												<option value="Suggestions">Suggestions</option>
												<option value="Collaboration">Collaboration</option>
												<option value="Other">Other</option>
											</select>
											</div>
									</div>
									<!-- Break -->
									<div class="12u$">
										<textarea name="message" id="message" placeholder="Enter your message" rows="6" required></textarea>
									</div>
									<!-- Break -->
									</div>
									<br>
									<div style="margin-left: 400px;" class="g-recaptcha" data-sitekey="6Leb_JQUAAAAANgRUPgHixmgU3MVjUajGVJZAaLV"></div>
									<br>

									<div class="12u$">
										<ul class="actions">
											<li><input type="submit" name="submit" value="Send Message" /></li>
											<li><input type="reset" name="Reset" value="Reset" class="alt" /></li>
										</ul>
									</div>
								</div>
							</form>	
					</div>
				</section>

<?php

if ($_POST['submit']){
// grab recaptcha library
require_once "recaptchalib.php";

// your secret key
$secret = "6Leb_JQUAAAAAPIgKw3ObbVfZEwp_n4b1a7DVrqJ0";

 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null) {
	include "mailer_contact_us_customer.php";
  } else {
	echo '<script>alert("Your message has not been sent. You must check the CAPTCHA box!");</script>';
}
}
//   foreach ($_POST as $key => $value) {
//     echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
//   }
?>
			
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="flex">
						<div class="copyright">
							<b>&copy;PrimerSTOCK, 2019.</b>
							</div>
					<a href="users/privacy_policy.html" align="center"><b>Privacy Policy</b></a>
					<ul class="icons">
						<li><a href="https://github.com/LJimenezGracia/MasterUPF_DBW_Project" class="icon fa-github" style="font-size:15px;"><span class="label">GitHub</span></a></li>
					</ul>
					</div>
				</div>
			</footer>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
