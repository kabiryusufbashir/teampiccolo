<?php
	session_start();
?>

<html>
	<head>
		<title>Voting System - Web Development Class</title>
		<link rel="Icon" type="image/ico" href="../../images/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="../../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../../css/responsive.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script type="text/javascript"> 
			//<![CDATA[ 
				var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
				document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
			//]]>
		</script>
	</head>
	<body>
		<div id="container">
			<div class="banner" style="background:#fff; float:left; width:100%;">
				<div class="col-full">
					<center><h1>Voting System </h1><i>Version 1.1</i></center>
				</div>
				<div class="col-full">
					<?php
						include '../includes/session.inc.php';
					?>
				</div>
			</div><!--End of Banner-->
			
			<div class="row">
				<div class="title">
					Latest Update
				</div>
				<div class="latest_update">
					<marquee direction="left" scrollamount="4" behavior="scroll">
						<span>Voting System Designed and Developed by Team Piccolo Web Development Class 2018!!! &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span>
						<span>Voting System Designed and Developed by Team Piccolo Web Development Class 2018!!! &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span>
						<span>Voting System Designed and Developed by Team Piccolo Web Development Class 2018!!! &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span>
					</marquee>
				</div>
			</div>
			<div class="row">
				<nav>
					<ul>
						<li><a href="./index.php">Home</a></li>
						<li><a href="./election.php">Election</a></li>
						<li><a href="./voters.php">Voters</a></li>
						<li><a href="./poll.php">Poll</a></li>
					</ul>
				</nav><!--End of Navigation-->
			</div>
