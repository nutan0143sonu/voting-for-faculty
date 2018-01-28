<?php

 session_start();
 if(!isset($_SESSION['t_id']))
 {
	 header("location:login.php");
 }
 
?><html>
	<head>
		<style>
			body
			{
				background-color:black;
				
				max-width:1340px;
				min-width:1340px;
				max-height:565px;
				min-height:565px;
			}
			.top
			{
				
				max-width:1340px;
				min-width:1340px;
				max-height:565px;
				min-height:565px;
					position:absolute;
					top: 44%;
					left: 50%;
					transform: translate(-50%, -50%);
			
			}
			.photo
			{
				height:130px;
				width:130px;
				border-radius:100%;
			}
			.head
			{

				background-attachment:fixed;
				background-color:orange;
				width:100%;
				height:180px;
				
			}
			.pic
			{
				margin:20px;
				background-color:white;
				height:180px;
				width:300px;
				float:left;
				border-radius:20px;
			}
			.navigator
			{
				float:right;
				width:100%;
				height:50px;
			}
			.menu
			{
				margin:20px;
				height:200px;
				width:700px;
				float:left;
			}
			.main
			{
				background-image:url("invertis-back.jpg");
				width:100%;
				height:465px;
				background-repeat:no-repeat;
				background-size:1350px 700px;
				
			}
			.content
			{
				background-color:rgba(256,256,256,0.8);
				width:55%;
				height:88%;
				padding-left:20px;
				float:left;
				margin-left:15px;
				margin-top:-20px;
				overflow:auto;
			}
			::-webkit-scrollbar
			{
				display:none;
			}
			.right
			{
				background-color:rgba(256,256,256,0.8);
				width:39%;
				height:88%;
				float:right;
				padding-left:10px;
				overflow:auto;
				margin-right:15px;
				margin-top:-20px;
			}
			.msg
			{
				width:90%;
				height:100px;
			}
			.lmsg
			{
				width:80px;
				height:80px;
				float:left;
			}
			.rmsg
			{
				width:70%;
				height:100px;
				float:left;
				margin-left:30px;
			}
            .menu ul
            {
                margin: 0px;
                padding: 0px;
                list-style-type: none;
            }
            .menu ul li
            {
                float: left;
            }
            .menu ul li a
            {
                margin-left: 40px;
                margin-top: 10px;
                display: block;
                font-size: 20px;
                text-decoration: none;
            }
		</style>
	</head>
	<body>
		<div class="top">
			<div class="head">
				<div class="pic">
					<img src="vote_icon.jpg" height="180" width="300" style="border-radius:20px;">
				</div>
				<div class="menu">
					<ul>
						<li><a href="#">HOME</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
					<br><br><br>
					<font style="font-size:20px;color:yellow;">
					Thank you for being a part of the University.<br>
					This site offers you the result of the voting done by the students according to their choice.<br>
					You can also see the messages send by your students with their regards.<br>
					</font>

				</div>
				<?php
						$conn=mysqli_connect("localhost","root");
						mysqli_select_db($conn,"vote");
						error_reporting(E_WARNING);
						$name=$_SESSION['name'];
						$id=$_SESSION['t_id'];
						echo '<br><font style="font-size:30px;color:blue;">';
						echo "welcome <br>$name</font>";
				?>
			
				<img src="<?php echo "$id";?>.jpg" class="photo">
			</div>
			<div class="main">
				<div class="content">
					<font style="font-size:25px;color:blue;">
					Congratulations....!!!!<br>You have been voted by the students on following questions<br>
					</font>
					<?php
					
						echo '<br><br><font style="font-size:20px;color:red;">Question 1</font><br>';
						$res=mysqli_query($conn,"select count(*) from myvote where q1='$name'");
						$a=mysqli_fetch_array($res);
						echo "$a[0] students voted for you in this question";
						
						echo '<br><br><font style="font-size:20px;color:red;">Question 2</font><br>';
						$res=mysqli_query($conn,"select count(*) from myvote where q2='$name'");
						$a=mysqli_fetch_array($res);
						echo "$a[0] students voted for you in this question";
					
						echo '<br><br><font style="font-size:20px;color:red;">Question 3</font><br>';
						$res=mysqli_query($conn,"select count(*) from myvote where q3='$name'");
						$a=mysqli_fetch_array($res);
						echo "$a[0] students voted for you in this question";
					
						echo '<br><br><font style="font-size:20px;color:red;">Question 4</font><br>';
						$res=mysqli_query($conn,"select count(*) from myvote where q4='$name'");
						$a=mysqli_fetch_array($res);
						echo "$a[0] students voted for you in this question";
					
						echo '<br><br><font style="font-size:20px;color:red;">Question 5</font><br>';
						$res=mysqli_query($conn,"select count(*) from myvote where q5='$name'");
						$a=mysqli_fetch_array($res);
						echo "$a[0] students voted for you in this question";
					
					?>
				</div>
				<div class="right">
					<br><font style="font-size:30px;color:red;">You have recieved messages:</font><br>
					<?php
						$result=mysqli_query($conn,"SELECT name,msg FROM `messages`,users where t_id='$id' and users.id=messages.stu_id");
						while($arr=mysqli_fetch_array($result))
						{
							echo '<br><br><font style="font-size:30px;color:blue;">';
							echo "$arr[0]</font><br>";
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $arr[1]";
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>