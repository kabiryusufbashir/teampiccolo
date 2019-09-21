<?php
	require '../includes/head_voters.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<h1><u>Vote</u></h1>
					<?php
						if(isset($_POST['select_election'])){
							$election_type = htmlspecialchars($_POST['election_type']);
								include '../includes/connect.inc.php';
								
								$sql = $election->query("SELECT `election_id` FROM `election_name` WHERE `name`='$election_type'");
									$sql_row = $sql->fetch();
										$election_id = $sql_row['election_id'];
								
								$sql_2 = $election->query("SELECT `id` FROM `election_users` WHERE `user_id`='$user_id'");
									$sql_row_2 = $sql_2->fetch();
										$voter_id = $sql_row_2['id'];
								
								$sql = $election->query("SELECT * FROM `election_vote` WHERE `user_id`='$voter_id' && `election_id`='$election_id'");
									if($sql->rowCount() == 0){
										$query = $election->query("SELECT * FROM `election_candidate` WHERE `position`='$election_id'");
											if($query->rowCount() > 0){
													echo '<h1><center>'.$election_type.'</center></h1>';
													while($query_row = $query->fetch()){
														$candidate_id = $query_row['candidate_id'];
														$full_name = $query_row['full_name'];
														$dob = $query_row['dob'];
														$position = $query_row['position'];
														$candidate_photo = $query_row['candidate_photo'];
																echo 
																'<div class="col-half">
																	<img src="'.$candidate_photo.'" /><br />
																	<h1><center>'.$full_name.'</center></h1>
																	<form action="confirm_vote.php" method="POST" style="text-align:center;">
																		<input style="display:none;" name="election_id" value="'.$election_id.'" type="text" />
																		<input style="display:none;" name="candidate_id" value="'.$candidate_id.'" type="text" />
																		<input style="display:none;" name="voter_id" value="'.$voter_id.'" type="text" />
																		<input name="vote" type="submit" value="Vote" />
																	</form>
																</div>';
													}
											}
									}else{
										echo '<h1>You can\'t Vote TWICE!!<br /><a style="text-decoration:none;" href="../includes/logout.inc.php">Click here to log out...</a></h1>';
									}
						}
					?>
			</div>
		</div>	
	</div><!--End of content-->
<?php
	require '../includes/footer.inc.php';
?>