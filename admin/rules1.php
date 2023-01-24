<?php 
	// Turn off error reporting
	error_reporting(0);
	include '../database/Connection.php';
	session_start();
	
?>

<! DOCTYPE html >
<html lang="en">
<head>
	<title>Mess Solution</title>
	<link rel="icon"  href="img/logo.jpg">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   <!-- for fontawesome -->	
	
   <!-- html2pdf CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js">
    </script>

	
	<style>
		*{
			box-sizing:border-box;
		}
		.first{
		    background-color: #d5f7f6;
			height:10px;
		}
		.navbar{
			background-color:#f0f0ed;
		}
		.left{
			width:82%;
			float:left;
			padding-top:0px;
			
		}
		.mid{
			width:11%;
			float:left;
			text-align:center;
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
		
		.navbar:after{
			content: '';
			display: table;
			clear: both;
		}
		.col1{
			float:left;
			width:30%;
			background-color:#f7edbe;
			height:1756px;
		}
		.col2{
			float:left;
			width:70%;
			background-color:#f7f2d7;
			height:auto;
			border-radius: 15px;
			border-style:ridge;
		}
		p{
			margin-left:10px;
		}
		@media only screen and (max-width: 700px) {
			.col1{
				width:15%;
				height:2398px;
			}
			.col2{
				width:85%;
			}
		}
		.main:after{
			content:'';
			display:table;
			clear:both;
		}
  
		/* footer starts from here  */
		.footer{
			background-color: #a8b072;
			color: white;
			text-align: right;
			font-size: 15px;
			height:43px;
			margin-top:7px;

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
	<div style="height:20px;background-color:#a1a19d;">
	</div>
	<div class="image">
			<img style="width:100%;height:270px;" src="img/mess.jpg" alt="Mess Image">
	</div>
	<div class="main">
		<div class="col1 ">
		</div>
		
		<div class="col2">
			
			<h2 style="color:#bfa708;text-align:center;">মেসের নিয়মাবলী <br> ( আকাশ ছাত্রাবাস )  </h2>
			<p style="height:10px;width:98%;background-color:#d1d1cf"></p>
			<h3 style="color:red;padding:10px;">
				(ক)  বাজার তালিকাঃ
			</h3>
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ১। </span>&nbsp
				 মেসে কোনসদস্যের মিল চালু থাকলে তাকে অবস্যই বাজার করতে হবে । এক্ষেত্রে Final Exam / Job Exam এর কোন অজুহাত দেয়া যাবে না ।  বাজার তালিকা দেয়ার নিয়ম হল, 
				<ul>
					<li> গত মাসে ১ টি বাজার করলে চলতি মাসে ২ টি বাজার করতে হবে । অথবা, </li>
					<li> গত মাসে ২ টি বাজার করলে চলতি মাসে ১ টি বাজার করতে হবে । </li>
				</ul>
				
			</p>

			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ২। </span>&nbsp
				Manager সর্বোচ্চ ২ দিন রুমে যাবে বাজার তালিকা নেয়ার জন্য । দুইবার সাক্ষাতের পরেও কেউ বাজার তালিকা দিতে ব্যর্থ হলে  Manager নিজ ইচ্ছামত ঐ সদস্যের নাম বাজার তালিকায় বসিয়ে দিতে পারবে । 
			</p>			
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ৩। </span>&nbsp
				বাজার তালিকা দেয়ার পর কেউ বাজার করতে না পারলে, নিজের বাজার নিজেকেই manage করে নিতে হবে । এক্ষেত্রে  তার বাজার manage করে দেয়ার দায়িত্ব manager এর নয় ।
			</p>

			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ৪। </span>&nbsp
				বাজার না করলে ৫০ টাকা জরিমানা । 
			</p>
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ৫। </span>&nbsp
				Manager, বাজারকারিকে আগের দিন রাতে অবশ্যই  অবহিত করবে !
			</p><br>
			
			<h3 style="color:red;padding:10px;">
				(খ)  মিল হারানোঃ
			</h3>
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ১। </span>&nbsp
				সর্বোচ্চ ৩ টি মিল ( রাত এবং দুপুরের মিল ভিন্ন ভিন্ন বিবেচ্য )  পর্যন্ত শিথিযোগ্য । এর বেশি মিল হারালে বাকিগুলোর টাকা  Manager কে জরিমানা করা হবে ।
				
			</p>
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ২। </span>&nbsp
				মিল বিড়াল / কাক খেয়ে ফেললে , এক্ষেত্রে মিল হারানোর টাকা সদস্যকে দেয়া হবে না । 
			</p>
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ৩। </span>&nbsp
				দুপুরের মিল হারানোর জন্য ৫০ টাকা এবং রাতের মিল হারানোর জন্য ৩০ টাকা দিতে হবে ।
			</p>
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ৪। </span>&nbsp
				কেউ অতিরিক্ত মিল রুমে নিয়ে গিয়ে রাখলে তাকে মিল হারানোর (খ- ৩) সমপরিমান অর্থ জরিমানা ।
			</p>
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ৫। </span>&nbsp
				মিলা হারানোর অভিযোগ গ্রহণের সময়সীমা হলো, দুপুরের মিল বিকাল ৫.০০ টার মধ্যে এবং রাতের মিল রাত ১০.০০ টার মধ্যে  Manager কে  জানাতে হবে অন্যথায় অজিযোগ গ্রহণযোগ্য নয় ।
			</p>
			
			<h3 style="color:red;padding:10px;">
				(গ)  FEAST রান্নাঃ
			</h3>
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ১। </span>&nbsp
				প্রতি রান্নার জন্য ২০ টাকা দিতে হবে । এক্ষেত্রে নিজ দায়িত্বগুণে দেয়ালে দেওয়া কাগজে নাম লিখে রাখবেন অথবা, Manager কে অবহিত করবেন ।
			</p>
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ২। </span>&nbsp
				কেউ Feast রান্না করে নাম না লিখলে ১০০ টাকা জরিমান ।
			</p>
			
			<h3 style="color:red;padding:10px;">
				(গ)  ধরা মিলঃ
			</h3>
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ১। </span>&nbsp
				প্রত্যেক সদস্যকে সর্বনিম্ন ১০ টি মিল ( ১০ দিনে মাসের শেষের feast included ) অবশ্যই খেতে হবে । 
			</p>
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ২। </span>&nbsp
				ঈদ-উল-ফিতর , ঈদ-উল-আযহা  এবং দূর্গা পূজার সময় যেই মাসে মেস বন্ধ থাকবে সেই মাসে মিল ধরা শূন্য ।
			</p>
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ৩। </span>&nbsp
				Guest মিল রেট ৩০ টাকা এবং অতিরিক্ত ৫ টাকা প্রতি গেস্ট মিল বাবদ বুয়া পাবে । <br>
				৮ টার বেশি গেস্ট মিল হলে খড়ি+বুয়া বিল দিতে হবে ।
			</p>
			
			<h3 style="color:red;padding:10px;">
				(গ)  টাকা জমা এবং উত্তোলনঃ
			</h3>
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ১। </span>&nbsp
					চলতি মাসের ম্যানেজারকে ১০ তারিখের মধ্য সর্বনিম্ন ৫০০ টাকা জমা দিতে হবে; অন্যথায় তার মিল ম্যানেজার বন্ধ করে দিতে পারবে ।
			</p>
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ২। </span>&nbsp
				গত মাসের ম্যানেজারকে ৫-১০ তারিখের মধ্যে বকেয়া টাকা পরিশোধ করতে হবে । অন্যাথায় তার ৫০ টাকা জরিমান । ৩০ তারিখের  মধ্য না দিতে পারলে ২০০ টাকা জরিমানা ।
			</p>
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ৩। </span>&nbsp
				গত মাসের ম্যানেজার অবশ্যই বুয়া বিল + খড়ি বিল + WiFi বিল পরিশোধ করবে ।
			</p>
			
			<h3 style="color:red;padding:10px;">
				(গ)  ম্যানেজারিঃ
			</h3>
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ১। </span>&nbsp
					ম্যানেজার তালিকায় যার নাম যখন আসবে তাকে ঠিক ঐ মাসেই ম্যানেজারি নিতে হবে । অন্যথায় তার ম্যানেজারি তাকে ম্যানেজ করে দিতে হবে ।
			</p>
			
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ২। </span>&nbsp
				ম্যানেজার ভাতা ১০০ টাকা ।
			</p>
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ৩। </span>&nbsp
				বুয়ার ছুটি ব্যতীত অন্য কোন কারনে মিল বন্ধ হলে পরিস্থিতি সাপেক্ষে ম্যানেজারকে জরিমানা করা হবে ।
			</p>
			
			<h3 style="color:red;padding:10px;">
				(ঘ)  বিবিধঃ
			</h3>
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;"> ১। </span>&nbsp
				নিজের মিল / গেস্ট মিল চালু করার জন্য ম্যানেজারকে সরাসরি অবহিত করতে হবে ।
			</p>
			<p>
				<span style="margin-left:5px;color:red;font-weight:bold;font-size:15px;">  ২। </span>&nbsp
				<ul>
					<li> বুয়া বিল জন প্রতি ১৫০ টাকা । </li>
					<li> ঈদ বোনাস ১৫০ টাকা ।</li>
				</ul>
			</p>

			
         
		</div>

	</div> 

	
	<div class="footer">
		Copyright &copy; Boyiddha 2022.<br> Developed by Boyiddhanath Roy.
	</div>
	


</body>

</html>