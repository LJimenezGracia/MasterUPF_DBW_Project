<?php

// Processing data form labform.php (Lab register)
session_start();




$servername = "localhost";
$username = "primerstock";
$password = "primerstock1234";
$db = "primerstock_db";

// Obtaing the variables from the form
$institution = $_SESSION['institution'];
$group_name = $_SESSION['group_name'];
$country = $_SESSION['country'];
$email = $_SESSION['email'];

// Checking that the variables are imported
// echo "<h2>Your Input:</h2>";
// echo $institution;
// echo "<br>";
// echo $group_name;
// echo "<br>";
// echo $country;
// echo "<br>";
// echo $email;
// echo "<br>";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	// Generating Lab_code
	include 'countries.php';
	$isocode = $countryCodes[$country];
	$code = $isocode . rand(1000,9999);
	$_SESSION['glabcode'] = $code; //Generated lab code

	$sql = "INSERT INTO Lab (Institution,Group_name,Country,Email,Lab_code) VALUES ('$institution', '$group_name','$country','$email','$code')";

	// Open a modal (pop up)
	if ($conn->query($sql) === TRUE) {
	 //    echo "Congratulations! You are now registered!";
	 //    echo "<h2>Your Lab data is:</h2>";
		// echo "Institution - " . $institution;
		// echo "<br>";
		// echo "Group name - " . $group_name;
		// echo "<br>";
		// echo "Country - " . $country;
		// echo "<br>";
		// echo "Email - " . $email;
		// echo "<br>";
		// echo "Lab code - " . $code;
		include 'sendmail/mailer.php';
		include 'modallab.php';
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
/*<html>
<body>
	<!-- Modal -->
	<div class="modal fade" id="our_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	    </div>
	  </div>
	</div>
	$('our_modal').modal('show')
</body>
</html> */

	$conn->close();


#}

?>