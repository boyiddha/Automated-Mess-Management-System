<?php 
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
	$totalmeal=0;
?>

<?php 
   $date=date('d-m-y');
   
?>
 
 
<?php
   if(isset($_GET["delete"])){

		$query1="DELETE FROM deposit";
		$result1=$conn->query($query1);
							
					// Check query Erorr
					//if (!mysqli_query($conn, $query1)) {
					//	echo "Error: Error. Error. Error e............... Error ...... Error /////////////// Error ... Error: " . mysqli_error($conn);
					//}
		
		$query2="DELETE FROM extracost";
		$result2=$conn->query($query2);
		
		$query3="DELETE FROM bazarcost";
		$result3=$conn->query($query3);
		
		$query4="DELETE FROM mealcount";
		$result4=$conn->query($query4);
		
		$query5="DELETE FROM bazardate";
		$result5=$conn->query($query5);
		
	    if($result4){
			
			$msg3=
			"<div class='alert '>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>Successfully all Record Deleted!</strong>
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


<?php 
                 
	if(isset($_POST['submit'])){

	    $attend=$_POST['attend'];
		$date1= date('Y-m-d',strtotime($_POST['date1']));
		
	   
		$query="SELECT*from mealcount WHERE date='$date1' ";
		$result=$conn->query($query);
		
		//$num=$result->num_rows;
		$rows=$result->fetch_assoc();
	  
	   if($date1==$rows['date']  ){ 
	    //if($num>0) {
			$msg2="<div class='alert'>
		    <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
		    <strong>Meal Count Already Have Taken!</strong>
		    </div>";
	    }
		 else{
			$totalmeal=0; 
			
		    foreach ($attend as $key1 => $value) {
				if($value=="A"){
				    $query="INSERT INTO mealcount(phone,date,meal) VALUE('$key1','$date1',0)";
				    $res=$conn->query($query);
					
					// Check query Erorr
					//if (!mysqli_query($conn, $query)) {
					//	echo "Error: Error. Error. Error e............... Error ...... Error /////////////// Error ... Error: " . mysqli_error($conn);
					//}
				  
				}

				elseif($value=="B"){
				    $query="INSERT INTO mealcount(phone,date,meal) VALUE('$key1','$date1',0.5)";
				    $res=$conn->query($query);
					$totalmeal=$totalmeal+0.5;
				  
				}
				elseif($value=="C"){
				    $query="INSERT INTO mealcount(phone,date,meal) VALUE('$key1','$date1',1)";
				    $res=$conn->query($query);
					$totalmeal=$totalmeal+1;
				  
				}
				elseif($value=="D"){
				    $query="INSERT INTO mealcount(phone,date,meal) VALUE('$key1','$date1',1.5)";
				    $res=$conn->query($query);
				  $totalmeal=$totalmeal+1.5;
				}
				elseif($value=="E"){
					$query="INSERT INTO mealcount(phone,date,meal) VALUE('$key1','$date1',2)";
				    $res=$conn->query($query);
				    $totalmeal=$totalmeal+2;
				}
				elseif($value=="F"){
				    $query="INSERT INTO mealcount(phone,date,meal) VALUE('$key1','$date1',2.5)";
				    $res=$conn->query($query);
				    $totalmeal=$totalmeal+2.5;
				}
				elseif($value=="G"){
				    $query="INSERT INTO mealcount(phone,date,meal) VALUE('$key1','$date1',3)";
				    $res=$conn->query($query);
					$totalmeal=$totalmeal+3;
				  
				}
				elseif($value=="H"){
				    $query="INSERT INTO mealcount(phone,date,meal) VALUE('$key1','$date1',3.5)";
				    $res=$conn->query($query);
					$totalmeal=$totalmeal+3.5;
				  
				}
				elseif($value=="I"){
					 $query="INSERT INTO mealcount(phone,date,meal) VALUE(key1','$date1',4)";
				    $res=$conn->query($query);
					$totalmeal=$totalmeal+4;
				  
				}
				elseif($value=="J"){
				    $query="INSERT INTO mealcount(phone,date,meal) VALUE('$key1','$date1',4.5)";
				    $res=$conn->query($query);
					$totalmeal=$totalmeal+4.5;
				  
				}
				elseif($value=="K"){
					$query="INSERT INTO mealcount(phone,date,meal) VALUE('$key1','$date1',5)";
				    $res=$conn->query($query);
					$totalmeal=$totalmeal+5;
				  
				}  
			}

			if($res){
				$cost=$totalmeal*25;
				$msg2="<div class='success'>
					<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<strong>
						Meal Count Successfully!<br>
					</strong>
					<strong style='color:red'>
						Today's Total Meal:&nbsp $totalmeal <br>
						Today's Total Cost:&nbsp $cost  &#x09F3
					</strong>
					</div>";						   
			}
			else{
				$msg2="<div class='alert'>
				<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
				<strong>Please Try Again!</strong>
				</div>";					
			}
	   
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
		
		<!-- for dateicker -->
		  
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	    <link rel="stylesheet" href="/resources/demos/style.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<script>
			// Date picking
		    $( function() {
		    	$( "#datepicker" ).datepicker({dateFormat : 'dd-mm-yy'});
		    } );
		</script>
		
		
		<script type="text/javascript">
			// checking Empty Checkbox
			
		   $(document).ready(function(){
			$("form").submit(function(){
			var roll=true;
			$(":checkbox").each(function(){
				name=$(this).attr('name');
				if(roll && !$(':checkbox[name="' +name + '"]:checked').length){
				alert(name+"  Number Missing\n Empty Meal.. Checkbox must be checked");
				roll=false;
				}
			});
			return roll;
		   });
		   }) ;

		</script>
		
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
			
			.container{
				position:relative;
				margin-left:22%;
				background-color:#f7f7eb;
			}
			h2{
				font-size: 7em;
				font-family: serif;
				color: #008000;
				text-align: center;
				animation: animate 
					1.5s linear infinite;
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
			p{
				font-size: 1.5em;
				font-family: serif;
				color: green;
				text-align: left;
				animation: animate 
					1.5s linear infinite;
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
			.alert1{
				width:100%;
				height:314px;
			}
			.collapsible {
			  background-color:red;
			  //margin-left:84%;
			  color: white;
			  cursor: pointer;
			  padding: 3px;
			  width: 12%;
			  border: none;
			  text-align: center;
			  outline: none;
			  font-size: 22px;
			  -webkit-transition-duration: 0.4s; /* Safari */
			  transition-duration: 0.4s;
			  
			}

			.active, .collapsible:hover {
			  background-color: #555;
			  box-shadow:10px 7px 70px 20px red;

			}
			.meal{
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}
			.meal:hover{
				box-shadow:2px 4px 20px 10px green;
			}


			.collapsible:after {
			  content: '\002B';
			  color: white;
			  font-weight: bold;
			  float: right;
			  margin-left: 5px;
			}

			.active:after {
			  content: "\2212";
			}

			.content {
			  padding: 0 18px;
			  max-height: 0;
			  overflow: hidden;
			  transition: max-height 0.2s ease-out;
			  background-color: #f1f1f1;
			}
			.btn1{
				background-color:red;
				height:35px;
				width:80px;
				text-align:center;
				font-weight:600;
				-webkit-transition-duration: 0.4s; /* Safari */
			   transition-duration: 0.4s;
			}
			.btn{
				display: block;
				color: white;
				padding:3px;
				text-decoration: none;
			}
			.btn1:hover{
				background-color:#d2d3d4;
				box-shadow:10px 7px 70px 14px red;
			}
			table {
				border-collapse: collapse;
				border-spacing: 0;
				border: 1px solid green;
				width:auto;
			}

			td {
				text-align: left;
				padding: 10px;
				border: 2px solid #cfc99b;
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
			.container{
				margin-left:24%;
			}
			.container2{
				height:200px;
			}
			.dt{
				margin-top:10%;
				width:100%;
				height:33px;
				font-weight:600;
			}
			.dt2{
				width:210px;
			}
			.btn2{
				color:white;
				margin-left:26%;
				height:35px;
				width:100px;
				background-color:#0ac94a;
				border:none;
				text-align:center;
				display:inline-block;
				cursor:pointer;
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}

			.btn2:hover {
			    box-shadow:10px 7px 70px 20px #0ac94a;
			}
			.btn3{
				margin-left:27%;
				height:35px;
				width:100px;
				background-color:#0ac94a;
				border:none;
				text-align:center;
				text-decoration:none;
				display:inline-block;
				cursor:pointer;
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			}
			.stat{
				margin-top:5%;
				margin-left:2%;
				margin-right:2%;
			}

			.btn3:hover {
			    box-shadow:10px 7px 70px 20px #0ac94a;
			}
			@media screen and (max-width: 700px) {
				
				.logout{
					margin:0px;
					 width:125px;
				 }
				.home{
					 width:120px;
				 }
				.photo1{
					margin:0;

				}
				.img1{
					height:100px;
				}
				.text1{
					top:65%;
					left:10%;
					font-size:22px;
				}
				.container{
					margin:0px;
				}
				.alert1{
					height:270px;
				}
				.collapsible{
					width:25%;
					height:50px;
				}
				.dt{
					margin-top:8%;
				}
				.btn2{
					margin-left:15%;
				}
				.btn3{
					margin-left:18%;
					
				}
				.stat{
					margin-top:50px;
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
				height:100px;
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
		
		<?php
			$query=mysqli_query($conn,"select * from member");
			$result=mysqli_fetch_array($query);
			if($result<=0){
		?>
				<div class="date">
					<h4><span><iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FDhaka" width="100%" height="115" frameborder="0" seamless></iframe></span></h4>
				</div>
				
				<div class="alert1">
					<h2 style="font-size:30px;text-align: center;color: red;">No member Found!! </h2>
					<p style="font-size:25px;text-align: center;color: red;">Please,At First Add Some Member To Continue This Whole Process.!!!!</p>
				</div>
				
				<div class="footer">
					Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
				</div>

		<?php }

		else{ ?>
				<p>Daily Meal Counting....!</p>
				<div class="date">
					<h4><span><iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FDhaka" width="100%" height="115" frameborder="0" seamless></iframe></span></h4>
					<?php 
						if(isset($msg2)){
							echo $msg2;   // msg = Meal Count Successfully or, Today's Meal Count already have take  ( when work save/update button)
						}
						
						if(isset($msg3)){
							echo $msg3;  // msg3= Successfully all record Deleted (when work delete button -> allDelete.php work)
						}     						

					?>
					
				</div>
			
				<button class="collapsible">Notice</button>
				<div class="content">
				    <h3> Before New Month Transaction Start You Must Close Previous Month!! Oherswise It Will Be Produced Error Result ..</h3>
					<div class="btn1">
						<a href="attendance.php?delete=0011" class="btn" a onclick="return confirm('Are you want to delete All Records?')" >Delete </a>
					</div>
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
								$query = "SELECT * FROM member";
								$result = $conn->query($query);
								$num = $result->num_rows;
								
								if($num>0){
									
									$i=1;
									while($rows=$result->fetch_assoc()){

							?>
										<tr>
											<td><?php echo$i++;?></td>
											<td><?php echo$rows['name']; ?></td> &nbsp
											<td><?php echo$rows['phone'];?></td> &nbsp
											<td><?php echo$rows['room_no']; ?></td> &nbsp
											 
											<td>
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="A"> 0 &nbsp 
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="B">0.5 &nbsp 
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="C"> 1 &nbsp 
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="D">1.5 &nbsp 
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="E"> 2 &nbsp 
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="F"> 2.5 &nbsp 
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="G">3 &nbsp 
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="H"> 3.5 &nbsp 
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="I"> 4 &nbsp 
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="J">4.5  &nbsp 
												<input class="meal" type="checkbox" name="attend[<?php echo$rows['phone'];?>]" value="K"> 5 
											</td>
									  </tr>
									  
									  
								<?php }} ?>
							 
							</tbody>
					</table>
					
				
					<div class="dt">
						<label for="pwd">Date <span style="color:red;">*</span></label>
						
						<input class="dt2" id="datepicker" name="date1" placeholder="  <?php echo"Today Date Is:". date('d/m/y');?> " required="">
						<input type="submit" name="submit" value="Save " class="btn2" >
					</div>
				
				</form>
		

				<div class="stat">
					<h4 class="bb" style="background:#f3f5c9;color:green;padding-left:25px;height:170px;">
						Meal Count Started:&nbsp <?php
						//error_reporting(0);
						$query = "SELECT DISTINCT date from mealcount";
						$result = $conn->query($query);
						$num = $result->num_rows;
				
						 $row1=$result->fetch_assoc();
						 if($num>0){
							$dat=date('d/m/Y',strtotime($row1['date']));
							echo $dat;
						}
						 else{
							echo "00/00/0000";
						 }
						?>
						<br><br>
						Today's Total Meal :&nbsp <?php echo $totalmeal;?><br>
						<?php
						$cost = floor($totalmeal*25);
						?>
						Today's Total Cost : &nbsp <?php echo $cost; ?> &#x09F3
						<a class="btn3" href="view.php" style="color:white;text-align: center;">Update</a>
					</h4>
				</div>

			


				<div class="footer">
					Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
				</div>
	   <?php } ?>
				


		
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
	
	<script>
		// Collapsible Button
		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
		  coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.maxHeight){
			  content.style.maxHeight = null;
			} else {
			  content.style.maxHeight = content.scrollHeight + "px";
			} 
		  });
		}
</script>



</body>
</html>
