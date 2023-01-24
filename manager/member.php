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
			.img1{
				height:100px;
				width:100%;
			}
			.photo1{
				position:relative;
				text-align:center;
				color:#055aed;
			}
			.text1{
				position:absolute;
				top:30%;
				left:40%;
				
				font-size:30px;
			}

			@media screen and (max-width: 700px) {
				
				.logout{
					margin:0px;
					 width:125px;
				 }
				.active{
					 width:120px;
				 }
				.photo1{
					margin:0;

				}
	
				.img1{
					height:150px;
				}
				.text1{
					top:50%;
					left:10%;
					font-size:22px;
				}
			}   
			h3{
				position:relative;
				margin-top:0;
				margin-left:22%;
				background-color:#dcf5ba;
				height:40px;
				color:#02507a;
				text-align:center;
				padding-top:5px;
				animation:title;
				animation-duration:3s;
				animation-iteration-count:infinite;
			}
			@keyframes title{
				from {background-color:#dcf5ba;}
				to{background-color:#c6fa7f;}
			}
			.btn1{
				margin-left:88%;
				background-color:#209cfa;
				height:60px;
				width:160px;
				text-align:center;
				font-weight:600;
				border-radius:13px;
				margin-bottom:3px;
				-webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}
			.btn{
				display: block;
				color: white;
				padding: 15px;
				margin-left:15px;
				text-decoration: none;
			}
			.btn1:hover{
				box-shadow:10px 7px 70px 50px #209cfa;
			}
			.link1{
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}

			.link1:hover {
			     box-shadow:7px 7px 40px 17px #0509f0;
			}
			.link2{
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}

			.link2:hover {
			     box-shadow:7px 7px 40px 17px red;
			}
			
			.wrap{
				margin-left:22%;
				width:78%;
				background-color:#ecf2eb;
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
				border: 2px solid #529432;
			}
			tr{
				height:50px;
			}
			th{
				height:40px;
				text-aign:left;
				border:2px solid green;
				position:sticky;
				top: 0px;
				background:#04ba3d;
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
			@media screen and (max-width: 700px) {
				.photo1{
					margin:0;
				}
				.content{
					margin:0;
				}
				.text1{
					top:3%;
					left:10%;
					font-size:22px;
				}
				.wrap{
					margin:0;
					width:100%;

				}
				.wrp{
					height:490px
					margin-left:5px;
					margin-right:5px;
					overflow-x:auto;
					overflow-y:auto;
				}
				h3{
					margin:0;
					margin-bottom:15px;
				}
				.btn1{
					margin-left:66%;
				}
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
			.success{
				background-color:#04AA6D;
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
			    top: -5px;
			    right: 125px;
			    padding: 5px 10px;
			    border-radius: 50%;
			    background-color: red;
			    color: white;
			}
			/* footer starts from here  */
			.footer{
				background-color: #d1d1cf;
				color: black;
				padding: 10px;
				text-align: right;
				font-size: 15px;
				height:68px;

			}
			.footer::after{
				display: table;
				content: '';
				clear: both;
			}
			
					
			/* Custom Scrollbar */
			
			/* width */
			
			::-webkit-scrollbar {
				width: 15px;
			}

			/* Track */
			
			::-webkit-scrollbar-track {
				background:#f1f1f1;
			}
			 
			/* Handle */
			::-webkit-scrollbar-thumb {
				background:#b1b5b4 ;
			}

			/* Handle on hover */
			::-webkit-scrollbar-thumb:hover {
				background: #161717; 

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
	<span>Mess Solution System</span>
	</header>

	<!-- Overlay effect when opening sidebar on small screens -->
	<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

	<!-- !PAGE CONTENT! -->

	<div class="photo1">
		<img class="img1"src="img/banner.jpg"  >
		<div class="text1"> 
			Welcome to Mess Management System
		</div>
	</div>
	
	<h3 >Member Information</h3>
	<?php 
		if(isset($_SESSION['status'])){
			echo $_SESSION['status'];
			unset($_SESSION['status']);
		}
	?>
	
	<div class="btn1">
		<a href="member_add.php" class="btn">Add Member  <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
	</div>
	<div class="wrap">
		
		<div class="wrp">
			<table>
				<thead >
					<tr >
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Password</th>
						<th>Phone</th>
						<th>Room_No</th>
						<th>Address</th>
						<th>Joing Date</th>
						<th>Update</th>
						<th>Remove</th>
					</tr>
				</thead>
				
				<tbody>
				  <?php
						$query = "SELECT * FROM member";
						$rs = $conn->query($query);
						$num = $rs->num_rows;
						$sn=0;
						$status="";
						if($num > 0){ 
							while ($rows = $rs->fetch_assoc()) {
								$sn = $sn + 1;
								echo"
									<tr>
									<td>".$sn."</td>
									<td>".$rows['name']."</td>
									<td>".$rows['email']."</td>
									<td>".$rows['password']."</td>
									<td>".$rows['phone']."</td>
									<td>".$rows['room_no']."</td>
									<td>".$rows['address']."</td>
									<td>".$rows['Joining_Date']."</td>
									
									<td style='text-align:center;'><a  href='member_edit.php?edit=".$rows['email']."'><i class='fa fa-edit cntr link1'  style=\"color:#0509f0;font-size:20px;\"></i></a></td>
									
									<td style='text-align:center;'><a  onclick=\"return confirm('Are you want to delete?')\"  href='member_delete.php?Id=".$rows['email']."'> <i class='fa fa-times cntr link2' style=\"color:red;font-size:20px;\"></i> </a> </td>
									
									</tr>";
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
	<div style="margin:0;padding:0;background-color:#aafaaa;height:5px;"></div>
	<div class="footer">
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
