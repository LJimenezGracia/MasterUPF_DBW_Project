<?php

$conn = mysqli_connect("localhost", "root", "test", "phpsamples");

 if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		


		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 100000, ",")) !== FALSE)
	         {


	           $sql = "INSERT into employeeinfo (emp_id,firstname,lastname,email,reg_date) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
                   $result = mysqli_query($con, $sql);
                
                   if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"upload_data_form.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"upload_data_form.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}	 
$conn->close();

//   function get_all_records(){
//     $con = getdb();
//     $Sql = "SELECT * FROM employeeinfo";
//     $result = mysqli_query($con, $Sql);  


//     if (mysqli_num_rows($result) > 0) {
//      echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
//              <thead><tr><th>EMP ID</th>
//                           <th>First Name</th>
//                           <th>Last Name</th>
//                           <th>Email</th>
//                           <th>Registration Date</th>
//                         </tr></thead><tbody>";


//      while($row = mysqli_fetch_assoc($result)) {

//          echo "<tr><td>" . $row['emp_id']."</td>
//                    <td>" . $row['firstname']."</td>
//                    <td>" . $row['lastname']."</td>
//                    <td>" . $row['email']."</td>
//                    <td>" . $row['reg_date']."</td></tr>";        
//      }
    
//      echo "</tbody></table></div>";
     
// } else {
//      echo "you have no records";
// }
// }
?>
