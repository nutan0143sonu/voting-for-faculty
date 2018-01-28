<?php

 session_start();
 if(!isset($_SESSION['id']))
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
				height:80px;
				width:80px;
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
				
				margin:20px -10px 0 20px;
				height:100%;
				width:25%;
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
						<li><a href="result.php">RESULT</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
					<br><br><br>
					<font style="font-size:20px;color:yellow;">
					Thank you for being a part of the University.<br>
					This site offers you to vote for your favourite teacher according to your choice.<br>
					You can also send messages to your teachers for their valuable efforts.<br>
					</font>

				</div>
				<br>
				<font style="font-size:40px;color:blue;">Your status</font>
				<?php

						$conn=mysqli_connect("localhost","root");
						mysqli_select_db($conn,"vote");
						error_reporting(E_WARNING);
						$name=$_SESSION['name'];
						$id=$_SESSION['id'];
						echo '<font style="font-size:25px;">';
						echo "welcome $name</font><br>";

						if ( isset( $_POST['v_submit'] )) 
						{							
							$q1=$_POST['q1'];
							$q2=$_POST['q2'];
							$q3=$_POST['q3'];
							$q4=$_POST['q4'];
							$q5=$_POST['q5'];
							
							$_POST['v_submit']=NULL;
							
							
								$result=mysqli_query($conn,"insert into myvote(id,q1,q2,q3,q4,q5) values ('$id','$q1','$q2','$q3','$q4','$q5')");
								if($result)
								{
									echo "<br>Thank you for your vote<br>";
									echo "your vote is successful";
								
							
								}
								else
								{
								echo " you have already voted";
								
								}
							

						}
						if(isset($_POST['submit']))
						{	$t_id=$_POST['t_id'];
							$msg=$_POST['msg'];
							$res=mysqli_query($conn,"insert into messages (stu_id,t_id,msg) values ('$id','$t_id','$msg')");
							if($res)
								echo "message sent succesfully";
						}
					?>
				</div>
		
		<div class="main">
			<div class="content"> 
			<form action="#" method="POST">

				<h2>Questionaire</h2>
				<?php
					$a=array("q1","q2","q3","q4","q5");
					$n=array("Mr.Akash Sanghi","Dr.Gaurav Agarwal","Mr.Rahul Rastogi","Mr.Pradeep Kumar","Mr.Hiresh Gupta","Mrs.Meeta Chaudhary","Mr.Suhail Javed Quraishi","Mr.Chandan Kumar","Mr.Anil Kumar Pandey","Dr.Y.D.S.Arya");
					$m=array("t001","t002","t003","t004","t005","t006","t007","t008","t009","t010");

					for($i=0;$i<5;$i++)
					{
						echo "<h3>question ";
						echo $i+1;
						echo "</h3><br>";
						echo '<table style="font-size:14.5px;" >';
						for($j=0;$j<10;$j++)
						{
							if($j==0)
								echo "<tr>";
							echo '<td><input type="radio" name="';
							echo "$a[$i]";
							echo '" value="';
							echo "$n[$j]";
							echo '">';
							echo "$n[$j]";
							if($j==4)
								echo "</tr><tr>";
							
						}
						echo "</tr></table><br>";
					}
				?>
				<br>
				<br>
				<br>
				<input type="submit" name="v_submit" style="height:50px;width:100px;margin-left:10px;border-radius:10px;background-color:pink;">
				</form>
				
			</div>
			<div class="right">
				<font style="font-size:22px;color:red;">
					Want to say something to your favourite teacher.....???
					<br>
					Here you can send them message...!!<br>
					<br>
					<br>
				</font>
				<font style="font-size:30px;color:blue;">
						<?php
						for($i=0;$i<10;$i++)
						{
								echo '<div class="msg"><div class="lmsg"><form action="#" method="POST"><img src="';
								echo "$m[$i]";
								echo '.jpg" class="photo"></div><div class="rmsg">';
								echo "$n[$i]";
								echo ':<br><input type="text" name="msg" placeholder="write message here..."><input type="submit" name="submit" value="send"><input type="hidden" name="t_id" value="';
								echo "$m[$i]";
								echo '"></form></div></div>';
						}
						?>
				</font>
			</div>
		</div>
	</div>
	</body>
</html>