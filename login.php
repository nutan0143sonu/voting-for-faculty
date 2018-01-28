<?php
session_start();
?><html>
<head>
<title>register</title>
<style>
.top
{
	//margin:auto;
	max-width:1330px;
	min-width:1330px;
	max-height:565px;
	min-height:565px;
		position:absolute;
        top: 44%;
        left: 50%;
        transform: translate(-50%, -50%);
}
.header{
	padding:0.5px;
	background-color:blue;
	text-align:center !important;
	width:400px;
	height:50px;
	font-size:30px;
}

form{
	width:260px;
	margin:0 auto;
	line-height:35px;
	height:200px
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
	margin-top:25px;
}

.main{
	background-color:white;
	width:400px;
	height:250px;
	text-align:center;
	box-shadow: 1px 20px 40px #888888;
	
	
}
.log{
	}

</style>
</head>
<body>
<div class="top">
<?php
if(isset($_POST['mysubmit']))
{
	$id=$_POST['id'];
$pass=$_POST['password'];



$conn=mysqli_connect("localhost","root");
mysqli_select_db($conn,"vote");
$result=mysqli_query($conn,"select * from faculty where id='$id'");
$abc=mysqli_fetch_array($result);
if($abc['id']!=$id)
{	
	$result=mysqli_query($conn,"select * from users where id='$id'");
	$abc=mysqli_fetch_array($result);
	if($abc['id']!=$id)
	{	
		echo '<script language="javascript">';
		echo 'alert("account not found for id ")';
		echo '</script>';
	}
	else
	{
		if($abc[2]==$pass)
		{	$name=$abc[0];
			$_SESSION['id']=$id;
			$_SESSION['name']=$name;
			$_SESSION['type']=0;
			header("location:vote.php");
		}
		else
		{	echo '<script language="javascript">';
			echo 'alert("incorrect password")';
			echo '</script>';
		}
	}
}
else
	{
		if($abc[2]==$pass)
		{	$name=$abc[0];
			$_SESSION['name']=$name;
			$_SESSION['t_id']=$id;
			$_SESSION['type']=1;
			header("location:teacher.php");
		}
		else
		{	echo '<script language="javascript">';
			echo 'alert("incorrect password")';
			echo '</script>';
		}
	}
}
?>
<div>
<div style="width:100%;height:50px;background-color:blue;">
&nbsp&nbsp&nbsp&nbsp&nbsp
<img src="pic1.png" height="150px"width="300px">
</div>
<center>
<div style="width:100%;height:70px;background-color:red;">
</div>
<div class="main" style="margin-top:30px;">
<div class="log" style="border:2px;">
<div class="header">Login Here
</div>
<form action="#" method="post">
<input type="text" name="id" placeholder="UserID" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<input class="submit" type="submit" name="mysubmit" value="Log in">
</form>
</div>
</div>
</center>
<footer class="footer">
	<div style="width:100%;height:180px;margin-top:50px;">
	<img src="ub.jpg" height="140px" width="100%">
	</div>
	<div style="width:99%;height:50px;background-color:red;margin-top:-40px;border:5px solid #ffffff;">
	</div>
</footer>
</div>
</div>
</body>
</html>