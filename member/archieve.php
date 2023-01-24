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
			height:467px;
		}
		.child{
			margin-left:10%;
			margin-bottom:10px;
		}
		.child2{
			position:relative;
			margin:0;
			background-color:#dcf5ba;
			height:25px;
			color:#02507a;
			text-align:center;
			
			padding-top:3px;
		}
		.row2{
			margin-left:30%;
			width:39%;
			text-align:left;
			
		}
		.row22{
			margin-left:5%;
			height:400px;
			overflow-y:auto;
			padding-bottom:7px;
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
				height:456px;
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
			.row2{
				margin-top:25px;
				margin-left:25px;
				width:auto;
			}
			.row22{
				margin:0;
				height:370px;
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
		table {
		    border-collapse: collapse;
		    border-spacing: 0;
		    border: 1px solid green;
			table-layout:auto;
			width:auto;
			
		}
		

		th, td {
		    text-align: left;
		    padding: 10px;
			
		}
		th{
			position:sticky;
			top: 0px;
			background:#f2f7f7;
		}
		

		/* 
		tr:nth-child(even){
			background-color: #f2f2f2
		} 
		*/
		
		tr:hover {
			background-color: #dbd8d7;
		}
		
		.scrollable-element {
		    scrollbar-color: #575251;
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
			height:28px;
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
			<h3 style="margin-left:12%;text-align: center;color:#99955f;height:30px;background:white;width:65%;" >Welcome To Mess Management System
			<p style="color:#fa7575;" class="child2" > Records</p>
		</div>
		
		<div class="row2">

			<div class="row22">
				
				<?php
					if(isset($msg3)){
						echo $msg3;
					}
				?>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Manager Name</th>
							<th>File Name</th>
							<th>View</th>
							<th>Download</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$query="select * from record order by id DESC";
						$result=$conn->query($query);
						while($row = mysqli_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $row['manager_name']; ?></td> 
							<td><?php echo $row['filename'];?> </td>
							<td ><a class="btn1"  href="../admin/record/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
							<td><a class="btn1" href="../admin/record/<?php echo $row['filename']; ?>" download>Download</td>
						</tr>
						<?php } ?>
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