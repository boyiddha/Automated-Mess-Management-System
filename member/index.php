<?php 	
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
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
		.first{
		    background-color: #d5f7f6;
			height:10px;
		}
		.nav1{
			width:67%;
			float:left;
			padding-top:0px;
			
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
			background-color:#faf3e6;
			height:76%;
		}
		.child{
			margin-left:20%;
			padding-top:5px;
		}

		.dv{
			padding-left:15%;
		}
		p{
			font-size:23px;
			font-weight:bold;
		}
		.div1{
			float:left;
			width:20%;
			height:220px;
			background-color:#3cb807;
			margin:10px;
			text-align:center;		
			position: relative;
			animation-name:test1;
			animation-duration:5s;
			animation-iteration-count: infinite;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.div1:hover {
				box-shadow:10px 7px 50px 25px #3cb807;
		}
		@keyframes test1{
			from {background-color:#3cb807;}
			to{background-color:#aef092;}
		}
		.div1 p{
			margin:0;
			position:absolute;
			top:50%;
			left:50%;
			margin-right:-50%;
			transform:translate(-50%, -50%)
		}

		.div2{
			float:left;
			width:20%;
			height:240px;
			background-color:#8cf5c7;
			padding-top:30px;
			margin:10px;
			position:relative;
			animation-name:test2;
			animation-duration:5s;
			animation-iteration-count: infinite;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.div2:hover {
				box-shadow:10px 7px 50px 25px #8cf5c7;
		}
		@keyframes test2{
			from {background-color:#8cf5c7;}
			to{background-color:#02c771;}
		}
		.div2 p{
			color:white;
			margin:0;
			position:absolute;
			top:50%;
			left:50%;
			margin-right:-50%;
			transform:translate(-50%, -50%)
		}
		.div3{
			float:left;
			width:20%;
			height:220px;
			background-color:#035394;
			margin:10px;
			position:relative;
			animation-name:test3;
			animation-duration:5s;
			animation-iteration-count: infinite;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.div3:hover {
				box-shadow:10px 7px 50px 25px #035394;
		}
		@keyframes test3{
			from {background-color:#035394;}
			to{background-color:#91c7f2;}
		}
		.div3 p{
			margin:0;
			position:absolute;
			top:50%;
			left:50%;
			margin-right:-50%;
			transform:translate(-50%, -50%)
		}
		.div1:hover{
			border: 4px solid red;
		}
		.div2:hover{
			border: 4px solid red;
		}
		.div3:hover{
			border: 4px solid red;
		}
		@media only screen and (max-width: 700px) {
			.container{
				height:auto;
			}
			.dv{
				padding-left:5%;
			}
			.div1{
				width:85%;
				height:175px;
			}
			.div2{
				margin-left:6%;
				width:72%;
				height:175px;
			}
			.div3{
			    width:85%;
				height:175px;
			}
			.child{
				margin-left:5%;
				width:auto;
			}
		}
		.container:after{
			content:'';
			display:table;
			clear:both;
		}
		
		.last{
			background-color:#fcf4d7;;
		}
		.div4{
			float:left;
			width:25%;
			height:220px;
			background-color:#61a2fa;
			margin-left:18%;
			position:relative;
			animation-name:test4;
			animation-duration:5s;
			animation-iteration-count: infinite;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.div4:hover {
				box-shadow:10px 7px 50px 25px #61a2fa;
		}
		@keyframes test4{
			from {background-color:#61a2fa;}
			to{background-color:#c8dcf7;}
		}
		.div4 p{
			margin:0;
			position:absolute;
			top:50%;
			left:37%;
			margin-right:-40%;
			transform:translate(-40%, -60%)
		}
		.div4:hover{
			border: 4px solid red;
		}
		.div5{
			float:left;
			width:25%;
			height:220px;
			background-color:#61a2fa;
			margin-left:2%;
			position:relative;
			animation-name:test5;
			animation-duration:5s;
			animation-iteration-count: infinite;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.div5:hover {
				box-shadow:10px 7px 50px 25px #61a2fa;
		}
		@keyframes test5{
			from {background-color:#61a2fa;}
			to{background-color:#c8dcf7;}
		}
		.div5 p{
			margin:0;
			position:absolute;
			top:55%;
			left:44%;
			margin-right:-40%;
			transform:translate(-40%, -60%)
		}
		.div5:hover{
			border: 4px solid red;
		}
		@media only screen and (max-width: 700px) {
			.last{
				height:auto;
			}
			.div4{
				margin-left:10%;
				margin-top:5px;
				width:72%;
				height:175px;

			}
			.div5{
				margin-top:12px;
				margin-left:6%;
			    width:85%;
				height:175px;
			}
		}
		.last:after{
			content:'';
			display:table;
			clear:both;
		}
		/* footer starts from here  */
		.footer{
			background-color: #a8b072;
			color: white;
			padding: 10px;
			text-align: right;
			font-size: 15px;
			height:39px;
			margin-top:7px;

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
		.footer::after{
			display: table;
			content: '';
			clear: both;
		}	
		img{
			border-radius:20px;
		}

		.icon {
		    width: 100px;
		    height: 100px;
			
		    margin: 0 auto;
		    display: block;
		    padding-top: 10px; 
		    margin-top: -9px;
		}		
	</style>
	
</head>

<body>
	<div class="first">
    </div>
	
	<!-- navbar start here -->
	<div class="navbar">
	    <div class="nav1">
			<a href="index.php" ><img width="70px" height="70px" src="img/logo.jpg"></a>
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
	
	<div class="container">
		<div class="child">
			<h3 style="text-align: center;color:#99955f;height:50px;padding-top:13px;background:white;width:80%;" >Welcome To Automated Mess Management System
		</div>
				
		<div class="dv">				
			<div class="div1">
				<p> <a href="meal.php" style="text-decoration:none;color:black"><img class="icon" src="img/meal.png"> Daily Meal Record</a>  </p>
			</div>
			
			<div class="div2">
				<p><a href="reserve.php" style="text-decoration:none;color:white"><img class="icon" src="img/reserve.png">Reserve</a> </p>
			</div>
			
			<div class="div3">
				<p><a href="chat.php" style="text-decoration:none;color:black"><img style="border-radius:50px;" class="icon" src="img/chat.png"> Chat Book</a></p>
			</div>
			
		
		</div>

	</div>
	<div class="last">
		<div class="div4">
			<p> <a href="update_member.php" style="text-decoration:none;color:black"><img class="icon" src="img/member.png"> Update Membership </a>  </p>
		</div>
		<div class="div5">
			<p> <a href="managerlist.php" style="text-decoration:none;color:black"><img class="icon" src="img/manager.jpg">Manager List</a>  </p>
		</div>
	</div>
	
	<div class="footer">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>

</body>

</html>