<?php 
	include 'database/Connection.php';
	session_start();
?>

<?php 
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $phone=$_POST['phone'];
		$address=$_POST['address'];
		$room=$_POST['room'];
		$dateCreated = date("Y-m-d");

        if(strlen($password)<4){ 
			$msg= "<div class='alert'>
			    <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
			    <strong>Password Length at least 4 characters!</strong>
			    </div>";
        }
        else{
            $query="SELECT*FROM member WHERE email='$email'  ";
			$rs = $conn->query($query);
			$num = $rs->num_rows;
			$row = $rs->fetch_assoc();
			
			if(!empty($row["email"])){ // due to null check
            
				if($row["email"]==$email){
					$msg= "<div class='alert'>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>This Email is already Exist!</strong>
					</div>";
				}
			}
			if(!isset($msg)){
				$query="INSERT INTO member(name,email,password,phone,address,room_no,Joining_Date) VALUES('$name','$email','$password','$phone','$address','$room','$dateCreated') ";
				$result=$conn->query($query);
			 
				if($result){
					// insert new member into manager List !!!
					
					// change password to keep different between a member & manager password
					$password+=999;
					if($password%2==0)$password+=999;
					else $password+=99;
					// add the new member in the manager list
					$q=mysqli_query($conn,"INSERT INTO manager(user_name,email,password,phone,room_no,Entry_Date) 
					VALUES('$name','$email','$password','$phone','$room','$dateCreated') ");
					
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
					
					
					$_SESSION['regSuccess']=TRUE;
					
					echo"<script>window:location='index.php'</script>";
				}
				else{
					$msg= "<div class='alert'>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>Please Try again!</strong>
					</div>";
				}
			}
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
		a:hover{
			color:red;
		}
		.btn{
			font-size:14px;
			color:white;
			margin-left:20px;
			margin-top:20px;
			width:280px;
			height:35px;
			border-width:3px;
			background-color:green;
			border-color:green;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.btn:hover{
			box-shadow:10px 7px 70px 20px green;
		}
		.form1 {	
			max-width: 380px;
			height:467px;
			margin:0px auto;
			border: 7px solid #f2f2f2;
			border-radius: 50px;
			background: #c1f5d7;
			margin-bottom: 25px;
			box-shadow: 2px 4px 4px 5px #d7d7d7;
			font-weight: bold;
			color: black;
		}
		
		.form2  {
			font-size: 25px;
			text-align: center;
			box-shadow: 1px 5px; 
			border-radius: 30px;
			height:50px;
			font-weight: bold;
			background: #c1f5d1;
		}
		
		.form-group{
			font-size:20px;
			padding-top:3px;
			padding-left:15px;
		}
		.form-group input{
			font-size:15px;
			width:290px;
			height:40px;
			border-width:3px;
			border-radius:5px;
			border-color:green;
			margin-top:5px;
		}
		
		.alert {
			padding: 10px;
			background-color: #f44336;
			color: white;
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
			<h2 class="form2">Member Registration Form</h2>
			<form action="reg.php" method="post" >
				<?php 
					if(isset($msg)){
					   echo $msg;
					}
				?>
				<div class="form-group">
					<input type="text" id="name" name="name" placeholder=" Enter Your Name" required="">
				</div>
				 <div class="form-group">
					<input type="email" id="email" name="email" placeholder=" Enter Your Email" required="">
				</div>
				 <div class="form-group">
					<input type="password" id="password" name="password" placeholder=" Enter Password" required="">
				</div>
				<div class="form-group">
					<input type="number" id="phone" name="phone" placeholder=" Enter Your Phone Number" required="">
				</div>
				<div class="form-group">
					<input type="text" id="address" name="address" placeholder=" Enter Your Address" required="">
				</div>
				<div class="form-group">
					<input type="text" id="room" name="room" placeholder=" Enter Room No." required="">
				</div>
				
				<div  style="margin-top:5px;padding-left:100px;">
				    <button type="submit" name="submit" class="btn" style="background:green;color:white;width:100px;height:35px;cursor:pointer;" >Submit</button>
				</div>
				
				<div class="form-group" style="margin-top:5px;">
					<a href="index.php" style="padding-left:15px;text-decoration:none;">Already Registrared? Login</a>
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