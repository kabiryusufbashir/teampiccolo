<?php
	require '../includes/head.inc.php';
?>
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
														if($sql){
															echo '<h1><center>'.$election_type.'</center></h1>';
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
																						<h2>Full Name: '.$full_name.'<br />
																						Date of Birth: '.$dob.'<br />
																						Total Votes: '.$candidate_votes.'<br />
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