<?php 
	// Turn off error reporting
	error_reporting(0);
	include 'database/Connection.php';
	session_start();
?>
<?php
	if(isset($_POST['login'])){

		$userType = $_POST['userType'];
		$useremail = $_POST['useremail'];
		$password = $_POST['password'];
		//$password = md5($password);

		if($userType == "Admin"){

			$query = "SELECT * FROM admin WHERE email = '$useremail' AND password = '$password'";
			$rs = $conn->query($query);
			$num = $rs->num_rows;
			$rows = $rs->fetch_assoc();

			if($num > 0){

				$_SESSION['name'] = $rows['user_name'];
				$_SESSION['email'] = $rows['email'];
				$_SESSION['password'] = $rows['password'];
				$_SESSION['login'] = TRUE;
				echo"<script>window:location='admin/index.php'</script>";
			}
			else{
				$msg= "<div class='alert'>
					  <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					  <strong>Invalid Email/Password!</strong>
					  </div>";
		   }
		}
		else if($userType == "Manager"){

		  $query = "SELECT * FROM manager WHERE email = '$useremail' AND password = '$password'";
		  $rs = $conn->query($query);
		  $num = $rs->num_rows;
		  $rows = $rs->fetch_assoc();

		  if($num > 0){

			$_SESSION['name'] = $rows['user_name'];
			$_SESSION['email'] = $rows['email'];
			$_SESSION['password'] = $rows['password'];
			$_SESSION['phone_no'] = $rows['phone'];
			$_SESSION['login'] = TRUE;

			echo "<script>window:location='manager/index.php'</script>";
		  }

		  else{

			$msg= "<div class='alert'>
					  <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					  <strong>Invalid Email/Password!</strong>
					  </div>";

		  }
		}
		else if($userType == "Member"){

		  $query = "SELECT * FROM member WHERE email = '$useremail' AND password = '$password'";
		  $rs = $conn->query($query);
		  $num = $rs->num_rows;
		  $rows = $rs->fetch_assoc();

		  if($num > 0){

			$_SESSION['sl_no'] = $rows['sl_no'];
			$_SESSION['name'] = $rows['name'];
			$_SESSION['email'] = $rows['email'];
			$_SESSION['password'] = $rows['password'];
			$_SESSION['phone_no'] = $rows['phone'];
			$_SESSION['address'] = $rows['address'];
			$_SESSION['room_no'] = $rows['room_no'];
			$_SESSION['login'] = TRUE;

			echo "<script type = \"text/javascript\">window.location = (\"member/index.php\")</script>";
		  }

		  else{

			$msg= "<div class='alert'>
					  <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					  <strong>Invalid Email/Password!</strong>
					  </div>";

		  }
		}
		else{

			$msg= "<div class='alert'>
					  <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					  <strong>Invalid Email/Password!</strong>
					  </div>";

		}
	}
?>
<! DOCTYPE html >
<html lang="en">
<head>
	<title>Meal Solution</title>
	<link rel="icon"  href="img/logo.jpg">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> <!-- for fontawesome -->
	
	    <!-- css for mobile -->
    <link rel="stylesheet" href="css/style.css">


    <!-- css for desktop -->
    <link rel="stylesheet" href="css/desktop.css" media="screen and (min-width: 800px)">
	
	<style>
		.alert {
			padding: 10px;
			background-color: #f44336;
			color: white;
		}
		
		.alert.success {
			background-color: #04AA6D;
		}
		.btn{
			cursor:pointer;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.btn:hover{
			box-shadow:10px 7px 70px 20px green;
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

        
		.closebtn:hover {
			 color: black;
		}
	</style>
	
</head>

<body>
	<div class="first">
    </div>
	
	<!-- navbar start here -->
	<div class="navbar">
	    <div class="left col-3">
		<a href="index.php" ><img width="70px" height="70px" src="img/logo.jpg"></a>
		</div>
		<div class="mid col-6">
			<b style="color:green;">Automated Mess Management System</b>
		</div>
		<div class=" right col-3">
			<a href="reg.php" style="color:red;text-decoration:none;" > <i class="fa fa-user"></i> Registration</a>	
		</div>
	</div>
	


	<!-- login Content -->
	<div class="logIn col-12">
		<div class="form1">
			<h2 class="form2">Log In</h2>
			<form action="index.php" method="post" >
				<?php 
					if(isset($msg)){
					   echo $msg;
					}
					else if( isset($_SESSION['regSuccess']) ){
						echo"<div class='alert success'>
							<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
							<strong>Successfully Registrared! Please Login!</strong>
					    </div>";
					}
				?>
                <div class="form-group">
                    <select required name="userType" >
                            <option value="" >..Select User Roles..</option>
                            <option value="Admin" style="font-size:15px;color:green;font-weight:bold;">Admin</option>
                            <option value="Manager"style="font-size:15px;color:green;font-weight:bold;">Manager</option>
							<option value="Member"style="font-size:15px;color:green;font-weight:bold;">Member</option>
                    </select>
                </div>
				
				<div class="form-group">
					<label for="email" >Email address<b style="color:red;">*</b></label><br>
					<input type="email" id="email" required name="useremail" placeholder="Enter Email Address" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>">
				</div>
				
				<div class="form-group >
					<label for="pwd">Password<b style="color:red;">* </b></label><br>
					<input type="password" id="password" required name="password" placeholder="Enter Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
				</div>
				
				<div >
					<button type="submit" class="btn " name="login" >login</button>
				</div>
				<!-- pore eita niye kaj korte hobe
				<div class="form-group">
					<a href="#" style="margin-left:50px;">Forget Password?</a>
				</div>
				-->
			</form>
		</div>
	</div>&nbsp
	
	

	<div class="footer" style="background-color:#f4f5df;color:black;">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>
		

</body>

</html>