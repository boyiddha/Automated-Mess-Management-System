<?php 
	// Turn off error reporting
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession(); 
	
	//--------------------- SAVE START ----------------------------------
	if(isset($_POST['save'])){
		$name=$_POST['name'];
		$Email=$_POST['email'];
		$password=$_POST['password'];
		//$dateCreated = date("Y-m-d");
	   
		$query=mysqli_query($conn,"select * from admin where email ='$Email'");
		$ret=mysqli_fetch_array($query);

		if($ret > 0){ 
			$ret=0;
			$msg= "<div class='alert'>
		    <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
		    <strong>This Eamil Already Exist!</strong>
		    </div>";
		}
		else{
			$query=mysqli_query($conn,"insert into admin(user_name,email,password) 
			value('$name','$Email','$password')");

			if ($query) {				
					$msg= "<div class='alert success'>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>Created Successfully!</strong>
					</div>";					
			}
			else{
				$msg= "<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>An Error Occurred! Please try again!</strong>
				</div>";
			}
		}
	}
	// ----------------------------- SAVE END -------------------------------
	
	
	
	
	
	//--------------------EDIT START------------------------------------------

	 if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit"){
		$Id= $_GET['Id'];

		$query=mysqli_query($conn,"select * from admin where email ='$Id'");
		$row=mysqli_fetch_array($query);

		//------------UPDATE------------------------------------------------------

		if(isset($_POST['update'])){
		
			$name=$_POST['name'];
			$Email=$_POST['email'];
			$password=$_POST['password'];

			$query=mysqli_query($conn,"update admin set user_name='$name', email='$Email',password='$password' where email='$Id'");
			if ($query) {	
				echo "<script type = \"text/javascript\">
				window.location = (\"addAdmin.php\")
				</script>"; 
			}
			else{
				$msg= "<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>An Error Occurred! Please try again!</strong>
				</div>";
			}
		}
    } // ---------------------------- EDIT END  --------------------------------------------
	
	
	
	//--------------------------------DELETE START-----------------------------------------

  if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete"){
        $Id= $_GET['Id'];

        $query = mysqli_query($conn,"DELETE FROM admin WHERE email='$Id'");

        if ($query == TRUE) {
            echo "<script type = \"text/javascript\">
            window.location = (\"addAdmin.php\")
            </script>";
        }
        else{
           	$msg= "<div class='alert'>
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
	<meta charset="UTF-8">
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
                opacity: 1;
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
		}
		.formmain{
			padding-left:15px;
		}
		.form-group{
			margin:7px;
		}
		.form-control{
			width:280px;
			height:38px;
			font-size:15px;
			border-color:#4cf55f;
			border-radius:10px;
			border-width:6px;
		}
		.btn{
			font-size:14px;
			color:white;
			margin-left:70px;
			margin-top:10px;
			width:70px;
			height:35px;
			border-width:3px;
			background-color:green;
			border-color:green;
			border-radius:12px;
		}
		.btnupdate{
			font-size:14px;
			color:white;
			margin-left:70px;
			margin-top:10px;
			width:70px;
			height:35px;
			border-width:3px;
			background-color:#f77d6a;
			border-color:green;
			border-radius:12px;
			
		}
		@media only screen and (max-width: 700px) {
			.col1, .col3{
				width:10%;
			}
			.col2{
				width:80%;
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
			background:#736f70;
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
				width:10%;
			}
			.wrap2{
				width:80%;
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
        
		.closebtn:hover {
			 color: black;
		}
		
		/* footer starts from here  */
		
		.footer{
			background-color: #a8b072;
			color: white;
			padding: 10px;
			text-align: right;
			font-size: 15px;
			height:55px;
		}
		.footer::after{
			display: table;
			content: '';
			clear: both;
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
			<a href="addAdmin.php" style="text-decoration:none;">
				<i class="fa fa-user"></i>&nbsp <span style="color:#f78f8f;">Add new Admin</span>
			</a>
		 </div>
		 <div class="right">
			<a href="logout.php" style="text-decoration:none;">
				<i class="fa fa-power-off"></i>&nbsp <span style="color:#f78f8f;">Logout</span>
			</a>
		 </div>

	</div>
				
	 <!-- Admin Form  -->
	<div class="row">
		<div class="column col1" style="background-color:#807a79;"></div>
		 <div class="column col2" style="background-color:#dbd9d9;">
				
			<h2 style="color:#0923e6;padding-left:20px;">Assign Admin</h2>
			<?php echo $msg; ?>
			
			<form class="formmain" method="post" enctype="multipart/form-data">	 
				<div class="form-group">
					<label for="name"> Full Name<span style="color:red;">*</span></label>	<br>						  
					<input class="form-control"  id="name" name="name" value="<?php echo $row['user_name'];?>" placeholder="  Write Admin Name..." required>				  			
				 </div>
				 
				<div class="form-group">
					<label for="email">Email<span style="color:red;">*</span></label>	<br>						  
					<input class="form-control" id="email" name="email" value="<?php echo $row['email'];?>" placeholder="  Write Email..." required>
				</div>
				
				<div class="form-group">
					<label for="pwd">Given Password<span style="color:red;">*</span></label>	<br>
					<input class="form-control" id="pwd" name="password" value="<?php echo $row['password'];?>" placeholder="  Write New Admin's Password..." required>
				</div>
				
				<!--<button type="submit" name="save" class="btn ">Save</button>-->
				
				    <?php
						if (isset($Id)){
						?>
						<button type="submit" name="update" class="btnupdate">Update</button>
						<?php
                    }
					else {           
						?>
						<button type="submit" name="save" class="btn">Save</button>
						<?php
                    }         
                    ?>

			</form>	

		 </div>
		 <div class="column col3" style="background-color:#807a79;"></div>
		 
	</div>
	<div class="clr" style="background-color:#dbd9d9;height:9px;"></div>
	
	
	<!-- Admin Tables -->
	<p style="background-color:#b4eddd;height:40px;color:#02735a;text-align:center;font-size:20px;font-weight:bold;padding-top:5px;">Admin List</p>
	<div class="wrap">
		<div class="wrp wrap1" style="background-color:#f7f4d2;height:300px;" ></div>
		<div class ="wrp wrap2" style="height:300px;overflow-x:auto;overflow-y:auto;">
			<table class="center">
				<thead >
					<tr >
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Password</th>
						 <th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				
				<tbody>
				  <?php
						$query = "SELECT admin.user_name,admin.email,admin.password FROM admin";
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
									<td>".$rows['user_name']."</td>
									<td>".$rows['email']."</td>
									<td>".$rows['password']."</td>
									<td><a href='?action=edit&Id=".$rows['email']."'><i class='fa fa-edit'></i></a></td>
									<td><a href='?action=delete&Id=".$rows['email']."'><i class='fa fa-trash'></i></a></td>
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
		<div class="wrp wrap3" style="background-color:#f7f4d2;height:300px;"></div>
	</div>
	<div class="footer">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>

</body>

</html>