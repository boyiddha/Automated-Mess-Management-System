<?php 
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
?>

 <?php
   if(isset($_GET["delete"]))
   {
		$date1=$_GET["delete"];
	   
		$query="DELETE FROM mealcount WHERE date='$date1' ";
		$result=$conn->query($query);
		if($result){
			$msg3="<div class='success'>
			<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
			<strong>Successfully Deleted!</strong>
			</div>";

		}
	   else{
				$msg3="<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>Please Try Again!</strong>
				</div>";

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
			.img1{
				height:145px;
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
			.container {
			    margin-top: 8px;
			    text-align: center;
			    margin-left:23%;
			}
			.basic {
			    text-align: center;
			    padding-top: 28px;
			    background: #efefef;
			    /* color: #f0212166; */
			    color: #000;
			    padding-bottom: 28px;
			    box-shadow: 0px 5px 7px #c9ced4;
			    margin-top: 11px;
			    margin-bottom: 12px;
			    border-radius: 1px;
			}
			.table{
				width:100%;
				margin:3px;
				padding:5px;
				
			}
			td {
				text-align: left;
				vertical-align: top;
				border-top: 1px solid #dee2e6;
			}

			
			tr:nth-child(even){
				background-color: #f2f2f2
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
			.btn2{
				background-color:#3385ff;
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
					box-shadow:10px 7px 50px 15px #3385ff;
			}
		
			.btn3{
				background-color:#ff3333;
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
			.btn3:hover {
			    box-shadow:10px 7px 50px 15px #ff3333;
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
					height:auto;
				}
				.text1{
					top:55%;
					left:10%;
					font-size:22px;
				}
				.container{
					margin-left:5%;
				}
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

	<div class="container" >

		<div class="basic"  >
			<h3 style="text-align: center;">Datewise Daily Meal Count </h3>
			 <?php 
				  if(isset($msg3)){
					echo $msg3;
				  }
				  if($_GET[stt]==success){  // update meal
					  echo "<div class='success'>
			<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
			<strong>Updated Successfully!</strong>
			</div>"; 
				 }
				 if($_GET[stt]==alert){
					 echo "<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>Please Try Again!</strong>
				</div>";
				 }
			 ?>
		</div>
		<div >
		    <table class="table " border="0" cellspacing="0" cellpadding="0">
				<?php 
					$query="SELECT DISTINCT date FROM mealcount ";
					$result=$conn->query($query);
					$count=$result->num_rows;
					if($count>0){
					    while($row=$result->fetch_assoc()){
				?>
							<tr>
							  <td ><button class="btn1">Date:<?php echo$row['date']; ?></button></td>
							  <td ><button class="btn2"><a style="text-decoration:none;" href="update.php?update=<?php echo$row['date']; ?>">Update</a></button></td>
							  <td ><button class="btn3"><a style="text-decoration:none;" href="?delete=<?php echo$row['date']; ?>">Delete</a></button></td>
							</tr>
				  <?php } ?>
				
			</table>
			  <?php }
					else{?>

					    <h2 style="color:red;text-align:center;padding-top:100px;padding-bottom:100px;">Sorry! No Meal Count Yet</h2>
			  <?php }?>
		</div>
	</div>
	

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
