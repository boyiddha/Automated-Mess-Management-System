<?php 
	// Turn off error reporting
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
	
	//--------------------- SAVE START ----------------------------------
	if(isset($_POST['save'])){
		$name=$_POST['name'];
		$Email=$_POST['email'];
		$password=$_POST['password'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$room=$_POST['room'];
		$dateCreated = date("Y-m-d");
	   
		$query=mysqli_query($conn,"select * from member where email ='$Email'");
		$ret=mysqli_fetch_array($query);

		if($ret > 0){ 
			$ret=0;
			$msg= "<div class='alert'>
		    <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
		    <strong>This Eamil Already Exist!</strong>
		    </div>";
		}
		else{
			$query=mysqli_query($conn,"insert into member(name,email,password,phone,address,room_no,Joining_Date) 
			value('$name','$Email','$password','$phone','$address','$room','$dateCreated')");
			

			if ($query) {
					// insert new member into Manager List...!! 
					
					
					// change password to keep different between a member & manager password
					$password+=999;
					if($password%2==0)$password+=999;
					else $password+=99;
					// add the new member in the manager list
					$q=mysqli_query($conn,"insert into manager(user_name,email,password,phone,room_no,Entry_Date)
					value('$name','$Email','$password','$phone','$room','$dateCreated')	");
					
					// update the manager Sl_no if there any mismatch due to auto_increment variable
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
					
					$msg= "<div class='alert success'>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>Created Successfully!</strong>
					</div>";					
			}
			else{
				$msg= "<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>An Error Occurred! Please try again!</strong>
				</div>";
			}
		}
	}
	// ----------------------------- SAVE END -------------------------------
	
	
	
	
	
	//--------------------EDIT START------------------------------------------

	 if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit"){
		$Id= $_GET['Id'];

		$query=mysqli_query($conn,"select * from member where email ='$Id'");
		$row=mysqli_fetch_array($query);

		//------------UPDATE------------------------------------------------------

		if(isset($_POST['update'])){
			
			$_SESSION['successfully']=TRUE;
		
			$name=$_POST['name'];
			$Email=$_POST['email'];
			$password=$_POST['password'];
			$phone=$_POST['phone'];
			$address=$_POST['address'];
			$room=$_POST['room'];

			$query=mysqli_query($conn,"update member set name='$name', email='$Email',password='$password',phone='$phone',address='$address',room_no='$room' where email='$Id'");
			if ($query) {
				//update also in the manager list
				
				// change password to keep different between a member & manager password
				$password+=999;
				if($password%2==0)$password+=999;
				else $password+=99;
				$q=mysqli_query($conn,"update manager set user_name='$name',email='$Email',password='$password',phone='$phone',room_no='$room' where email='$Id'");
				
				$Id=null;
				$status= "<div class='alert success'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>Successfully Updated!</strong>
				</div>";
				
				echo"<script>window:location='update_member.php'</script>";
			}
			else{
				$status= "<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>An Error Occurred! Please try again!</strong>
				</div>";
			}
		}
    } // ---------------------------- EDIT END  --------------------------------------------
	
	
	
	//--------------------------------DELETE START-----------------------------------------

  if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete"){
	 $_SESSION['successfully']=TRUE;
	  
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
			
			$status= "<div class='alert'>
			<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
			<strong>Successfully Deleted!</strong>
			</div>";
			 echo"<script>window:location='update_member.php'</script>";

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
	<meta http-equiv = "Content-Type" content = "text/html; charset = UTF-8" />
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
		
		.navbar::after{
			content: '';
			display: table;
			clear: both;
		}
		h2{
			animation: animate 
            2.5s linear infinite;
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
		.column{
			float:right;
			padding:10px;
			
		}
		.col1, .col3{
			width:20%;
		}
		.col2{
			width:60%;
			position: relative;
			background-color:#f7f12d;
			animation-name:test1;
			animation-duration:5s;
			animation-iteration-count: infinite;
		}
		@keyframes test1{
			from {background-color:#f7f12d;}
			to{background-color:#faf9cf;}
		}
		.formmain{
			padding-left:15px;
		}
		.form-group{
			margin:7px;
		}
		.form-control{
			width:280px;
			height:38px;
			font-size:15px;
			font-weight:bold;
			border-color:#c5c7c3;
			border-radius:12px;
			border-width:3px;
		}
		.btn{
			font-size:14px;
			color:white;
			margin-left:70px;
			margin-top:10px;
			width:70px;
			height:35px;
			border-width:3px;
			background-color:green;
			border-color:green;
			border-radius:12px;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.btn:hover{
			box-shadow:7px 7px 40px 17px green;
		}
		.btnupdate{
			font-size:17px;
			font-weight:bold;
			color:white;
			margin-left:70px;
			margin-top:10px;
			width:80px;
			height:38px;
			border-width:3px;
			background-color:orange;
			border-color:green;
			border-radius:12px;
			animation:button2;
			animation-duration:3s;
			animation-iteration-count:infinite;
		}
		@keyframes button2{
			from {background-color:orange;}
			to{background-color:#faf3bb;}
		}
		
		.link1{
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}

		.link1:hover {
			 box-shadow:7px 7px 40px 17px #0509f0;
		}
		.link2{
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}

		.link2:hover {
			 box-shadow:7px 7px 40px 17px red;
		}
		@media only screen and (max-width: 700px) {
			.col1, .col3{
				width:10%;
			}
			.col2{
				width:80%;
			}
		}
		.row:after{
			content:'';
			display:table;
			clear:both;
		}
		.wrp{
			float:right;
			padding:7px;
			
		}
		.wrap{
			width:100%;
		}
		.wrap1, .wrap3{
			width:10%;
		}
		.wrap2{
			width:80%;
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
				
	 <!-- Member Form  -->
	<div class="row">
		<div class="column col1" style="background-color:#36302f;"></div>
		 <div class="column col2" >
			<?php
				if (isset($Id)){
				?>
				<h2 style="color:green;padding-left:20px;">Update Member Info.</h2>
				<?php
			}
			else {           
				?>
				<h2 style="color:#1c04d4;padding-left:20px;">Create New Member</h2>
				<?php
			}         
			?>
				
			
			<?php echo $msg; ?>
			
			<form class="formmain" method="post" enctype="multipart/form-data">	 
				<div class="form-group">
					<label for="name"> Full Name<span style="color:red;">*</span></label>	<br>						  
					<input class="form-control"  id="name" name="name" value="<?php if(isset($Id)){echo $row['name'];} ?>" placeholder="  Write Member's Name..." required>				  			
				 </div>
				 
				<div class="form-group">
					<label for="email">Email<span style="color:red;">*</span></label>	<br>						  
					<input class="form-control" id="email" name="email" value="<?php if(isset($Id)){echo $row['email'];} ?>" placeholder="  Write Email..." required>
				</div>
				
				<div class="form-group">
					<label for="pwd">Given Password<span style="color:red;">*</span></label>	<br>
					<input class="form-control" id="pwd" name="password" value="<?php if(isset($Id)){echo $row['password'];} ?>" placeholder="  Write New Member's Password..." required>
				</div>
				
				<div class="form-group">
					<label for="phone">Phone No.<span style="color:red;">*</span></label>	<br>						  
					<input class="form-control" id="phone" name="phone" value="<?php if(isset($Id)){echo $row['phone'];} ?>" placeholder="  Write Phone Number..." required>
				</div>
				
				<div class="form-group">
					<label for="address">Address<span style="color:red;">*</span></label>	<br>
					<input class="form-control" id="address" name="address" value="<?php if(isset($Id)){echo $row['address'];} ?>" placeholder="  Write Member's Address..." required>
				</div>
				
				<div class="form-group">
					<label for="room">Room No.<span style="color:red;">*</span></label>	<br>
					<input class="form-control" id="room" name="room" value="<?php if(isset($Id)){echo $row['room_no'];} ?>" placeholder="  Write Member's Room No..." required>
				</div>
				<!--<button type="submit" name="save" class="btn ">Save</button>-->
				
				    <?php
						if (isset($Id)){
						?>
						<button type="submit" name="update" class="btnupdate">Update</button>
						<?php
                    }
					else {           
						?>
						<button type="submit" name="save" class="btn">Save</button>
						<?php
                    }         
                    ?>

			</form>	

		 </div>
		 <div class="column col3" style="background-color:#36302f;"></div>
		 
	</div>
	<div class="clr" style="background-color:#dbd9d9;height:9px;"></div>
	
	<h2 class="stt">
	<?php 
		if( isset($_SESSION['successfully']) ){
			echo $status;
			unset($_SESSION['successfully']);
		}
	?>
	</h2>
	<!-- Member Table -->
	<h3 style="background-color:#dcf7d7;height:40px;color:blue;text-align:center;padding-top:5px;">Member List</h3>

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
						<th>Address</th>
						<th>Room</th>
						<th>Joing__Date</th>
						<th>Update</th>
						<th>Remove</th>
					</tr>
				</thead>
				
				<tbody>
				  <?php
						$query = "SELECT * FROM member";
						$rs = $conn->query($query);
						$num = $rs->num_rows;
						$sn=0;
						$status="";
						if($num > 0){ 
							while ($rows = $rs->fetch_assoc()) {
								$sn = $sn + 1;
								echo"
									<tr>
									<td>".$sn."</td>
									<td>".$rows['name']."</td>
									<td>".$rows['email']."</td>
									<td>".$rows['password']."</td>
									<td>".$rows['phone']."</td>
									<td>".$rows['address']."</td>
									<td>".$rows['room_no']."</td>
									<td>".$rows['Joining_Date']."</td>
									<td><a href='?action=edit&Id=".$rows['email']."'><i class='fa fa-edit cntr link1'  style=\"color:#0509f0;font-size:20px;\"></i></a></td>
									<td><a href='?action=delete&Id=".$rows['email']."'><i class='fa fa-times cntr link2' style=\"color:red;font-size:20px;\"></i></a></td>
									
									</tr>";
							}
						}
						else{
							 echo "<div class='alert'>
								<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
								<strong>No Record Found!</strong>
								</div>";
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