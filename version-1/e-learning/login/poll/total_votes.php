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
						echo '<h1><center>View Votes</center></h1>';
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
			</div>

	<div id="content">
		<div class="row">
			<div class="col-full">
				<form action="./votes.php" method="POST">
					<h1>Select Election Type</h1>
					<select name="election_type">
						<option></option>
						<?php
							include '../includes/connect.inc.php';
								$sql = $election->query("SELECT `name` FROM `election_name` ORDER BY `name`");
									if($sql->rowCount() > 0){
										while($sql_row = $sql->fetch()){
											$election_name = $sql_row['name'];
												echo '<option>'.$election_name.'</option>';
										}
									}else{
										echo '<option>No Record Found</option>';
									}
						?>
					</select><br /><br />
				<input name="select_election" type="submit" value="Select Election" />
				</form>
			</div>
		</div>	
	</div><!--End of content-->
<?php
	require '../includes/footer.inc.php';
?>