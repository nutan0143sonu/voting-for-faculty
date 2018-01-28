<?php
session_start();
	if($_SESSION['type']==0)
		header("location:vote.php");
	else
		header("location:teacher.php");


?>