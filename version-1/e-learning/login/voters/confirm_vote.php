<?php
	require '../includes/head_voters.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<h1><u>Vote</u></h1>
					<?php
						if(isset($_POST['vote'])){
							if(isset($_POST['candidate_id'], $_POST['election_id'], $_POST['voter_id'])){
								$candidate_id = htmlspecialchars($_POST['candidate_id']);
								$election_id = htmlspecialchars($_POST['election_id']);
								$voter_id = htmlspecialchars($_POST['voter_id']);
									include '../includes/connect.inc.php';
										$sql = $election->query("SELECT * FROM `election_vote` WHERE `user_id`='$voter_id' && `election_id`='$election_id'");
											if($sql->rowCount() == 0){
												$query = $election->prepare("INSERT INTO `election_vote`(election_id, candidate_id, user_id) VALUES(?, ?, ?)");
													$query->bindValue(1, $election_id);
													$query->bindValue(2, $candidate_id);
													$query->bindValue(3, $voter_id);
														if($query->execute()){
															echo '<h1>Thanks for Voting...<br /><a style="text-decoration:none;" href="../includes/logout.inc.php">Click here to log out...</a></h1>';
														}else{
															echo '<h1>Error: please try again...!!!<br /><a style="text-decoration:none;" href="../includes/logout.inc.php">Click here to log out...</a></h1>';
														}
											}else{
												echo '<h1>You can\'t Vote TWICE!!<br /><a style="text-decoration:none;" href="../includes/logout.inc.php">Click here to log out...</a></h1>';
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