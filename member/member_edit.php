<?php 
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
	// in member.php..... if we use  href='member_edit.php?Id=".$rows['email']."'
	// then we check as    isset( $_GET['Id'] )   .....
	
	if(isset($_GET['edit'])){
		$Id = $_GET['edit'];
		$rec = mysqli_query($conn, "SELECT * FROM member WHERE email='$Id';");
		
		$record=mysqli_fetch_array($rec);
		
		$name=$record['name'];
		$Email=$record['email'];
		$password=$record['password'];
		$phone=$record['phone'];
		$address=$record['address'];
		$room=$record['room_no'];
		
	}

		//------------UPDATE------------------------------------------------------

	if(isset($_POST['update'])){
	
		$name=$_POST['name'];
		$Email=$_POST['email'];
		$password=$_POST['password'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$room=$_POST['room'];

		$query=mysqli_query($conn,"update member set name='$name', email='$Email',password='$password',phone='$phone',room_no='$room',address='$address' where email='$Id'");
		if ($query) {
			
			// update also in the Manager List !!!
			
			// change password to keep different between a member & manager password
			$password+=999;
			if($password%2==0)$password+=999;
			else $password+=99;
			$q=mysqli_query($conn,"update manager set user_name='$name',email='$Email',password='$password',phone='$phone',room_no='$room' where email='$Id'");
			
			$Id=null;
			$_SESSION['phone_no']=$phone; /// change session phone no.... due to update this member info...
			
			$_SESSION['status']= "<div class='alert success'>
			<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
			<strong>Successfully Updated!</strong>
			</div>";
			echo "<script type = \"text/javascript\">
				window.location = (\"update_member.php\")
				</script>";
		}
		else{
			$_SESSION['status']= "<div class='alert'>
			<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
			<strong>An Error Occurred! Please try again!</strong>
			</div>";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
		<title>Mess Solution</title>
		<link rel="icon"  href="img/logo.jpg">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   <!-- for fontawesome -->

		 <link rel="stylesheet" href="css/w3.css"> <!--or, <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">   -->
		<link rel="stylesheet" href="css/font.css">
		
		<!-- google fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
		
		<style>
			body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
			body {font-size:16px;
				margin:0;
				padding:0;
			}
			.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
			.w3-half img:hover{opacity:1}
			.first{
				background-color: #d5f7f6;
				height:10px;
			}
			.nav1{
				width:67%;
				float:left;
				padding-top:0px;
				
			}
			.home{
				-webkit-transition-duration: 0.4s; /* Safari */
				transition-duration: 0.4s;
			}
			.home:hover {
				box-shadow:10px 7px 50px 30px #e69900;
			}
			img{
				border-radius:50px;
			}
			.nav2{
				width:9%;
				float:left;
				text-align:left;
				padding-top:8px;
				color:#f78f8f;
			}
			.nav3{
				width:9%;
				float:left;
				text-align:left;
				padding-top:8px;
				color:#f78f8f;
			}
			.nav4{
				width:7%;
				float:left;
				text-align:left;
				padding-top:8px;
				color:#f78f8f;
			}
			.nav5{
				width:8%;
				float:left;
				text-align:left;
				padding-top:8px;
				color:#f78f8f;
			}
			.nav2 a:hover{
				color:red;
				font-size:115%;
			}
			.nav3 a:hover{
				color:red;
				font-size:115%;
			}
			.nav4 a:hover{
				color:red;
				font-size:115%;
			}
			.nav5 a:hover{
				color:red;
				font-size:115%;
			}
			@media only screen and (max-width: 700px) {
				.nav1{
					width:27%;
				}
				.nav2{
					width:19%;
				}
				.nav3{
					width:20%;
				}
				.nav4{
					width:17%;
				}
				.nav5{
					width:17%;
				}
			}
			
			.navbar:after{
				content: '';
				display: table;
				clear: both;
			}
			.container{
				background-color:#f7eed5
			}
	   		.child{
				margin-left:20%;
				padding:0;
			}
			
			h3{
				position:relative;
				margin-top:0;
				margin-left:15%;
				width:68%;
				background-color:#dcf5ba;
				height:40px;
				color:#02507a;
				text-align:center;
				padding-top:10px;
				animation:title;
				animation-duration:2s;
				animation-iteration-count:infinite;
			}
			@keyframes title{
				from {background-color:#cbf5c4;}
				to{background-color:#62f549;}
			}
			
			.wrap{
				margin-left:22%;
				width:53%;
				background-color:#ecf2eb;
			}
			.wrp{
				margin-left:20px;
				height:auto;
				overflow-x:hidden;
				overflow-y:scroll;
			}
			.formmain{
				padding-left:10%;
			}
			.form-group{
				margin:7px;
			}
			.form-control{
				width:420px;
				height:38px;
				font-size:15px;
				font-weight:bold;
				border-color:#c5c7c3;
				border-radius:12px;
				border-width:3px;
			}
			.buttonupdate{
				color:white;
				margin-left:96px;
				height:35px;
				width:120px;
				background-color:#0ac94a;
				border:none;
				border-radius:12px;
				text-align:center;
				display:inline-block;
				cursor:pointer;
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}

			.buttonupdate:hover {
			    box-shadow:10px 7px 70px 20px #0ac94a;
			}

			@media screen and (max-width: 700px) {
				.photo1{
					margin:0;
				}
				.wrap{
					margin:0;
					width:100%;

				}
				.wrp{
					height:400px
					margin-left:5px;
					margin-right:5px;
					overflow-x:auto;
					overflow-y:auto;
				}
				h3{
					margin:0;
					margin-bottom:15px;
				}
				.formmain{
					padding:10px;
				}
				.form-control{
					width:340px;
				}
				.child{
					margin-left:5%;
					width:auto;
				}
			}
			.wrap:after{
				content:'';
				display:table;
				clear:both;
			}
			
			.notification {
				position: relative;
			}

			.notification .badge {
				position: absolute;
				top: -12px;
				right: 64px;
				padding: 5px 10px;
				border-radius: 50%;
				background-color: red;
				color: white;
			}
			/* footer starts from here  */
			.footer{
				background-color: #d1d1cf;
				color: black;
				padding: 10px;
				text-align: right;
				font-size: 15px;
				height:30px;

			}
			.footer::after{
				display: table;
				content: '';
				clear: both;
			}
			
					
			/* Custom Scrollbar */
			
			/* width */
			
			::-webkit-scrollbar {
				width: 15px;
			}

			/* Track */
			
			::-webkit-scrollbar-track {
				background:#f1f1f1;
			}
			 
			/* Handle */
			::-webkit-scrollbar-thumb {
				background:#b1b5b4 ;
			}

			/* Handle on hover */
			::-webkit-scrollbar-thumb:hover {
				background: #161717; 

		</style>
		
</head>
<body>

	<div class="first">
    </div>
	
	<!-- navbar start here -->
	<div class="navbar">
	    <div class="nav1">
			<a class="home" href="index.php" ><img width="70px" height="70px" src="img/logo.jpg"></a>
		</div>
		 <div class="nav2">
			<a href="notice.php" class="notification" style="text-decoration:none;">
			
				
					<?php
						$q="select * from noticeboard";
						$res=$conn->query($q);
						$num=$res->num_rows;
						if($num>0){
							
					?>
						<span class="badge"> <?php echo $num;  ?> </span>
					<?php 
						}
					?>
				<i class="fa fa-bell"></i>&nbsp <span style="color:#f78f8f;">Notice</span>
			</a>
		 </div>
		 <div class="nav3">
			<a href="archieve.php" style="text-decoration:none;">
				<i class="fa fa-file"></i>&nbsp <span style="color:#f78f8f;">Archieve</span>
			</a>
		 </div>
		<div class="nav4">
			<a href="rules.php" style="text-decoration:none;">
				<i class="fa fa-circle"></i>&nbsp <span style="color:#f78f8f;">Rules</span>
			</a>
		 </div>
		 <div class="nav5">
			<a href="logout.php" style="text-decoration:none;">
				<i class="fa fa-power-off"></i>&nbsp <span style="color:#f78f8f;">Logout</span>
			</a>
		 </div>

	</div>

	<!-- !PAGE CONTENT! -->
	<div class="container">
		<div class="child">
			<h4 style="text-align: center;font-size:19px;color:#99955f;height:30px;padding-top:3px;background:white;width:70%;" >Welcome To Mess Solution System</h4>
		</div>
		 
		<h3 id="start">Update Member Information</h3>
		
		<div class="wrap">
			<div class ="wrp">
				<form class="formmain" method="post" enctype="multipart/form-data">	 
					<div class="form-group">
						<label for="name"> Full Name<span style="color:red;">*</span></label>	<br>						  
						<input class="form-control"  id="name" name="name" type="text" value="<?php echo $record['name']; ?>" >				  			
					 </div>
					 
					<div class="form-group">
						<label for="email">Email<span style="color:red;">*</span></label>	<br>						  
						<input class="form-control" id="email" name="email" value="<?php echo $record['email']; ?>">
					</div>
					
					<div class="form-group">
						<label for="pwd">Given Password<span style="color:red;">*</span></label>	<br>
						<input class="form-control" id="pwd" name="password" value="<?php echo $record['password'];?>">
					</div>
					
					<div class="form-group">
						<label for="phone">Phone No.<span style="color:red;">*</span></label>	<br>						  
						<input class="form-control" id="phone" name="phone" value="<?php echo $record['phone'];?>">
					</div>
					
					<div class="form-group">
						<label for="room">Room No.<span style="color:red;">*</span></label>	<br>						  
						<input class="form-control" id="room" name="room" value="<?php echo $record['room_no'];?>">
					</div>
					
					<div class="form-group">
						<label for="address">Address<span style="color:red;">*</span></label>	<br>
						<input class="form-control" id="address" name="address" value="<?php echo $record['address']; ?>" >
					</div>
					<!--<button type="submit" name="save" class="btn ">Save</button>-->
					
					<input type="submit" name="update" value="Update " class="buttonupdate" >

				</form>	
			</div>
		</div>
	</div>
	
	<div style="margin:0;padding:0;background-color:#aafaaa;height:5px;"></div>
	<div class="footer">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>
	  
		 

</body>
</html>
