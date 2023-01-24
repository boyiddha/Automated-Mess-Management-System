<?php 
	//error_reporting(0);
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
		
		
		<!-- To make PDF  start here -->
		
		<!--
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
		<script>
		$(document).ready(function () {  
			var form = $('.tbl'),  
			cache_width = form.width(),  
			a4 = [595.28, 841.89]; // for a4 size paper width and height  

			$('#create_pdf').on('click', function () {  
				$('body').scrollTop(0);  
				createPDF();  
			});  

			function createPDF() {  
				getCanvas().then(function (canvas) {  
					var  
					 img = canvas.toDataURL("image/png"),  
					 doc = new jsPDF({  
						 unit: 'px',  
						 format: 'a4'  
					 });  
					doc.addImage(img, 'JPEG', 20, 20);  
					doc.save('AllRecords.pdf');  
					form.width(cache_width);  
				});  
			}  

			function getCanvas() {  
				form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');  
				return html2canvas(form, {  
					imageTimeout: 2000,  
					removeContainer: true  
				});  
			}
		});
		
		</script>
		-->
		
		<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
		
		<script>
			$(document).ready(function(){
				$("#btn-generate").click(function(){
					var htmlWidth = $("#pdf-content").width();
					var htmlHeight = $("#pdf-content").height();
					var pdfWidth = htmlWidth + (15 * 2);
					var pdfHeight = (pdfWidth * 1.5) + (15 * 2);
					
					var doc = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
				
					var pageCount = Math.ceil(htmlHeight / pdfHeight) - 1;
				
				
					html2canvas($("#pdf-content")[0], { allowTaint: true }).then(function(canvas) {
						canvas.getContext('2d');
				
						var image = canvas.toDataURL("image/png", 1.0);
						doc.addImage(image, 'PNG', 15, 15, htmlWidth, htmlHeight);
				
				
						for (var i = 1; i <= pageCount; i++) {
							doc.addPage(pdfWidth, pdfHeight);
							doc.addImage(image, 'PNG', 15, -(pdfHeight * i)+15, htmlWidth, htmlHeight);
						}
						
						//naming the file
						const currentYear = new Date().getFullYear();

						const currentMonth = new Date().getMonth();

						
						const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
						const d = new Date();
						let name = month[currentMonth];
						
						let filename = name.concat("-" , currentYear);
						
						
					doc.save(filename);
					});
				});
			});
	</script>
		
		
		
		<!-- To make PDF end -->
		
	
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
			margin-left:20%;
			padding-left:20%;
			padding-top:5%;
			height:130px;
			background-color:#faf3e6;
			
		}
		.child h3{
			width:60%;
		}
	
		.container1{
			background:#f2f5f3;
			margin-left:22%;
		}
		.container2{
			background:#f2f5f3;
			margin-left:22%;
		}
		.ttl{
			background-color:#9999ff;
			margin-left:22%;
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
		.calculation{
			background-color:#f2f5f2;
			
		}
		.one{
			background-color:
			margin-left:22%;
			height:407px;
		}
		table {
			border-collapse: collapse;
			border-spacing: 0;
			width:auto;
			margin-left:10%;
			margin-bottom:20px;
			width:80%;
		}


		td {
			text-align:left;
			padding: 3px;
			border: 1px ;
		}
		th{
			height:35px;
			position:sticky;
			top: 0px;
			padding:3px;
			background:#f5f1b1;
		}
		
		tr:nth-child(even){
			background-color: #f2f2f2
		} 
		
		tr:hover {
			background-color: #c3c7c3;
		}
		.row{
			margin-left:22%;
			background: #d2f5f7;
			margin-top: 17px;
			margin-bottom: 15px;
			
			
			overflow-x:scroll;
		}
		.row1{
			margin-left:22%;
			background: #e3e2e1;
			margin-top: 17px;
			margin-bottom: 15px;
			box-shadow: 60px 70px 50px 80px #05f028;

			overflow-x:scroll;
		}
		.row2{
			margin-left:22%;
			background: #e3e2e1;
			margin-top: 17px;
			margin-bottom: 15px;
			
			font-family: 'Comic Sans MS', cursive, sans-serif;
		}
		.row3{
			margin-left:15%;
			background: #d2f5f7;
			margin-top: 50px;
			margin-bottom: 15px;
			
			font-family: 'Comic Sans MS', cursive, sans-serif;
		
			overflow-x:scroll;
		}
		.tbl{
			table-layout:auto;
			width:88%;
		}
		.pdf{
			margin-left:35%;
			margin-bottom:35px;
			padding:15px;
			color:white;
			height:50px;
			width:155px;
			background-color:#1a53ff;
			border:none;
			text-align:center;
			
			border-radius:15px;
			cursor:pointer;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
			animation: animate 1.5s linear infinite;
		}

		.pdf:hover {
			box-shadow: 15px 10px 50px 30px #1a53ff;
		}

		@keyframes animate {
			0% {
				opacity: 0;
			}
  
			50% {
				opacity: 0.7;
			}
  
			100% {
				opacity: 0;
			}
		}
		@media screen and (max-width: 700px) {
			.pdf{
				margin:0;
				padding;0;
				display:none;
			}
			.row{
				margin:0;
				padding:0;
			}
			.row1{
				margin:0;
				padding:0;
			}
			.row2{
				margin:0;
				padding:0;
			}
			.row3{
				margin:0;
				margin-top:25px;
				padding:0;
			}
			.container1{
				margin-left:0;
				padding:0;
			}
			.container2{
				margin-left:0;
				padding:0;
			}
			.ttl{
				margin:0;
				padding:0;
			}
			.one{
				margin-left:2%;
				height:332px;
			}
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
			
			td{
				padding:0px;
				padding-top:5px;
				padding-bottom:3px;
			}
			tr{
				width:400px;
			}
			table{
				margin:0;
				padding:0;
				table-layout: auto;
				width: 100%;
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

	<div class="containe1">
		<div class="child">
			<h3 style="text-align: center;color:#99955f;height:60px;padding-top:20px;background:white;" >Welcome To Mess Management System</h3>
		</div>
		<div>
		<?php 
			if(isset($_SESSION["msg"])){
				echo $_SESSION["msg"];  
				unset($_SESSION["msg"]);
				//echo"............................................................................................................................";
			}
		
		?>
		</div>
		
		<?php 
			//error_reporting(0);
						
			$query="SELECT*FROM bazarcost ";
			$result=$conn->query($query);
		   
			$transaction=0;
			while($rows=$result->fetch_assoc()){
			   if($rows['amount'] > 0){
				   $transaction = 1;
				   break;
			   }
			}
		    if($transaction<=0){
		?>
				<div class="one">
				  
				    <h3 style="font-size: 1.75rem;padding: 93px 20px;text-align: center;color: red;">No Transaction Held Yet.Thanks</h3>
				</div>
    <?php 	}
			else
			{
		?>
	</div>		
	<div class="container2;" id="pdf-content" >
				<div class="ttl">
					<h3 style="color:red;font-size:19px;text-align: center; font-family: 'Comic Sans MS', cursive, sans-serif;">Congratulations To Finish Your Managerial Duty!</h3>
					<h4 style="font-size:13x;text-align:center;font-family: 'Comic Sans MS', cursive, sans-serif;" >Manager Name :&nbsp <?php echo$_SESSION['name'] ;?> <br>
					Phone No &nbsp  : &nbsp <?php echo$_SESSION['phone_no']; ?><br>
					Date &nbsp &nbsp &nbsp : &nbsp <?php echo date('d/m/Y'); ?>
					</h4>
					
				
				</div>
			
				<div class="row" >
					
					<h4 style="text-align: center;padding: 15px;color: #30aea0;font-family: 'Comic Sans MS', cursive, sans-serif;">Bazar Cost</h4>
						
					<table >
						<thead>
							<tr>
								<th>Date</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Amount Cost</th>
							</tr>
						</thead>
						
						<tbody>
						<?php 
					 
							$query="SELECT * FROM bazarcost ";
							$sum1=0;
							$result=$conn->query($query);
							
							if( $result){
								while($rows=$result->fetch_assoc()){
									$sum1=$sum1+$rows['amount'];
									$id=$rows['id'];
						?>
									<tr>
										<td style="text-align:center;"><?php echo$rows['date']; ?></td>
										<?php
										$q="select * from bazardate where id='$id' ";
										$res=$conn->query($q);
										$row=$res->fetch_assoc();
										?>
										<td style="text-align:center;"><?php echo$row['name']; ?></td>
										<td style="text-align:center;"><?php echo$row['phone']; ?></td>
										
										<td style="text-align:center;"><?php echo $rows['amount'];?> &#x09F3 </td>

									</tr>

						  <?php }?>
									<?php 
										$q="SELECT*FROM mealcount ";
								  
										$res=$conn->query($q);
										$num=$res->num_rows;
										$totalmeal=0;
										if( $num>0)
										{
											while($ro=$res->fetch_assoc())
											{
												$totalmeal=$totalmeal+$ro['meal'];
											}
										}
										$mealRate=0;
										if($totalmeal>0){
											$mealRate= $sum1/$totalmeal;  
										}
									
									?>
									<tr><td colspan="5" style="text-align: right;color:red;">Total Bazar Cost:&nbsp <?php echo$sum1; ?> &#x09F3 </td></tr>
									<tr><td colspan="4" style="text-align:right; color:green;font-size:20px;" >Meal Rate &nbsp : &nbsp <?php echo round($mealRate,1) ;?>&nbsp &#x09F3  </td ></tr>
							</tbody>
					</table>
					<?php   }?>
				
				</div>
				
				<div class="row1" >
					
					<h4 style="text-align: center;padding: 15px;color: #30aea0;font-family: 'Comic Sans MS', cursive, sans-serif;">Extra Cost</h4>
						
					<table >
						<thead>
							<tr>
								<th>#</th>
								<th>Date</th>
								<th>Goods</th>
								<th>Amount Cost</th>
							</tr>
						</thead>
						
						<tbody>
						<?php 
					 
							$query="SELECT * FROM extracost ";
							$sum2=0;
							$result=$conn->query($query);
							
							if( $result){
								while($rows=$result->fetch_assoc()){
									$sum2=$sum2+$rows['amount'];
						?>
									<tr>
										<td ><?php echo$rows['id']; ?></td>
										<td style="text-align:center;"><?php echo$rows['date']; ?></td>
										<td><?php echo$rows['description']; ?></td>
										<td style="text-align:center;"><?php echo $rows['amount'];?>&#x09F3 </td>

									</tr>

						  <?php }?>
									<tr><td colspan="5" style="text-align: right;color:red;">Total Extra Cost:&nbsp <?php echo$sum2; ?> &#x09F3 </td></tr>
							</tbody>
					</table>
					<?php   }?>
				
				</div>
				
				<div class="row2" >
					<br>
					<h4 style="text-align: center;margin-left:5%;color: #30aea0;font-family: 'Comic Sans MS', cursive, sans-serif;">Total Extra Cost</h4>
						
				<?php 
			 
					$query="SELECT * FROM fixedcost ";
					$sum3=$sum2;
					$result=$conn->query($query);
					
					if( $result){
						$rows=$result->fetch_assoc();
						$sum3=$sum3+$rows['net'];
						$sum3=$sum3+$rows['khala'];
						$sum3=$sum3+$rows['khori'];
						
						$q="SELECT*from member";
						$res=$conn->query($q);
						$num=$res->num_rows;
						
						$avg= ceil($sum3/$num);
						

				?>	
					<div style="margin-left:45%;">
						Extra Cost:<?php echo$sum2 ?> &#x09F3 <br>
						Net Bill:&nbsp &nbsp &nbsp <?php echo$rows['net']; ?>&#x09F3 <br>
						Khala Bill:&nbsp &nbsp<?php echo$rows['khala']; ?>&#x09F3 <br>
						Khori Bill:&nbsp &nbsp<?php echo$rows['khori']; ?>&#x09F3 <br>
					</div>
					<hr style=" margin-left:20%;margin-right:20%;text-align:left;width 50%;height:3px;color:gray;background-color:gray">
					<div style="margin-left:39%;padding:3px;">
						
		
						All Total:&nbsp <?php echo$sum3; ?> &#x09F3 <br>
						Per person:&nbsp<?php echo$avg; ?> &#x09F3 <br><br><br>
					</div>
			<?php   }?>
				
				</div>
		
				<div class="row3">
					    <h4 style="color:red;text-align:center;font-family: 'Comic Sans MS', cursive, sans-serif;">All Total Calculation </h4>
					    <table class="tbl">
							<tr>
								<th>Name</th>
								<th>Room_No</th>
								<th>Phone</th>

								<th class= colspan='2'>Total Meal</th>
								<th>Meal Cost</th>
								<th> Extra Cost</th>
								<th>Total Cost</th>
								<th>Total Deposit</th>
								<th>Given(-)/Taken(+)</th>
							</tr>
					    <?php  
							$query="SELECT* FROM member ";
							$result=$conn->query($query);
								
							if( $result)
							{
								while($rows=$result->fetch_assoc())
								{	?>
							
									<?php $phone1=$rows['phone']; ?>
									
									<tr>
										<td style="text-align:left;"><?php echo$rows['name'];?></td>
									  
										
										<td style="text-align:center;" ><?php echo$rows['room_no'];?></td>
								 
									
										<td><?php echo$rows['phone'];?></td>
								  
										<td style="text-align:center;">      
										<?php 
											$query2="SELECT*FROM mealcount WHERE  phone='$phone1'  ";
									  
											$result2=$conn->query($query2);
											$num=$result2->num_rows;
											$totalmeal=0;
											if( $num>0)
											{
												while($row2=$result2->fetch_assoc())
												{
													$totalmeal=$totalmeal+$row2['meal'];
												}
											}
											echo $totalmeal;
										?>
										</td>
										
										<td>
											<?php 
												$mealRate=round($mealRate,1);
												$mealcost= ceil($totalmeal*$mealRate) ; 
												echo $totalmeal."*".$mealRate."= ".$mealcost;
											?>
										</td>
										
										<td style="text-align:center;">
											<?php echo $avg ?>
										</td>
										
										<td>
											<?php
												$totalcost = $mealcost + $avg;
												echo $mealcost."+".$avg."=".$totalcost;
											?>
										</td>
										
										
										<td style="text-align:center;">      
										<?php 
											$query3="SELECT amount FROM deposit WHERE  phone='$phone1'  ";
									  
											$result3=$conn->query($query3);
											$num=$result3->num_rows;
											$deposit=0;
											if( $num>0)
											{
												while($row3=$result3->fetch_assoc())
												{
													$deposit=$deposit+$row3['amount'];
												}
											}
											echo $deposit;
										?>
										</td>

										<td style="text-align:center;">
											<?php 
											   $final =$deposit-$totalcost;
											   echo ceil($final);
											 ?>
										</td>
									</tr>
									
								 

					<?php   }   } ?>
							
					    </table>
						
				</div>
				<h3  style="text-align:center;color:green;padding:5px;margin-left:15%;"> &#10084 <?php echo "........Thanks!......."; ?> &#10084 </h3>
						
	</div>
		
		<!-- 		<input class="pdf" type="button" id="create_pdf" value="Generate PDF">  -->
		<button class="pdf" id="btn-generate">Generate PDF</button>

				
	<?php	} ?>
	
		

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
