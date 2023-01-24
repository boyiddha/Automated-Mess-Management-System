<?php 
	//error_reporting(0);
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
		body{
			margin:0;
			padding:0;
		}
		.first{
		    background-color: #d5f7f6;
			height:5px;
		}
		.navbar{
			height:50px;
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
		.container{
			background-color:#faf3e6;
			height:513px;
			font-family:Arial;
			margin:0;
			padding:0;
		}
		
		#container2{
			margin-left:30%;
			width:490px;
			height:497px;
			background:red;
			
			font-size:0;
			border-radius:5px;
			overflow:hidden;
		}
		
		main{
			width:490;
			height:auto;
			display:inline-block;
			font-size:15px;
			vertical-align:top;
		}
		
		main .inner_div{
			padding:0;
			margin-left:4px;
			list-style-type:none;
			position:relative;
			overflow:auto;
			height:437px;
			background-image:url(img/board.jpeg);
			background-position:center;
			background-repeat:no-repeat;
			background-size:cover;
			position: relative;
			border-top:2px solid #fff;
			border-bottom:2px solid #fff;
			
		}
		main .triangle1{
			width: 0;
			height: 0;
			border-style: solid;
			border-width: 0 8px 8px 8px;
			border-color: transparent
			transparent  #000080 transparent;
			margin-right:45px;
			float:right;
			clear:both;
			
		}
		main .message1{
			padding:10px;
			color:white;
			margin-right:39px;
			background-color:#4d4dff;
			line-height:20px;
			max-width:90%;
			display:inline-block;
			text-align:left;
			border-radius:5px;
			float:right;
			clear:both;
		}

		.matha{
			height:50px;
			color:white;
			font-size:20px;
			margin-bottom:10px;
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
			.container{
				height:500px;
				width:auto;
			}
			#container2{
				height:480px;
				margin:0 auto;
			}
			main .inner_div{
				height:422px;
			}
			
			
		}
		
		.navbar:after{
			content: '';
			display: table;
			clear: both;
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
			background-color: #c4c4c0;
			color: black;
			padding: 10px;
			text-align: right;
			font-size: 15px;
			height:25px;
			margin-top:7px;

		}
		.footer::after{
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
			
				<i class="fa fa-bell"></i> <span style="color:#f78f8f;">Notice</span>
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
	<div style="margin:0;padding:0;background-color:red;height:2px;"></div>
	<div class="container">
		<div class="row2" id="container2">
		
			<main>

				<div class="matha" style="height:20px;margin-left:160px;">
					<p>NOTICE BOARD</p>
				</div>


				<script>
				function show_func(){

				var element = document.getElementById("chathist");
					element.scrollTop = element.scrollHeight;

				}
				</script>

				<form id="myform" action="" method="POST" enctype="multipart/form-data" >
					<div class="inner_div" id="chathist">
						<?php
							$query = "SELECT * FROM noticeboard";
							$run = $conn->query($query);
			
							while($row = $run->fetch_array()) 
						{
						?>
							<div id="triangle1" class="triangle1"></div>
							<div id="message1" class="message1">
								<span style="color:white;float:right;font-size:19px;">
									<?php echo $row['message']; ?></span> <br/>
								<div>
									<span style="color:black;float:left;font-size:12px;clear:both;">
										 <?php echo $row['managername']; ?><br>
										<?php echo $row['datetime']; ?>
									</span>
								</div>
							</div>
							<br/><br/>
						<?php

						}
						?>
					</div>
						
				</form>
			</main>
		  
		</div>
			
	</div>
	
	<div style="margin:0;padding:0;background-color:#aafaaa;height:2px;"></div>
	
	<div class="footer">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>

</body>

</html>