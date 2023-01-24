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
			height:109%;
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

		.dv{
			padding-left:29%;
			margin-top:10px;
			height:450px;
			overflow:auto;
		}
		p{
			font-size:23px;
			font-weight:bold;
		}
		td {
			text-align: left;
			padding: 10px;
		}
		th{
			height:40px;
			text-aign:left;
			border:2px solid #f5d062;
			position:sticky;
			top: 0px;
			background: #f5e6ba;
		}
		
		tr:nth-child(even){
			background-color: #dcdedd;
		} 
		
		tr:hover {
			background-color: #c3c7c3;
		}
		.btn1{
			background-color:#2eb82e;
			color:white;
			width:150px;
			height:40px;
			margin:4px;
			
		}
		.see1{
			color:white;
		}
		.see1:hover{
			color:red;
		}
		.btn2{
			background-color:#3333ff;
			text-align:center:
			height:40px;
			margin:4px;
			border:none;
			border-radius: 7px;
			padding:10px;
			float:right;				
			display:inline-block;
			cursor:pointer;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.btn2:hover {
				box-shadow:10px 7px 50px 15px #3333ff;
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
				height:auto;
			}
			.dv{
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
			<h3 style="text-align: center;">Datewise Daily Meal Count </h3>
		</div>
		<div style="margin-left:22%;">
			<h3 style="color:green" > Date: &nbsp <?php 
				$date=$_GET['date'];
				$newDate = date("d-m-Y", strtotime($date));  
				echo $newDate;  ?>
			</h3>
		</div>
				
		<div class="dv">				
			<form action="" method="post" style=" font-family:Times New Roman;font-size:1em;">
				<table class="tbl">
					<thead>
						<tr>
							<th>No.</th>
							<th>name</th>
							<th>Phone</th>
							<th>Room_no.
							<th>Meal</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							//error_reporting(0);
							
							$date=$_GET['date'];         
							$query="SELECT mealcount.phone,mealcount.date,mealcount.meal ,member.name, member.room_no FROM mealcount,member where member.phone=mealcount.phone and mealcount.date='$date'  ";
							$result=$conn->query($query);
							
							// for checking sql error
							//if (!mysqli_query($conn, $query)) {
							//				echo "Error: Error. Error. Error e........... Error ...... Error /////////////// Error ... Error: " . mysqli_error($conn);
							//}
							if($result){
								$i=1;
								while($row=$result->fetch_assoc()){
									$user=$_SESSION['phone_no'];
									if($user==$row['phone'])
									{
						?>
									<tr style="background-color:#9ef59d;">
										<td><?php echo$i++;?></td>
									   
										<td><?php echo$row['name'];?></td>
										<td><?php echo$row['phone'];?></td>
										<td><?php echo$row['room_no'];?></td>
										 
										<td> 
											<?php 
												$cnt=$row['meal'];
											?>
											<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" <?php
													echo"checked";
											?>> <?php echo $cnt;?> &nbsp
											
											
												 
										</td>
									</tr>
					         <?php  } else {?>
											<tr>
												<td><?php echo$i++;?></td>
											   
												<td><?php echo$row['name'];?></td>
												<td><?php echo$row['phone'];?></td>
												<td><?php echo$row['room_no'];?></td>
												 
												<td> 
													<?php 
														$cnt=$row['meal'];
													?>
													<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" <?php
															echo"checked";
													?>> <?php echo $cnt;?> &nbsp
													
													
														 
												</td>
											</tr>
							 
					 <?php  }    }       }?>
						 
						</tbody>
				</table>
			
			</form>
		
		</div>
		<div class="footer">
			Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
		</div>

	</div>

</body>

</html>