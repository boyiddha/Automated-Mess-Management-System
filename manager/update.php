<?php 
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
?>


<?php 
                 
	if(isset($_POST['submit']))
	{
		if(isset($_GET["update"]))
		{
			$date=$_GET["update"];
		}

	    $attend=$_POST['attend'];
		  
		foreach ($attend as $key1 => $value) 
		{
			if($value=="A")
			{
			    $query="UPDATE mealcount set meal=0 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}

			elseif($value=="B")
			{
				$query="UPDATE mealcount set meal=0.5 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}
			elseif($value=="C")
			{
				$query="UPDATE mealcount set meal=1 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}
			elseif($value=="D")
			{
				$query="UPDATE mealcount set meal=1.5 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}
			elseif($value=="E")
			{
				$query="UPDATE mealcount set meal=2 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}
			elseif($value=="F")
			{
				$query="UPDATE mealcount set meal=2.5 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}
			elseif($value=="G")
			{
				$query="UPDATE mealcount set meal=3 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}
			elseif($value=="H")
			{
				$query="UPDATE mealcount set meal=3.5 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}
			elseif($value=="I")
			{
				$query="UPDATE mealcount set meal=4 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}
			elseif($value=="J")
			{
				$query="UPDATE mealcount set meal=4.5 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}
			elseif($value=="K")
			{
				$query="UPDATE mealcount set meal=5 WHERE phone='$key1' AND date='$date' ";
			    $result=$conn->query($query);
			  
			}
 
		}

		if($result)
		{
			
			header('Location:view.php?stt=success');
		}
		else
		{

			header('Location:view.php?stt=alert');
						
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
			.container{
				margin-left:23%;
			}
			.date{
				background-color:#f2f2f2;
			}
			td {
				text-align: left;
				padding: 10px;
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
				background-color: #dcdedd
			} 
			
			tr:hover {
				background-color: #c3c7c3;
			}
			.dt{
				margin-top:2%;
				width:100%;
				height:33px;
				font-weight:600;
				
			}
			.btn2{
				color:white;
				margin-left:26%;
				height:35px;
				width:100px;
				background-color:#0ac94a;
				border:none;
				border-radius:7px;
				text-align:center;
				display:inline-block;
				cursor:pointer;
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}

			.btn2:hover {
			    box-shadow:10px 7px 70px 20px #0ac94a;
			}
			.meal{
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}
			.meal:hover{
				box-shadow:2px 4px 20px 10px green;
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
					margin:0;
				}
				.dt{
					margin-to:8%;
				}
				.btn2{
					margin-left:15%;
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
				margin-top:5%;

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
			Welcome to Mess Solution System
		</div>
	</div>

	<div class="container">
		  <div class="date">
			<h3 style="text-align: center;padding: 10px;">Update Meal Count!</h3>
			<h4 style="margin:13px;">
				<?php if(isset($_GET['update'])){
					$date=$_GET['update'];
					echo"Date: ". $date;
				}?>
			</h4>
			
		</div>
		
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
						
						if(isset($_GET['update'])){
							 $date=$_GET['update'];
						}          
						$query="SELECT mealcount.phone,mealcount.date,mealcount.meal ,member.name, member.room_no FROM mealcount,member where member.phone=mealcount.phone and mealcount.date='$date'  ";
					    $result=$conn->query($query);
						
						// for checking sql error
						//if (!mysqli_query($conn, $query)) {
						//				echo "Error: Error. Error. Error e........... Error ...... Error /////////////// Error ... Error: " . mysqli_error($conn);
						//}
					    if($result){
							$i=1;
						    while($row=$result->fetch_assoc()){
								
							    ?>
							    <tr>
									<td><?php echo$i++;?></td>
								   
									<td><?php echo$row['name'];?></td>
									<td><?php echo$row['phone'];?></td>
									<td><?php echo$row['room_no'];?></td>
									 
									<td> 
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="A"<?php
											if($row['meal']==0){
												echo"checked";
										}?>>  0 &nbsp
										
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="B"<?php 
											 if($row['meal']==.5){
												echo"checked";
											 }
										?>>  0.5 &nbsp
										
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="C"<?php 
											 if($row['meal']==1){
												echo"checked";
											 }
										?>>  1 &nbsp
										
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="D"<?php 
										 if($row['meal']==1.5){
											echo"checked";
										 }
										?>>  1.5 &nbsp
										
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="E"<?php 
											 if($row['meal']==2){
												echo"checked";
											 }
										?>>  2 &nbsp
										
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="F"<?php 
											 if($row['meal']==2.5){
												echo"checked";
											 }
										?>>  2.5 &nbsp
										
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="G"<?php 
											 if($row['meal']==3){
												echo"checked";
											 }
										?>>  3 &nbsp
										
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="H"<?php 
											 if($row['meal']==3.5){
												echo"checked";
											 }
										?>>  3.5 &nbsp
										
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="I"<?php  
											 if($row['meal']==4){
												echo"checked";
											 }
										?>> 4 &nbsp
										
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="J"<?php  
											 if($row['meal']==4.5){
												echo"checked";
											 }
										?>>4.5 &nbsp
										
										<input class="meal" type="checkbox" name="attend[<?php echo$row['phone']?>]" value="K"<?php 
										 if($row['meal']==5){
											echo"checked";
										 }
										?>> &nbsp 5 
											 
									</td>
							    </tr>
				 <?php }}?>
					 
					</tbody>
			</table>
		
			<div class="dt">
				<input style="margin-bottom:12px;" type="submit" name="submit" value="Update " class="btn2" >
			</div>
		
		</form>
		
		
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