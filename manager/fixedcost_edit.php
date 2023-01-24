<?php 
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
?>

<?php 
    if(isset($_POST['submit'])){
		$net=$_POST['net'];
		$khala = $_POST['khala'];
		$khori = $_POST['khori'];
        
        $query="UPDATE fixedcost set net ='$net',khala='$khala',khori='$khori' ";
		$result=$conn->query($query);
		
		
				// Check query Erorr
		//if (!mysqli_query($conn, $query)) {
			//echo "Error: Error. Error. Error e............... Error ...... Error /////////////// Error ... Error: " . mysqli_error($conn);
		//}
                    
		if($result)
		{
			$_SESSION["msg"] = "<div class='success'>
			<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
			<strong>Net/Khori/Khala Bill updated Successfully!</strong>
			</div>"; 
			header('location:costExtra.php');
		}
		else
		{
			$_SESSION["msg"]="<div class='alert'>
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
			.child{
				padding-left:20%;
				padding-top:5%;
				height:130px;
				background-color:#faf3e6;
				
			}
			.child h3{
				width:60%;
			}
			.container{
				background:#f2f5f3;
				margin-left:22%;
			}
			.addform{
				margin-left:10%;
				height:330px;
			}
			.btn{
				margin-top:15px;
				margin-left:250px;
				color:white;
				height:35px;
				width:100px;
				background-color:#0ac94a;
				border:none;
				text-align:center;
			
				cursor:pointer;
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}

			.btn:hover {
			    box-shadow:10px 7px 70px 20px #0ac94a;
			}
			
			@media screen and (max-width: 700px) {
				
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
				.child{
					padding-top:15%;
					padding-left:20px;
				}
				.child h3{
					font-size:18px;
					width:90%;
				}
				.container{
					margin-left:1%;
				}
				
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

	<div class="container">
		<div class="child">
			<h3 style="text-align: center;color:#99955f;height:60px;padding-top:20px;background:white;" >Welcome To Mess Solution System</h3>
		</div>
		<div class="basic"  >
			<h3 style="text-align:center;padding: 13px;">Update Net/Khala/Khori Bill</h3>
		</div>
		
		<div class="addform">
	  
			  <h3>Today Date:&nbsp<?php echo date('d/m/y');?></h3><br>
			  
			   <form class="formmain" method="post" enctype="multipart/form-data">

						<label>Total Net Bill :&nbsp</label>
						<input type="number" name="net" required="" placeholder="Enter Total Net Bill"><br><br>
						
						<label>Total Khala Bill :&nbsp</label>
						<input type="number" name="khala" required="" placeholder="Enter Total Khala bill"><br><br>
						
						<label>Total Khori Bill :&nbsp</label>
						<input type="number"  name="khori" required="" placeholder="Enter Total Khori Bill"><br><br>
						  
				  
					  <input type="submit" class="btn"  name="submit" value="Save" >          


			</form>
		</div>
		<div class="footer">
			Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
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
