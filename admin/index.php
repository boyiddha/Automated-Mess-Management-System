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
		.container{
			background-color:#faf3e6;
			height:76%;
		}
		.child{
			padding-left:20%;
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
			width:20%;
			height:220px;
			background-color:#8c9c89;
			margin-left:33%;
			position:relative;
			animation-name:test4;
			animation-duration:5s;
			animation-iteration-count: infinite;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.div4:hover {
				box-shadow:10px 7px 50px 25px #8c9c89;
		}
		@keyframes test4{
			from {background-color:#8c9c89;}
			to{background-color:#e1e3e1;}
		}
		.div4 p{
			margin:0;
			position:absolute;
			top:50%;
			left:50%;
			margin-right:-50%;
			transform:translate(-50%, -50%)
		}
		.div4:hover{
			border: 4px solid red;
		}
		@media only screen and (max-width: 700px) {
			.last{
				height:auto;
			}
			.div4{
				margin-left:11%;
			    width:72%;

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
		.footer::after{
			display: table;
			content: '';
			clear: both;
		}	
		img{
			border-radius:20px;
		}

		.icon {
		    width: 72px;
		    height: 72px;
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
	    <div class="left">
			<a href="index.php" ><img width="70px" height="70px" src="img/logo.jpg"></a>
		</div>
		<div class="mid">
			<a href="addAdmin.php" style="text-decoration:none;">
				<i class="fa fa-user"></i>&nbsp <span style="color:#f78f8f;">Add new Admin</span>
			</a>
		 </div>
		 <div class="right">
			<a href="logout.php" style="text-decoration:none;">
				<i class="fa fa-power-off"></i>&nbsp <span style="color:#f78f8f;">Logout</span>
			</a>
		 </div>

	</div>
	
	<div class="container">
		<div class="child">
			<h3 style="text-align: center;color:#99955f;height:60px;padding-top:20px;background:white;width:60%;" >Welcome To Mess Meal Management System
		</div>
				
		<div class="dv">				
			<div class="div1">
				<p> <a href="update_member.php" style="text-decoration:none;color:black"><img class="icon" src="img/member.png"> Update Membership</a>  </p>
			</div>
			
			<div class="div2">
				<p><a href="rules.php" style="text-decoration:none;color:white"><img class="icon" src="img/rules.jpg">Rules & <br>Regulation</a> </p>
			</div>
			
			<div class="div3">
				<p><a href="archieve.php" style="text-decoration:none;color:black"><img class="icon" src="img/archieve.png"> Archive</a></p>
			</div>
		
		</div>

	</div>
	<div class="last">
		<div class="div4">
			<p> <a href="new_manager.php" style="text-decoration:none;color:white"><img class="icon" src="img/manager.png">Assign new <br> Manager</a>  </p>
		</div>
	</div>
	
	<div class="footer">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>

</body>

</html>