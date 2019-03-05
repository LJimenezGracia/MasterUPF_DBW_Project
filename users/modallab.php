<?php

// Processing data form labform.php (Lab register)
session_start();
?>


<html>
<head>
		<title>Modal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- bootstrap links for the modal -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../assets/css/main.css" />
		<style>
		.error {color: #FF0000;}
		</style>
</head>
<body>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5> -->
        <h3 class="modal-title" id="exampleModalCenterTitle">Congratulations! You are now registered!</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        //echo "Congratulations! You are now registered!";
        echo "<h4>Your Lab data is:</h4>";
        echo "Institution - " . $_SESSION['institution'];
        echo "<br>";
        echo "Group name - " . $_SESSION['group_name'];
        echo "<br>";
        echo "Country - " . $_SESSION['country'];
        echo "<br>";
        echo "Email - " . $_SESSION['email'];
        echo "<br>";
        echo "Lab code - " . $_SESSION['glabcode'];
        echo "<br><br>";
        echo "You will receive an email with all this information!";
        echo "<br>";
        echo "You are ready to <a href="."signupform.php".">sign up</a>.";
        ?>
      </div>
    </div>
  </div>
</div>


</body>
</html>

<script type="text/javascript">
	$('#exampleModalCenter').modal('show');
</script>