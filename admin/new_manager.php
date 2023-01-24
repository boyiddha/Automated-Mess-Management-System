<?php 
	// Turn off error reporting
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
	
		//--------------------- ASSIGN Manager START ----------------------------------
	if(isset($_GET['action']) && $_GET['action'] == "assign"){
		
	   
		$query=mysqli_query($conn,"select * from member ORDER BY Joining_Date ASC");

		if($query==TRUE){ 
				$q = "select * from member ORDER BY Joining_Date ASC";
				$rs = $conn->query($q);
				$num = $rs->num_rows;
				if($num>0){
					$cnt=0;
					while ($rows = $rs->fetch_assoc()) {
						$cnt+=1;
						$name=$rows['name'];
						$Email=$rows['email'];
						$password=$rows['password'];
						// change password to keep different between a member & manager password
						$password += 999;
						if($password%2==0)$password+=999;
						else $password+=99;
						
						$phone=$rows['phone'];
						$room=$rows['room_no'];
						$dateCreated = date("Y-m-d");
						
						$qry=mysqli_query($conn,"insert into manager(user_name,email,password,phone,room_no,Entry_Date)
						value('$name','$Email','$password','$phone','$room','$dateCreated')	");	
						
						if($cnt==3){
							break;
						}
					}		
					$_SESSION['stt']= "<div class='alert success'>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>Successfully Entered few OLD member in Manager List!</strong>
					</div>";	
					echo "<script type = \"text/javascript\">
					window.location = (\"new_manager.php\")
					</script>";
				}
				else{
					$status= "<div class='alert'>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>Empty Member List! <br>Please add new Member! </strong>
					</div>";
				}
		}
		else{
			$status= "<div class='alert'>
			<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
			<strong>An Error Occurred! Please try again!</strong>
			</div>";
		}
	}
	// ----------------------------- Assign END -------------------------------
	
	//--------------------------------DELETE START-----------------------------------------

  if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete"){
        $Id= $_GET['Id'];

        $query = mysqli_query($conn,"DELETE FROM manager WHERE email='$Id'");
		
        if ($query == TRUE) {
				$q = "SELECT * FROM manager ORDER BY Sl_no ASC";
				$rs = $conn->query($q);
				$num = $rs->num_rows;
				if($num>0){
					$sn=0;
					while ($rows = $rs->fetch_assoc()) {
						$sn+=1;
						$Email=$rows['email'];
						$qry=mysqli_query($conn,"update manager set Sl_no='$sn' where email='$Email'");
					}
					
					$status= "<div class='alert'>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>Successfully Deleted!</strong>
					</div>";
				}
				else{
					$qry=mysqli_query($conn,"ALTER TABLE manager AUTO_INCREMENT = 1");
					$status= "<div class='alert'>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>Empty Manager List!</strong>
					</div>";
				}
				echo "<script type = \"text/javascript\">
					window.location = (\"#start\")
					</script>";
				unset($_SESSION['stt']);
        }
        else{
           	$status= "<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>An Error Occurred! Please try again!</strong>
				</div>"; 
         }
      
  }

?>

<! DOCTYPE html >
<html lang="en">
<head>
	<title>Mess Solution</title>
	<link rel="icon"  href="img/logo.jpg">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   <!-- for fontawesome -->	
	
	<style>
		*{
			box-sizing:border-box;
		}
		.first{
		    background-color: #d5f7f6;
			height:10px;
		}
		.left{
			width:82%;
			float:left;
			padding-top:0px;
			
		}
		.mid{
			width:11%;
			float:left;
			text-align:left;
			padding-top:8px;
			color:#f78f8f;
		}
		.right{
			width:7%;
			float:left;
			text-align:left;
			padding-top:8px;
			color:#f78f8f;
		}
		.mid a:hover{
			color:red;
			font-size:115%;
		}
		.right a:hover{
			color:red;
			font-size:115%;
		}
		@media only screen and (max-width: 700px) {
			.left{
				width:50%;
			}
			.mid{
				width:32%;
			}
			.right{
			    width:18%;
			}
		}
		
		.navbar:after{
			content: '';
			display: table;
			clear: both;
		}
		h2{
			animation: animate 
            2.5s linear infinite;
        }
		i{
  			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		i:hover{
			box-shadow:7px 7px 40px 17px red;
		}
        @keyframes animate {
            0% {
                opacity: 0;
            }
  
            50% {
                opacity: 0.95;
            }
  
            100% {
                opacity: 0;
            }
		}
		.buttonassign{
			font-size:22px;
			font-weight:bold;
			color:white;
			margin-left:25%;
			margin-top:7px;
			padding-top:3px;
			width:240px;
			height:40px;
			text-align:center;
			border-width:5px;
			background-color:#068f08;
			border-color:green;
			border-radius:8px;
			animation:button2;
			animation-duration:3s;
			animation-iteration-count:infinite;
		}
		@keyframes button2{
			from {background-color:#068f08;}
			to{background-color:#a3f7a4;}
		}
		@media only screen and (max-width: 700px) {
			.buttonassign{
				margin-left:13%;
			}
			.col1, .col3{
				width:10%;
			}
			.col2{
				width:80%;
			}
		}
		.wrp{
			float:right;
			padding:7px;
			
		}
		.wrap{
			width:100%;
		}
		.wrap1, .wrap3{
			width:15%;
		}
		.wrap2{
			width:70%;
		}
		table {
		    border-collapse: collapse;
		    border-spacing: 0;
		    border: 1px solid green;
			width:100%;
		}

		th, td {
		    text-align: left;
		    padding: 10px;
			border: 2px solid #529432;
		}
		th{
			position:sticky;
			top: 0px;
			background:#f2f7f7;
		}
		

		/* 
		tr:nth-child(even){
			background-color: #f2f2f2
		} 
		*/
		
		tr:hover {
			background-color: #dbd8d7;
		}
		
		.scrollable-element {
		    scrollbar-color: #575251;
		}
		@media only screen and (max-width: 700px) {
			.wrap1, .wrap3{
				width:10%;
			}
			.wrap2{
				width:80%;
			}
		}
		.wrap:after{
			content:'';
			display:table;
			clear:both;
		}
		.alert {
			padding: 10px;
			background-color: #f44336;
			color: white;
			width:300px;
		}
		
		.alert.success {
			background-color: #04AA6D;
		}
		
		.closebtn {
			margin-left: 15px;
			color: white;
			font-weight: bold;
			float: right;
			font-size: 22px;
			line-height: 20px;
			cursor: pointer;
			transition: 0.3s;
		}
        .stt{
			margin-left:40%;
		}
		.closebtn:hover {
			 color: black;
		}
		@media only screen and (max-width: 700px) {
			.stt{
				margin-left:13%;
			}
		}
		
		/* footer starts from here  */
		
		.footer{
			background-color: #a8b072;
			color: white;
			padding: 10px;
			text-align: right;
			font-size: 15px;
			height:50px;
			margin-top:10px;
		}
		.footer::after{
			display: table;
			content: '';
			clear: both;
		}
		.cntr{
                text-align: center;
                width: 100%;
        }
	
	</style>
	
</head>

<body>
	<div class="first">
    </div>
	
	<!-- navbar start here -->
	<div class="navbar">
	    <div class="left">
			<a href="index.php" ><img width="70px" height="70px" src="img/logo.jpg"></a>
		</div>
		<div class="mid">
			<a href="index.php" style="text-decoration:none;">
				<i class="fa fa-home"></i>&nbsp <span style="color:#f78f8f;">Home</span>
			</a>
		 </div>
		 <div class="right">
			<a href="logout.php" style="text-decoration:none;">
				<i class="fa fa-power-off"></i>&nbsp <span style="color:#f78f8f;">Logout</span>
			</a>
		 </div>

	</div>
	<h2 class="stt"><?php echo $status; ?></h2>	
	<h2 class="stt"> <?php echo $_SESSION['stt']; ?> </h2>

	<h3 style="background-color:#dcf7d7;height:40px;color:blue;text-align:center;padding-top:5px;">Manager List</h3>

	<div class="wrap" id="start">
		
		<div class="wrp wrap1" style="background-color:#faf7eb;height:370px;" ></div>

		<div class ="wrp wrap2" style="height:370px;overflow-x:auto;overflow-y:auto;">

			<table class="center" >
				<thead >
					<tr >
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Password</th>
						<th>Phone</th>
						<th>Room_No</th>
						<th>Entry Date</th>
						<th>Assigned Manager <i class='fa fa-user cntr'  style="color:green;font-size:20px;"></i> </th>
						<th>Remove</th>
					</tr>
				</thead>
				
				<tbody>
				  <?php
						$query = "SELECT * FROM manager";
						$rs = $conn->query($query);
						$num = $rs->num_rows;
						$sn=0;
						$status="";
						if($num > 0){ 
							while ($rows = $rs->fetch_assoc()) {
								
								if($rows['Sl_no']==1){
									echo"
										<tr>
										<td>".$rows['Sl_no']."</td>
										<td>".$rows['user_name']."</td>
										<td>".$rows['email']."</td>
										<td>".$rows['password']."</td>
										<td>".$rows['phone']."</td>
										<td>".$rows['room_no']."</td>
										<td>".$rows['Entry_Date']."</td>
										<td><i class='fa fa-user cntr'  style=\"color:green;font-size:50px;\"></i></td>
										<td><a href='?action=delete&Id=".$rows['email']."'><i class='fa fa-times cntr' style=\"color:red;font-size:20px;\"></i></a></td>
										
										</tr>";
								}
								else{
									echo"
										<tr>
										<td>".$rows['Sl_no']."</td>
										<td>".$rows['user_name']."</td>
										<td>".$rows['email']."</td>
										<td>".$rows['password']."</td>
										<td>".$rows['phone']."</td>
										<td>".$rows['room_no']."</td>
										<td>".$rows['Entry_Date']."</td>
										<td><i class='fa fa-lock cntr'  style=\"color:#0509f0;font-size:22px;\"></i></td>
										<td><a href='?action=delete&Id=".$rows['email']."'><i class='fa fa-times cntr' style=\"color:red;font-size:20px;\"></i></a></td>
										
										</tr>";
								}
							}
						}
						else{
							 echo "<div class='alert'>
								<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
								<strong>No Record Found!</strong>
								</div>";
							
							echo" <div class='buttonassign'> <a href='?action=assign' style='color:white;text-decoration:none;' > *Assign New Manager* </a> </div>";
						}
						
					  
					  ?>	
				</tbody>
			</table>
		</div>
		<div class="wrp wrap3" style="background-color:#faf7eb;height:370px;"></div>
	</div>
	<div class="footer">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>

</body>

</html>