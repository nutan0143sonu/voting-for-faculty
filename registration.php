<html>
<head>
<title>register</title>
<style>
body{
	background:
	radial-gradient(black 15%, transparent 16%) 0 0,
	radial-gradient(black 15%, transparent 16%) 4px 4px,
	radial-gradient(rgba(255,255,255,.1) 15%, transparent 20%) 0 1px,
	radial-gradient(rgba(255,255,255,.1) 15%, transparent 20%) 4px 5px;
	background-color:#dddddd;
	font-family:"Comic Sans MS","Segoe UI",Arial,Sans-Serif;
	background-size:8px 8px;
	
}
.header{
	padding:0.5px;
	text-align:center !important;
	width:600px;
	height:50px;
	font-size:30px;
	border-bottom:1px solid #e6ecf0;
	border-radius:6px 6px 0 0;
}

form{
	width:260px;
	margin:0 auto;
	line-height:35px;
}
input{
	margin-top:12px;
	width:100%;
	border-radius:3px;
	background-color:#99ffff;
	font:inherit;
	border:1px solid #e6ecf0;
	font-size:14px;
}
.submit{
	border-radius:100px;
	font-weight:bold;
	background:#1da1f2;
	border:1px solid #1da1f2;
	color:#fff;
}

.main{
	background-color:#000000;
	padding:10px;
	width:620px;
	text-align:center;
	border-radius:10px;
	position:absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
}
.reg{
	background-color:#cdcdcd;
	padding:10px;
	border-radius:10px 10px 0 0;
}
.log{
	background-color:#dcdcdc;
	padding:10px;
	border-radius:0 0 10px 10px;
}

</style>
</head>
<body>
<?php
if ( isset( $_POST['form_submit'] ) ) 
{
	$name=$_POST['name'];
$id=$_POST['id'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
if($pass1==$pass2)
	{
		$conn=mysqli_connect("localhost","root");
		mysqli_select_db($conn,"vote");
		$result=mysqli_query($conn,"insert into users(name,id,password) values ('$name','$id','$pass1')");
		if($result)
		{echo '<script language="javascript">';
		echo 'alert("registration successful")';
		echo '</script>';
		}
		else
		{	echo '<script language="javascript">';
		echo 'alert("registration failed")';
		echo '</script>';
		}
	}
else
	{
		echo '<script language="javascript">';
echo 'alert("password does not match")';
echo '</script>';
	}

	
}?>
<center>
<div class="main" style="margin-top:auto;">
<div class="reg" style="border:2px;">
<div class="header">
Register Here
</div>
<form action="registration.php" method="POST">
<input type="text" name="name" placeholder="Name" required><br>
<input type="text" name="id" placeholder="UserID" required><br>
<input type="password" name="pass1" placeholder="Enter Password" required><br>
<input type="password" name="pass2" placeholder="Confirm Password" required><br>
<input class="submit" type="submit" name="form_submit" value="Submit">
</form>
</div>
</center>
</body>
</html>