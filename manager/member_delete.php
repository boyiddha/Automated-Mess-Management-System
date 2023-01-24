<?php
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
	
	if (isset($_GET['Id'])){
        $Id= $_GET['Id'];

        $query = mysqli_query($conn,"DELETE FROM member WHERE email='$Id'");

        if ($query == TRUE) {
				// if this deleted member is in the manager list....... h/she must be also deleted from manager table
				$q=mysqli_query($conn,"DELETE from manager where email='$Id' ");
			    $Id=null;
				
				// update the manager Sl_no if there any mismatch due to DELETE 
				$qry = "SELECT * FROM manager ORDER BY Sl_no ASC";
				$rs = $conn->query($qry);
				$num = $rs->num_rows;
				$sn=0;
				if($num>0){
					while ($rows = $rs->fetch_assoc()) {
						$sn+=1;
						$Email=$rows['email'];
						$updt=mysqli_query($conn,"update manager set Sl_no='$sn' where email='$Email'");
					}
				}
				$sn+=1;
				$qry=mysqli_query($conn,"ALTER TABLE manager AUTO_INCREMENT = $sn");
				
				
				$_SESSION['status']= "<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>Successfully Deleted!</strong>
				</div>";
				/* echo "<script type = \"text/javascript\">
					window.location = (\"member.php\")
					</script>";
				*/
				header('location: member.php');

        }
        else{
           	$_SESSION['status']= "<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>An Error Occurred! Please try again!</strong>
				</div>"; 
         }
      
	}
?>