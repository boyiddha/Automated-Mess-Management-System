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
		body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
		
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
		.container{
			background-color:#faf3e6;
		}
		.child{
			padding-left:20%;
			padding-top:5px;
		}
		.type{
			height:30px;
			background-color: #00cc00;
			margin-left:100px;
			margin-right:150px;
		}
		.alert1{
			width:100%;
			height:314px;
		}

		p{
			font-size:23px;
			font-weight:bold;
		}
		.child3{
			background-color:#faf7f0;
		}
		table {
			border-collapse: collapse;
			border-spacing: 0;
			border: 1px solid green;
			width:auto;
			margin-left:27%;
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

		
		@media only screen and (max-width: 700px) {
			.alert1{
				height:270px;
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
				height:auto;
				margin:0;
				padding:0;
			}
			.type{
				margin-left:25px;
				margin-right:25px;
			}
		}
		.container:after{
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
			background-color: #a8b072;
			color: white;
			padding: 10px;
			text-align: right;
			font-size: 15px;
			height:39px;
			margin-top:7px;
			margin-bottom:0;

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
	
	<div class="container">
		<div class="child">
			<h3 style="text-align: center;color:#99955f;height:60px;padding-top:20px;background:white;width:60%;" >Welcome To Mess Solution System
		</div>
		
		<div class="type">
			<h3 style="text-align: center;">*Deposit* </h3>
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
										$user=$_SESSION['phone_no'];
										if($user==$rows['phone'])
										{
	

							?>
										<tr style="background-color:#9ef59d;">
											<td><?php echo$i++;?></td>
											<td name="nam"><?php echo$rows['name']; ?></td> &nbsp
											<td><?php echo$rows['room_no'];?></td> &nbsp
											<td><?php echo$rows['phone']; ?></td> &nbsp
											<td><?php echo$rows['date']; ?></td> &nbsp
											 
											<td style="text-align:center;">
												<?php echo$rows['amount'] ?> &#x09F3</td>
											</td>
											
										</tr>
										
  
						          <?php } else { ?>
												<tr>
													<td><?php echo$i++;?></td>
													<td name="nam"><?php echo$rows['name']; ?></td> &nbsp
													<td><?php echo$rows['room_no'];?></td> &nbsp
													<td><?php echo$rows['phone']; ?></td> &nbsp
													<td><?php echo$rows['date']; ?></td> &nbsp
													 
													<td style="text-align:center;">
														<?php echo$rows['amount'] ?> &#x09F3</td>
													</td>
												
												</tr>
						
						<?php   }   }    } ?>
								
								
								
								
								
	
							 
							</tbody>
					</table>
				
				</form>
				
				
    <?php	    
        	} ?>
		
		</div>
	
		<div class="footer">
			Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
		</div>

	</div>

</body>

</html>