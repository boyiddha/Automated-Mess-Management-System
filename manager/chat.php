<?php 
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
?>

<?php
	if(isset($_GET["delete"])){
		$query="DELETE from chat";
		$res=$conn->query($query);
		header('Location:chat.php');
    }
?>

<?php
	if (isset($_POST['submit'])){
		
		// Escape user inputs for security
		$un= "Manager: ".$_SESSION['name']."(".$_SESSION['phone_no'].")";
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
				;
			} else{
				echo "ERROR: Message not sent!!!";
			}
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
			body {font-size:16px;}
			.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
			.w3-half img:hover{opacity:1}
			.clr{
				width:100%;
				margin-top:10px;
				content:'';
				display:table;
				clear:both;
			}
			.home {
				float:left;
				background-color:green;
				color: white;
			}
			.home a{
				display: block;
				color: black;
				padding: 12px;
				text-decoration: none;
			}
				
			.logout a{
				display: block;
				color: black;
				padding: 12px;
				text-decoration: none;
			}
			.logout{
				float:right;
				color:white;
				margin-left:1px;
				background-color:red;
			}
			.row1{
				margin-left:22%;
				height:15px;
				width:78%;
				background-color:#3737fa;
			}
			.row2{
				margin-left:22%;
				width:78%;
			}
					*{
			box-sizing:border-box;
			}
			body{
				background-color:#abd9e9;
				font-family:Arial;
			}
			#container{
				margin-left:44%;
				width:485px;
				height:610px;
				background:white;
				
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
				height:160px;
				background-color:#622569;
			}
			main footer .input1{
				color:white;
				display:block;
				margin:0;
				padding-top:3px;
				cursor:pointer;
				width:80px;
				height:30px;
				border-radius:7px;
				text-decoration:none;
				font-size:13px;
				background-color:red;
				border: 2px solid white;
				-webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}
			main footer .input1:hover{
				box-shadow:10px 7px 70px 20px red;
			}
			
			main footer textarea{
				resize:none;
				border:100%;
				display:block;
				width:101%;
				height:87px;
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
				height:50px;
			}
			@media screen and (max-width: 700px) {
				
				.logout{
					margin:0px;
					 width:125px;
				 }
				.matha{
					margin-top:70px;
				}
				#container{
					height:600px;
					margin:0 auto;
				}
				main .inner_div{
					height:420px;
				}
				
			}   
								/* footer starts from here  */
			.footer2{
				background-color: #d1d1cf;
				color: black;
				text-align: right;
				font-size: 15px;
				height:60px;
				margin-top:7px;
			}
			.footer2::after{
				display: table;
				content: '';
				clear: both;
			}
			
			
			.notification {
			    position: relative;
			}

			.notification .badge {
			    position: absolute;
			    top: -5px;
			    right: 125px;
			    padding: 5px 10px;
			    border-radius: 50%;
			    background-color: red;
			    color: white;
			}
			
		</style>
		
</head>
<body onload="show_func()">

	<!-- Sidebar/menu -->
	<?php
		include('navigation.php');
	?>

	<!-- Top menu on small screens -->
	<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
	<a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
	<span>Mess Solution System</span>
	</header>

	<!-- Overlay effect when opening sidebar on small screens -->
	<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

	<!-- !PAGE CONTENT! -->

	<div class="row1">
	</div>

	<div class="row2" id="container">
	
		<main>

			<div class="matha" style="height:20px;margin-left:160px;">
				<p>GROUP CHAT</p>
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
					<footer>
						<table>
							<tr>
								<th>
									<a class="input1" href="?delete=chat" onclick="return confirm('Are you want to Clear History?')">Clear Chat </a>
								</th>
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
	
	<div class="footer2">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>

	<script>
		// Script to open and close sidebar
		function w3_open() {
		document.getElementById("mySidebar").style.display = "block";
		document.getElementById("myOverlay").style.display = "block";
		}

		function w3_close() {
		document.getElementById("mySidebar").style.display = "none";
		document.getElementById("myOverlay").style.display = "none";
		}

		// Modal Image Gallery
		function onClick(element) {
		document.getElementById("img01").src = element.src;
		document.getElementById("modal01").style.display = "block";
		var captionText = document.getElementById("caption");
		captionText.innerHTML = element.alt;
		}
	</script>

</body>
</html>
