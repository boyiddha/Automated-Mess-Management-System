<?php 
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
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
		
		
		<!--   to create modal popup, the Bootstrap and jQuery library need to be included first.   -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
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
				padding:5px;
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
			a{
				text-decoration:none;
			}
			.logout{
				float:right;
				color:white;
				margin-left:1px;
				background-color:red;
			}
			
			
			.first{
				background-color: #d5f7f6;
				height:10px;
			}
			.navbar{
				margin-left:22%;
				width:78%;
			}
			.nav1{
				width:200px;
				float:left;
				padding-top:0px;
				
			}
			.nav2{
				width:200px;
				float:left;
				text-align:left;
				padding-top:8px;
				color:#f78f8f;
			}
			.nav3{
				width:200px;
				float:left;
				text-align:left;
				padding-top:8px;
				color:#f78f8f;
			}
			.nav4{
				width:200px;
				float:left;
				text-align:left;
				padding-top:8px;
				color:#f78f8f;
			}
			.nav5{
				width:200px;
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
				margin-left:22%;
				background-color:#faf3e6;
			}
			.child{
				padding-left:20%;
				padding-top:5px;
				height:130px;
				background-color:#faf3e6;
				
			}
			.child h3{
				width:60%;
			}
			.child2{
				background-color:#fcf3d7;
				padding-left:20%;
				margin:15px;
				height:50px;
			}
			.child3{
				background-color:#faf7f0;
			}
			table {
				border-collapse: collapse;
				border-spacing: 0;
				border: 1px solid green;
				width:auto;
				margin-left:13%;
				margin-bottom:20px;
			}

			td {
				text-align: left;
				padding: 10px;
				border: 2px solid #cfc99b;
			}
			th{
				height:40px;
				text-aign:left;
				border:2px solid green;
				position:sticky;
				top: 0px;
				background:#f5f1b0;
			}
			
			tr:nth-child(even){
				background-color: #f2f2f2
			} 
			
			tr:hover {
				background-color: #c3c7c3;
			}
			
			.alert {
				margin-left:3%;
				margin: 10px;
				background-color: #f7c0be;
				color: black;
				width:75%;
				height:37px;
				text-align:center;
			}
			.success{
				background-color:#b2f7b3;
				margin-left:3%;
				margin: 10px;
				color: black;
				width:75%;
				height:37px;
				text-align:center;
			}
			.closebtn {
				margin-left: 20px;
				color: red;
				font-weight: bold;
				float: left;
				font-size: 25px;
				line-height: 21px;
				cursor: pointer;
				transition: 0.3s;
			}

			.closebtn:hover {
				 color: black;
			}
			btn2{
				background-color:green;
				color:white;
				text-align:center:
				width:120px;
				height:40px;
				margin:4px;
				border:none;
				border-radius: 7px;
				padding:10px;
								
				display:inline-block;
				cursor:pointer;
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}
			.btn2:hover {
			    box-shadow:5px 5px 8px 14px #0ac94a;
			}
			.alert1{
				width:100%;
				height:314px;
			}
				h2{
				font-size: 7em;
				font-family: serif;
				color: #008000;
				text-align: center;
				animation: animate 
					1.5s linear infinite;
			}
	  
			@keyframes animate {
				0% {
					opacity: 0;
				}
	  
				50% {
					opacity: 0.7;
				}
	  
				100% {
					opacity: 0;
				}
			}
			p{
				font-size: 1.5em;
				font-family: serif;
				color: green;
				text-align: left;
				animation: animate 
					1.5s linear infinite;
			}
	  
			@keyframes animate {
				0% {
					opacity: 0;
				}
	  
				50% {
					opacity: 0.7;
				}
	  
				100% {
					opacity: 0;
				}
			}
			@media screen and (max-width: 700px) {
				.container{
					height:auto;
					margin:0;
					padding:0;
				}
				.alert1{
					height:270px;
				}
				.logout{
					margin:0px;
					 width:125px;
				 }
				.active{
					 width:120px;
				 }
				 .navbar{
					 margin-left:0px;
					 margin-top:13%;
				 }
				 .nav1{
					width:70px;
				}
				.nav2{
					width:20%;
					font-size:12px;
				}
				.nav3{
					width:20%;
					font-size:12px;
				}
				.nav4{
					width:17%;
					font-size:12px;
				}
				.nav5{
					width:20%;
					font-size:12px;
				}

				.child h3{
					font-size:18px;
					width:80%;
				}
				.child3{
					margin:0px;
					width:100%;
					overflow-x:scroll;
				}
				.tbl{
					margin:0px;
					padding:0px;
				}
				.btn2{
					width:120px;
				}
					
			}   
			.navbar:after{
				content: '';
				display: table;
				clear: both;
			}
			.container:after{
				content:'';
				display:table;
				clear:both;
			}
			
			.btn1{
				color:white;
				margin-left:60%;
				height:35px;
				width:90px;
				background-color:#0ac94a;
				border:none;
				border-radius:5px;
				text-align:center;
				
				cursor:pointer;
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}

			.btn1:hover {
			    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
			}
			
			.notification {
			    position: relative;
			}

			.notification .badge {
			    position: absolute;
			    top: -5px;
			    right: 125px;
			    padding: 10px 10px;
			    border-radius: 50%;
			    background-color: red;
			    color: white;
			}
			
			/* footer starts from here  */
			.footer{
				background-color: #d1d1cf;
				color: black;
				
				margin-right:70px;
				text-align: right;
				font-size: 15px;
				height:68px;

			}
			.footer::after{
				display: table;
				content: '';
				clear: both;
			}
			
		</style>
		
</head>
<body>

	<!-- Sidebar/menu -->
	<?php
	include('navigation.php');
	?>

	<!-- Top menu on small screens -->
	<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
	<a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
	<span>Mess Management System</span>
	</header>

	<!-- Overlay effect when opening sidebar on small screens -->
	<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

	<!-- !PAGE CONTENT! -->
	<div class="first">
    </div>
	
	<!-- navbar start here -->
	<div class="navbar">
	    <div class="nav1">
			<a href="index.php" ><img width="70px" height="70px" src="img/logo.jpg"></a>
		</div>
		 <div class="nav2">
			<a href="bazarschedule.php" style="text-decoration:none;">
				<i class="fa fa-calendar-check-o"></i>&nbsp <span style="color:#f78f8f;">Bazar Schedule</span>
			</a>
		 </div>
		 <div class="nav3">
			<a href="cost.php" style="text-decoration:none;">
				<i class="fa fa-qrcode"></i>&nbsp <span style="color:#f78f8f;">Bazar Cost</span>
			</a>
		 </div>
		<div class="nav4">
			<a href="costExtra.php" style="text-decoration:none;">
				<i class="fa fa-bars"></i>&nbsp <span style="color:#f78f8f;">Extra Cost</span>
			</a>
		 </div>
		 <div class="nav5">
			<a href="calculation.php" style="text-decoration:none;">
				<i  class="fa fa-calculator"></i>&nbsp <span style="color:#f78f8f;">Calculation</span>
			</a>
		 </div>

	</div>
	<div class="container"> <!--  Here describe deposite  -->
		<div class="child">
			<h3 style="text-align: center;color:#99955f;height:60px;padding-top:20px;background:white;" >Welcome To Mess Management System</h3>
		</div>
		<div>
		<?php 
			if(isset($_SESSION["msg"])){
				echo $_SESSION["msg"];  
				unset($_SESSION["msg"]);
				//echo"............................................................................................................................";
			}
		
		?>
		</div>
		<div class="child2">
			<h3 style="text-align: center;color:#99955f;height:60px;padding-top:20px;background:white;width:60%;" >Doposite List</h3>
		</div>
		
		<div class="child3">
			<?php
				$query=mysqli_query($conn,"select * from member");
				$result=mysqli_fetch_array($query);
				if($result<=0){
			?>		
					<div class="alert1">
						<h2 style="font-size:30px;text-align: center;color: red;">No member Found!! </h2>
						<p style="font-size:25px;text-align: center;color: red;">Please,At First Add Some Member To Continue This Whole Process.!!!!</p>
					</div>
					
					<div class="footer">
						Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
					</div>

		<?php   }
		    else
			{ 
				$query=mysqli_query($conn,"select * from deposit");
				$result=mysqli_fetch_array($query);
				if($result<=0)
				{
					$query = "SELECT * FROM member";
					$result = $conn->query($query);
				
					$i=1;
					while($rows=$result->fetch_assoc()){
						$name=$rows['name'];
						$phone=$rows['phone'];
						$room=$rows['room_no'];
						
						$amount=0.0;
						$q="Insert into deposit(name,room_no,phone,amount) values('$name','$room','$phone','$amount')";
						$res=$conn->query($q);
						
						//if (!mysqli_query($conn, $q)) {
						//	echo "Error: Error. Error. Error e............... Error ...... Error /////////////// Error ... Error: " . mysqli_error($conn);
						//}
					}
				}
		?>
				<form action="" method="post" style=" font-family:Times New Roman;font-size:1em;"> 
					<table class="tbl">
						<thead>
							<tr>
								<th>No.</th>
								<th>Name</th>
								<th>Room_no</th>
								<th>Phone</th>
								<th>Receive Date</th>
								<th>Amount BDT</th>
								<th>Update Amount</th>
							</tr>
						</thead>
						<tbody>
						   <?php 
								//error_reporting(0);
								$query = "SELECT * FROM deposit";
								$result = $conn->query($query);
								$num = $result->num_rows;
								
								if($num>0){
									
									$i=1;
									while($rows=$result->fetch_assoc()){

							?>
										<tr>
											<td><?php echo$i++;?></td>
											<td name="nam"><?php echo$rows['name']; ?></td> &nbsp
											<td><?php echo$rows['room_no'];?></td> &nbsp
											<td><?php echo$rows['phone']; ?></td> &nbsp
											<td><?php echo$rows['date']; ?></td> &nbsp
											 
											<td style="text-align:center;">
												<?php echo$rows['amount'] ?> &#x09F3</td>
											</td>
											<td ><button class="btn2" style="background:#79f27b;border:none;border-radisu:5px;"><a style="text-decoration:none;" href="updateDeposit.php?update=<?php echo$rows['phone']; ?>&name=<?php echo$rows['name'] ;?>&amnt=<?php echo$rows['amount'] ;?>">Add Money</a></button></td>
											
								</tr>
  
								<?php }} ?>
								
								
								
								
								
	
							 
							</tbody>
					</table>
				
				</form>
				
				<div class="footer">
					Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
				</div>
				
    <?php	    
        	} ?>
		
		</div>

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
