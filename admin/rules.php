<?php 
	// Turn off error reporting
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
	$status="";
	
	
	//--------------------- SAVE START ----------------------------------
	if(isset($_POST['save'])){
		$description=$_POST['description'];
		$dateCreated = date("Y-m-d");
		$query=mysqli_query($conn,"insert into rules(description,effective_date) value('$description','$dateCreated')");

		if ($query) {
				$status= "<div class='alert success'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>Successfully Added!</strong>
				</div>";	
				
				 echo "<script type = \"text/javascript\">
					window.location = (\"#start\")
					</script>";				
		}
		else{
			$status= "<div class='alert'>
			<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
			<strong>An Error Occurred! Please try again!</strong>
			</div>";
		}
	}
	// ----------------------------- SAVE END -------------------------------
	
	
	
	
	//--------------------------------DELETE START-----------------------------------------

  if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete"){
        $Id= $_GET['Id'];

        $query = mysqli_query($conn,"DELETE FROM rules WHERE sl_no='$Id'");
        if ($query == TRUE) {
				$q = "SELECT * FROM rules ORDER BY sl_no ASC"; 
				$rs = $conn->query($q);
				$num = $rs->num_rows;
				if($num>0){
					$sn=0;
					while ($rows = $rs->fetch_assoc()) {
						$sn+=1;
						$serial=$rows['sl_no'];
						$qry=mysqli_query($conn,"update rules set sl_no='$sn' where sl_no='$serial'");
					}
					$_SESSION['msg']= "<div class='alert'>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>Successfully Removed!</strong>
					</div>";
				}
				else{
					$qry=mysqli_query($conn,"ALTER TABLE manager AUTO_INCREMENT = 1");
				}
				echo "<script type = \"text/javascript\">
					window.location = (\"rules.php\")
					</script>";

        }
        else{
           	$status= "<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>An Error Occurred! Please try again!</strong>
				</div>"; 
         }
      
  }

?>

<! DOCTYPE html >
<html lang="en">
<head>
	<title>Mess Solution</title>
	<link rel="icon"  href="img/logo.jpg">
	<meta http-equiv = "Content-Type" content = "text/html; charset = UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   <!-- for fontawesome -->	
	
	<style>
		*{
			box-sizing:border-box;
		}
		.first{
		    background-color: #d5f7f6;
			height:10px;
		}
		.left{
			width:82%;
			float:left;
			padding-top:0px;
			
		}
		.mid{
			width:11%;
			float:left;
			text-align:left;
			padding-top:8px;
			color:#f78f8f;
		}
		.right{
			width:7%;
			float:left;
			text-align:left;
			padding-top:8px;
			color:#f78f8f;
		}
		.mid a:hover{
			color:red;
			font-size:115%;
		}
		.right a:hover{
			color:red;
			font-size:115%;
		}
		@media only screen and (max-width: 700px) {
			.left{
				width:50%;
			}
			.mid{
				width:32%;
			}
			.right{
			    width:18%;
			}
		}
		
		.navbar::after{
			content: '';
			display: table;
			clear: both;
		}
		h2{
			animation: animate 
            2.5s linear infinite;
        }
  
        @keyframes animate {
            0% {
                opacity: 0;
            }
  
            50% {
                opacity: 0.95;
            }
  
            100% {
                opacity: 0;
            }
		}
		.column{
			float:right;
			padding:10px;
			
		}
		.col1, .col3{
			width:20%;
		}
		.col2{
			width:60%;
			position: relative;
			background-color:#dcfae4;
		}

		.formmain{
			padding-left:15px;
		}
		.form-group{
			margin:7px;
		}
		.messege{
			width:65%;
			min-height:120px;
			border:2px solid grey;
			border-width:3px;
			border-radius: 12px;
			font-size:18px;
		}
		.btn{
			font-size:14px;
			color:white;
			margin-left:30%;
			margin-top:10px;
			width:70px;
			height:35px;
			border-width:3px;
			background-color:green;
			border-color:green;
			border-radius:12px;
		}
		.btn{
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;	
		}
		.btn:hover{
			box-shadow: 7px 7px 40px 17px green;
		}
		.link2{
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}

		.link2:hover {
			 box-shadow:7px 7px 40px 17px red;
		}
		@media only screen and (max-width: 700px) {
			.messege{
				width:98%;
			}
			.col1, .col3{
				width:5%;
			}
			.col2{
				width:90%;
			}
		}
		.row:after{
			content:'';
			display:table;
			clear:both;
		}
		.wrp{
			float:right;
			padding:7px;
			
		}
		.wrap{
			width:100%;
		}
		.wrap1, .wrap3{
			width:20%;
		}
		.wrap2{
			width:60%;
		}
		table {
		    border-collapse: collapse;
		    border-spacing: 0;
		    border: 1px solid green;
			width:100%;
		}

		th, td {
		    text-align: left;
		    padding: 10px;
			border: 2px solid #529432;
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
		@media only screen and (max-width: 700px) {
			.wrap1, .wrap3{
				width:3%;
			}
			.wrap2{
				width:94%;
			}
		}
		.wrap:after{
			content:'';
			display:table;
			clear:both;
		}
		.alert {
			padding: 10px;
			background-color: #f44336;
			color: white;
			width:300px;
		}
		
		.alert.success {
			background-color: #04AA6D;
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
        .stt{
			margin-left:40%;
		}
		.closebtn:hover {
			 color: black;
		}
		@media only screen and (max-width: 700px) {
			.stt{
				margin-left:13%;
			}
		}
		
		/* footer starts from here  */
		
		.footer{
			background-color: #a8b072;
			color: white;
			padding: 10px;
			text-align: right;
			font-size: 15px;
			height:50px;
			margin-top:10px;
		}
		.footer::after{
			display: table;
			content: '';
			clear: both;
		}
		.cntr{
                text-align: center;
                width: 100%;
        }
	
	</style>
	
</head>

<body>
	<div class="first">
    </div>
	
	<!-- navbar start here -->
	<div class="navbar">
	    <div class="left">
			<a href="index.php" ><img width="70px" height="70px" src="img/logo.jpg"></a>
		</div>
		<div class="mid">
			<a href="index.php" style="text-decoration:none;">
				<i class="fa fa-home"></i>&nbsp <span style="color:#f78f8f;">Home</span>
			</a>
		 </div>
		 <div class="right">
			<a href="logout.php" style="text-decoration:none;">
				<i class="fa fa-power-off"></i>&nbsp <span style="color:#f78f8f;">Logout</span>
			</a>
		 </div>

	</div>
				
	 <!-- Rules Form  -->
	<div class="row">
		<div class="column col1" style="background-color:#038a27;"></div>
		 <div class="column col2" >	
		 
			<h2 style="color:#1c04d4;padding-left:20px;">Set New Rule</h2>
			
			<form class="formmain" method="post" enctype="multipart/form-data">	 
				<div class="form-group">
					<label for="msg"> Add new Rule<span style="color:red;">*</span></label>	<br>						  
					<textarea id="msg" class="messege" name="description" placeholder="Write Here..." required></textarea>				  			
				</div> 
				<!--<button type="submit" name="save" class="btn ">Save</button>-->
				
				<button type="submit" name="save" class="btn">Save</button>

			</form>	

		 </div>
		 <div class="column col3" style="background-color:#038a27;"></div>
		 
	</div>
	<div class="clr" style="background-color:#dbd9d9;height:9px;"></div>
	
	<h2 class="stt"><?php echo $status; ?></h2>
	<h2 class="stt">
		<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg']; 
				unset($_SESSION['msg']);
			}
		?> 
	</h2>
	<!-- Rules Table -->
	
	<h2 style="color:#bfa708;text-align:center;">মেসের নিয়মাবলী <br> ( আকাশ ছাত্রাবাস )  </h2>

	<div class="wrap" id="start">
		<div class="wrp wrap1" style="background-color:#faf7eb;height:370px;" ></div>

		<div class ="wrp wrap2" style="height:370px;overflow-x:auto;overflow-y:auto;">

			<table class="center" >
				<thead >
					<tr >
						<th>#</th>
						<th>বর্ণবিন্যাস </th>
						<th>কার্যকরী তারিখ</th>
						<th>Remove</th>
					</tr>
				</thead>
				
				<tbody>
				  <?php
						$query = "SELECT * FROM rules";
						$rs = $conn->query($query);
						$num = $rs->num_rows;
						$sn=0;
						if($num > 0){ 
							while ($rows = $rs->fetch_assoc()) {
								$sn = $sn + 1;
								echo"
									<tr>
									<td>".$sn."</td>
									<td>".$rows['description']."</td>
									<td>".$rows['effective_date']."</td>
									<td><a href='?action=delete&Id=".$rows['sl_no']."'><i class='fa fa-times cntr link2' style=\"color:red;font-size:20px;\"></i></a></td>
									
									</tr>";
							}
							
						}
						else{
							$qry=mysqli_query($conn,"ALTER TABLE rules AUTO_INCREMENT = 1");
							 echo "<div class='alert'>
								<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
								<strong>No Record Found!</strong>
								</div>";
						}
					  
					  ?>	
				</tbody>
			</table>
		</div>
		<div class="wrp wrap3" style="background-color:#faf7eb;height:370px;"></div>
	</div>
	<div class="footer">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>

</body>

</html>