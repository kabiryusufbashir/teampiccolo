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
					<?php
						if(isset($_POST['select_election'])){
							if(isset($_POST['election_type'])){
								$election_type = htmlspecialchars($_POST['election_type']);
									include '../includes/connect.inc.php';
									$query = $election->query("SELECT `election_id` FROM `election_name` WHERE `name`='$election_type'");
										if($query->rowCount() > 0){
											$query_row = $query->fetch();
												$election_id = $query_row['election_id'];
													$sql = $election->query("SELECT `candidate_id`, COUNT(candidate_id) AS VOTES FROM `election_vote` WHERE `election_id`='$election_id' GROUP BY `candidate_id` ORDER BY `VOTES` DESC");
													
													$total_vote = $election->query("SELECT * FROM `election_vote` WHERE `election_id`='$election_id'");
													$total_voters = $election->query("SELECT * FROM `election_users`");
														
														$total_voters = $total_voters->rowCount();
														$total_vote = $total_vote->rowCount();
														
														if($sql){
															echo 
																'<h1>
																	<center>'.$election_type.'</center><br />
																		Total Voters: '.$total_voters.'<br />
																		Total Vote Cast: '.$total_vote.'<br />
																</h1>';
															while($sql_row = $sql->fetch()){
																$candidate_id = $sql_row['candidate_id'];
																$candidate_votes = $sql_row['VOTES'];
																	$query_2 = $election->query("SELECT * FROM `election_candidate` WHERE `candidate_id`='$candidate_id'");
																		$query_row_2 = $query_2->fetch();
																			$full_name = $query_row_2['full_name'];
																			$dob = $query_row_2['dob'];
																			$position = $query_row_2['position'];
																			$candidate_photo = $query_row_2['candidate_photo'];
																					echo 
																					'<div class="col-half">
																						<img src="'.$candidate_photo.'" /><br />
																						<h1>'.$full_name.'<br />
																						Total Votes: '.$candidate_votes.'</h1><br />
																					</div>';
															}
														}else{
															echo 'Error: Please try again...<hr />';
														}
										}else{
											echo '<h1>No Record found...<hr /></h1>';
										}
							}
						}
						
					?>
			</div>
		</div>	
	</div><!--End of content-->
<?php
	require '../includes/footer.inc.php';
?>