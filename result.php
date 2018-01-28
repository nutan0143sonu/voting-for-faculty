<html>
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
						<li><a href="home.php">HOME</a></li>
						<li><a href="#">RESULT</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
					<br><br><br>
					<font style="font-size:35px;color:yellow;">
					Result declaration of your valuable vote
					</font>
				</div>
			</div>
			<div class="main">
				<div class="content">
					
				</div>
				<div class="right">
					
				</div>
			</div>
		</div>
	</body>
</html>