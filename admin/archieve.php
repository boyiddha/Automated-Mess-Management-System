<?php 
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
?>

 <?php
   if(isset($_GET["delete"]))
   {
		$filename=$_GET["delete"];
	   
		$query="DELETE FROM record WHERE filename='$filename' ";
		$result=$conn->query($query);
		if($result){
			if (unlink('record/'.$filename)) {
			  // file was successfully deleted
				$msg3="<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>Record Successfully Deleted!</strong>
				</div>";
			} else {
			  // there was a problem deleting the file
				$msg3="<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>Please Try Again!</strong>
				</div>";
			}

		}
	   else{
				$msg3="<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>Please Try Again!</strong>
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
		.row{
			background-color:#e9f7e9;
			height:490px;
		}
		.row1{
			float:left;
			width:50%;
			padding-top:50px;
			
		}
		.row11{
			margin-left:40%;
		}
		.row2{
			float:left;
			width:50%;
			text-align:left;
			padding-top:18px;
			padding-bottom:17px;
			
		}
		.row22{
			margin-left:5%;
			height:400px;
			overflow-y:auto;
			padding-bottom:15px;
		}
		.form-control{
			width:200px;
			height:40px;
			color:red;
			font-size:19px;
			font-weight:450;
		}
		.btn2{
				height:35px;
				width:100px;
				border:none;
				text-align:center;
				display:inline-block;
				cursor:pointer;
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
		}

		.btn2:hover {
		    box-shadow: 4px 5px 20px 10px #fa2f2f;
		}
		.btn1{
			text-decoration:none;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.btn1:hover{
			box-shadow: 4px 5px 20px 10px #8b56f5;
		}
		.btn{
			color:red;
			text-decoration:none;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.btn:hover{
			box-shadow: 4px 5px 20px 10px red;
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
			.row1{
				width:100%;
			}
			.row11{
				margin-left:15%;
			}
			.row2{
				width:100%;
			}
			.row22{
				margin:0;
			}
		}
		
		.navbar::after{
			content: '';
			display: table;
			clear: both;
		}
		.container{
			content: '';
			display:table;
			clear:both;
		}
		
		.row:after{
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
			
		.alert {
			margin-left:30%;
			margin: 10px;
			background-color: red;
			color: white;
			padding-top:5px;
			width:72%;
			height:37px;
			text-align:center;
		}
		.success{
			background-color:green;
			margin-left:10%;
			margin: 10px;
			color: white;
			padding-top:5px;
			width:75%;
			height:37px;
			text-align:center;
		}
		.closebtn {
			margin-left: 30px;
			color: white;
			font-weight: bold;
			float: left;
			font-size: 37px;
			line-height: 21px;
			cursor: pointer;
			transition: 0.3s;
		}

		.closebtn:hover {
			 color: black;
		}
		
		/* footer starts from here  */
		
		.footer{
			background-color: red;
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
				
	 <!-- Member Form  -->
	<div class="row">
		<div class="height:10px;width:100%;" style="background-color:#36302f;">.</div>
		
		<div class="row1">
			<div class="row11">
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<legend>Manager Name:</legend>
				<div style="">
					<input type="text" required class="form-control"placeholder="Enter Manager name" name="name">
				</div><br>
				
				<legend>Select File to Upload:</legend>
				<div class="btn2">
					<input  required type="file" name="file1" />
				</div><br>
				
				<div class="btn2">
					<input  type="submit" name="submit" value="Upload" class="btn"/>
				</div>
				
				<?php if(isset($_GET['st'])) { ?>
					
					<?php if ($_GET['st'] == 'success') { ?>
						
						<div style="font-size:20px;font-weight:22px;color:green;width:240px;">
							<?php echo "File Uploaded Successfully!";?>
						</div>
						<?php
						}
						else
						{ ?>
							<div style="font-size:20px;font-weight:22px;color:red;width:240px;">
								<?php echo 'Invalid File Extension!'; ?>
							</div>
					<?php
						} ?>
				<?php } ?>
				
			</form>
			</div>
		</div>

		<div class="row2">

			<div class="row22">
			<h3 style="margin-left:30%;color:#fa7575;" > Records</h3>
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
						<td ><a class="btn1"  href="record/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
						<td><a class="btn1" href="record/<?php echo $row['filename']; ?>" download>Download </a></td>
						<td><a href="?delete=<?php echo$row['filename']?>  " class="btn" a onclick="return confirm('Are you want to delete this Records?')" >Delete </a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>

		</div>

		 
	</div>
	
	<div style="text-align:right;font-size: 15px;height:30px;">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>
	
</body>

</html>