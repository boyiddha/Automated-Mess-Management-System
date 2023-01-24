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
		.container{
			background-color:#faf3e6;
			min-height:477px;
		}
		.child{
			margin-left:10%;
			margin-bottom:10px;
		}
		.child2{
			position:relative;
			margin:0;
			background-color:#dcf5ba;
			height:34px;
			color:#02507a;
			text-align:center;
			padding-top:3px;
			animation:title;
			animation-duration:3s;
			animation-iteration-count:infinite;
		}
		@keyframes title{
			from {background-color:#dcf5ba;}
			to{background-color:#78ad0c;}
		}
		.link1{
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}

		.link1:hover {
			 box-shadow:7px 7px 40px 25px #0509f0;
		}
		
		.wrap{
			margin-left:21%;
			margin-top:32px;
		}
		.wrp{
			margin-left:20px;
			height:490px;
			overflow-x:hidden;
			overflow-y:scroll;
		}
		table {
			border-collapse: collapse;
			border-spacing: 0;
			border: 1px solid green;
			width:auto;
		}

		td {
			text-align: left;
			padding:3px;
			border: 1px solid #f5d582;
		}
		tr{
			height:50px;
		}
		th{
			height:35px;
			text-aign:left;
			border:1px solid #f5d582 ;
			position:sticky;
			top: 0px;
			background:#fceabb;
		}
		
		tr:nth-child(even){
			background-color: #f2f2f2
		} 
		
		tr:hover {
			background-color: #c3c7c3;
		}
		
		.scrollable-element {
			scrollbar-color: #575251;
		}
		.edit{
			width:135px;
			text-align:center;
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
				min-height:468px;
				width:auto;
			}
			.child{
				margin:0;
				width:100%;
			}
			
			.child2{
				margin:0;
				margin-bottom:5px;
			}
			.wrap{
				margin:0;
				margin-top:32px;
				width:100%;
			
			}
			.wrp{
				height:490px
				
				margin-left:5px;
				margin-right:5px;
				overflow-x:auto;
				overflow-y:auto;
			}
			table{
				width:190%;
			}
			
		}
		
		.navbar:after{
			content: '';
			display: table;
			clear: both;
		}
		.wrap:after{
			content:'';
			display:table;
			clear:both;
		}
		.alert {
			margin-left:23%;
			padding: 10px;
			background-color: #f44336;
			color: white;
			width:300px;
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
			height:30px;
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
		
		/* Custom Scrollbar */
		
		/* width */
		
		::-webkit-scrollbar {
			width: 15px;
		}

		/* Track */
		
		::-webkit-scrollbar-track {
			background:#c5f5c4;
		}
		 
		/* Handle */
		::-webkit-scrollbar-thumb {
			background:#7cf06c ;
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
	
	<div class="container">
		<div class="child">
			<h3 style="margin-left:12%;text-align: center;color:#99955f;height:30px;background:white;width:65%;" >Welcome To Mess Solution System
			<p class="child2" >*Manager List*</p>
		</div>
		
		<div class="wrap">
			<div class ="wrp">

				<table >
					<thead >
						<tr >
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Room_No</th>
							<th>Entry Date</th>
							<th>Assigned Manager <i class='fa fa-user cntr'  style="color:green;font-size:20px;"></i> </th>
						</tr>
					</thead>
					
					<tbody>
					  <?php
							$query = "SELECT * FROM manager";
							$rs = $conn->query($query);
							$num = $rs->num_rows;
							$sn=0;
							$status="";
							if($num > 0){ 
								while ($rows = $rs->fetch_assoc()) {
									
									if($rows['Sl_no']==1){
										echo"
											<tr style='background-color:#4af751'>
											<td>".$rows['Sl_no']."</td>
											<td>".$rows['user_name']."</td>
											<td>".$rows['email']."</td>
											<td>".$rows['phone']."</td>
											<td style='text-align:center;'>".$rows['room_no']."</td>
											<td>".$rows['Entry_Date']."</td>
											<td style='text-align:center;'><i class='fa fa-user cntr'  style=\"color:green;font-size:50px;\"></i></td>
											
											</tr>";
									}
									else{
										echo"
											<tr>
											<td>".$rows['Sl_no']."</td>
											<td>".$rows['user_name']."</td>
											<td>".$rows['email']."</td>
											<td>".$rows['phone']."</td>
											<td style='text-align:center;'>".$rows['room_no']."</td>
											<td>".$rows['Entry_Date']."</td>
											<td style='text-align:center;'><i class='fa fa-lock cntr'  style=\"color:#0509f0;font-size:22px;\"></i></td>
											
											</tr>";
									}
								}
							}
							else{
								 echo "<div class='alert'>
									<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
									<strong>No Record Found!</strong>
									</div>";
							}
							
						  
						  ?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<div style="margin:0;padding:0;background-color:#aafaaa;height:5px;"></div>
	
	<div class="footer">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>

</body>

</html>