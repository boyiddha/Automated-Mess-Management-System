<?php 	
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
?>

<?php
	if (isset($_POST['submit'])){
		
		// Escape user inputs for security
		$un= $_SESSION['name']."(".$_SESSION['phone_no'].")";
		$ph= $_SESSION['phone_no'];
		$m = mysqli_real_escape_string($conn, $_REQUEST['msg']);
		
		if(empty($m)){
			$msg="PLZ Write Something!";
		}
		else{	
			
			// set the default timezone to use.
			date_default_timezone_set('Asia/Dhaka');
			// now
			$date = new DateTimeImmutable();
			$ts= $date->format('d/m/y, h:i A');


			// Attempt insert query execution
			$query = "INSERT INTO chat (uname, message, datetime,phone)
					VALUES ('$un', '$m', '$ts','$ph')";
			$result=$conn->query($query);
			if($result){
				header('Location:#container');
			} else{
				echo "ERROR: Message not sent!!!";
			}
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
		body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
		
		body{
			margin:0;
			padding:0;
		}
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
		
		.navbar:after{
			content: '';
			display: table;
			clear: both;
		}
		main{
			width:490;
			height:auto;
			display:inline-block;
			font-size:15px;
			vertical-align:top;
			background-color:green;
		}
		
		main .inner_div{
			padding-left:0;
			margin:0;
			list-style-type:none;
			position:relative;
			overflow:auto;
			height:480px;
			background-image:url(img/chat.jpg);
			background-position:center;
			background-repeat:no-repeat;
			background-size:cover;
			position: relative;
			border-top:2px solid #fff;
			border-bottom:2px solid #fff;
			
		}
		main .triangle{
			width: 0;
			height: 0;
			border-style: solid;
			border-width: 0 8px 8px 8px;
			border-color: transparent transparent
			#58b666 transparent;
			margin-left:20px;
			clear:both;
		}
		main .message{
			padding:10px;
			color:#000;
			margin-left:15px;
			background-color:#58b666;
			line-height:20px;
			max-width:90%;
			display:inline-block;
			text-align:left;
			border-radius:5px;
			clear:both;
		}
		main .triangle1{
			width: 0;
			height: 0;
			border-style: solid;
			border-width: 0 8px 8px 8px;
			border-color: transparent
			transparent #6fbced transparent;
			margin-right:45px;
			float:right;
			clear:both;
		}
		main .message1{
			padding:10px;
			color:#000;
			margin-right:39px;
			background-color:#6fbced;
			line-height:20px;
			max-width:90%;
			display:inline-block;
			text-align:left;
			border-radius:5px;
			float:right;
			clear:both;
		}

		main footer{
			height:140px;
			background-color:#622569;
		}
		
		main footer textarea{
			resize:none;
			border:100%;
			display:block;
			width:135%;
			height:70px;
			border-radius:7px;
			font-size:13px;
			margin-bottom:5px;
		}
		main footer .input2{
			resize:none;
			border:100%;
			display:block;
			width:65px;
			height:36px;
			border-radius:3px;
			font-size:15px;
			margin-bottom:5px;
			margin-left:105px;
			color:white;
			cursor:pointer;
			text-align:center;
			background-color: #0000e6;
			border-radius:8px;
			border: 2px solid white;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		main footer .input2:hover{
			box-shadow:10px 7px 70px 20px #0000e6;
		}
		
		main footer textarea::placeholder{
			color:green;
			font-size:16px;
		}
		.matha{
			height:20px;
			background-color:#3737fa;
			color:white;
			text-align:center;
		}
		#container{
			margin-left:29%;
			width:485px;
			height:595px;
			
			font-size:0;
			border-radius:5px;
			overflow:hidden;
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

			#container{
				height:537px;
				margin:0 auto;
			}
			main .inner_div{
				height:420px;
			}
			
		}
		
		
		/* footer starts from here  */
		.footer2{
			background-color: #c4c4c0;
			color: black;
			text-align: right;
			font-size: 15px;
			height:33px;
			margin-top:2px;
			padding:0;

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
		.footer2::after{
			display: table;
			content: '';
			clear: both;
		}	
		img{ 
			border-radius:50px;
		}
		
	</style>
	
</head>

<body onload="show_func()">
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
	<div style="background-color:#d2d6d3;"> 
	<div class="row2 " id="container" >
	
		<main>

			<div class="matha" >
				<p>GROUP CHAT</p>
			</div>


			<script>
			function show_func(){

			var element = document.getElementById("chathist");
				element.scrollTop = element.scrollHeight;

			}
			</script>

			<form id="myform"  action="" method="POST" enctype="multipart/form-data" >
				<div class="inner_div" id="chathist">
					<?php
						$query = "SELECT * FROM chat";
						$run = $conn->query($query);
		
						$yourID=$_SESSION['phone_no'];
						while($row = $run->fetch_array()) 
					{
							if($row['phone']==$yourID)
							{
					?>
								<div id="triangle1" class="triangle1"></div>
								<div id="message1" class="message1">
									<span style="color:white;float:right;">
										<?php echo $row['message']; ?></span> <br/>
									<div>
										<span style="color:black;float:left;font-size:10px;clear:both;">
											<?php echo $row['uname']; ?><br>
											<?php echo $row['datetime']; ?>
										</span>
									</div>
								</div>
								<br/><br/>
								<?php
							}
						else
						{
	
						?>
							<div id="triangle" class="triangle"></div>
							<div id="message" class="message">
								<span style="color:white;float:left;">
									<?php echo $row['message']; ?>
								</span> <br/>
								<div>
									<span style="color:black;float:right;font-size:10px;clear:both;">
										<?php echo $row['uname']; ?><br>
										<?php echo $row['datetime']; ?>
									</span>
								</div>
							</div>
							<br/><br/>
							<?php
						}
					}
					?>
				</div>
					<footer >
						<table>
							<tr>
								<th>
									<textarea id="msg" name="msg" rows='10' cols='40' required=""  placeholder="Message!" ></textarea>
									<?php
										if(isset($msg)){
											echo $msg;
										}
									?>
								</th>
								<th>
									<input class="input2" type="submit" id="submit" name="submit" value="send">
								</th>			
							</tr>
						</table>			
					</footer>
			</form>
		</main>
	  
		  
	</div>
	</div>
	
	<div class="footer2">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>


</body>

</html>