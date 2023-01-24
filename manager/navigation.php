<nav class="w3-sidebar w3-aqua w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
		
	<img src="img/ict.jpg" alt="Snow" style="width:100%;padding-top: 15px;padding-bottom: 15px">
	
	<div class="w3-container w3-dark-grey">
		<h4>Mess Management System</h4> 
	</div>
	
	<div class="clr ">
		<div class="home">
			<a class="w3-hover-white" href="index.php"> <i class="fa fa-home"></i>&nbsp  Home</a>  
		</div>
		
		<div class="logout w3-hover-white">
			<a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp  LogOut</a>
		</div>
	</div> 
	
	 <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft w3-hover-red" style="width:100%;font-size:22px">Close &times;</a>
	 
	 <div class="w3-container">
	 
	 </div>
	 
	 <div class="w3-bar-block">
		  
		<dl>
			<dt><a style="text-decoration:none;" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-grey w3-red" href="attendance.php"> <i class="fa fa-sun-o"></i>&nbsp Daily Attendance</a> </dt>
			<dt><a style="text-decoration:none;" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-grey" href="reserve.php"> <i class="fa fa-dollar"></i>&nbsp Reserve <i class="fa fa-calculator"></i></a> </dt>
			<dt><a style="text-decoration:none;" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-grey" href="notice.php"><i class="fa fa-bullhorn"></i>&nbsp Notice</a></dt>
			<dt><a style="text-decoration:none;" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-grey notification" href="chat.php">
					<i class="fa fa-commenting" aria-hidden="true"></i>&nbsp Chat
					
					<?php
						$q="select * from chat";
						$res=$conn->query($q);
						$num=$res->num_rows;
						if($num>0){
							
					?>
						<span class="badge"> <?php echo $num;  ?> </span>
					<?php 
						}
					?>
					

			
				</a>

			</dt>
			<dt><a style="text-decoration:none;" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-grey" href="member.php"><i class="fa fa-user-plus"></i>&nbsp  Update Membership</a> </dt>
			<dt><a style="text-decoration:none;" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-grey" href="manager_list.php"> <i class="fa fa-users"></i>&nbsp Manager list</a> </dt>
			<!--  <dt><a onclick="w3_close()" class="w3-bar-item w3-button w3-hover-grey" href="archive.php"><i class="fa fa-archive"></i>&nbsp  Archive</a> </dt> -->
			<dt><a style="text-decoration:none;" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-grey" href="rules.php"><i class="fa fa-check-circle"></i>&nbsp Rules</a> </dt>
			  
			  
			  
		</dl>
		  	
	</div>
</nav>