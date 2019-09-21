<?php
	require '../includes/head.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<h1><u>Edit Candidate</u></h1>
					<?php
						include '../includes/connect.inc.php';
							$candidate_id = htmlspecialchars(htmlentities(stripslashes($_GET['id'])));
								$query = $election->query("SELECT * FROM `election_candidate` WHERE `candidate_id`='$candidate_id'");
									if($query->rowCount() > 0){
											$query_row = $query->fetch();
												$first_name = $query_row['first_name'];
												$last_name = $query_row['last_name'];
												$other_name = $query_row['other_name'];
												$candidate_id = $query_row['candidate_id'];
												$dob = $query_row['dob'];
												$election_id = $query_row['position'];
										
										$query_4 = $election->query("SELECT `name` FROM `election_name` WHERE `election_id`='$election_id'");
											$query_row_4 = $query_4->fetch();
												$election_name = $query_row_4['name'];
												
										?>
										<?php
											if(isset($_POST['edit_candidate'])){
												if(isset($_POST['edit_first_name'], $_POST['edit_last_name'], $_POST['edit_other_name'], $_POST['edit_dob'], $_POST['edit_position'])){
													$edit_first_name = htmlspecialchars(htmlentities(stripslashes($_POST['edit_first_name'])));
													$edit_last_name = htmlspecialchars(htmlentities(stripslashes($_POST['edit_last_name'])));
													$edit_other_name = htmlspecialchars(htmlentities(stripslashes($_POST['edit_other_name'])));
													$edit_dob = htmlspecialchars(htmlentities(stripslashes($_POST['edit_dob'])));
													$edit_position = htmlspecialchars(htmlentities(stripslashes($_POST['edit_position'])));
													$full_name = $edit_first_name.' '.$edit_last_name.' '.$edit_other_name;
														if(!empty($edit_first_name)){
															if(!empty($edit_last_name)){
																if(!empty($edit_dob)){
																	if(!empty($edit_position)){
																		$query_5 = $election->query("SELECT `election_id` FROM `election_name` WHERE `name`='$edit_position'");
																		$query_row_5 = $query_5->fetch();
																			$election_id_edit = $query_row_5['election_id'];
																	
																		
																		$query_2 = $election->query("SELECT * FROM `election_candidate` WHERE `first_name`='$edit_first_name' && `last_name`='$edit_last_name' && `other_name`='$edit_other_name' && `position`='$election_id_edit' && `dob`='$edit_dob' && `candidate_id`='$candidate_id'");
																			if($query_2->rowCount() == 0){
																				$query_3 = $election->query("UPDATE `election_candidate` SET `full_name`='$full_name', `first_name`='$edit_first_name', `last_name`='$edit_last_name', `other_name`='$edit_other_name', `position`='$election_id_edit', `dob`='$edit_dob' WHERE `candidate_id`='$candidate_id'");
																					if($query_3){
																						echo '<b>'.$full_name.' updated successful </b><a href="./view_candidate.php">Click here to go back...</a><hr />';
																					}else{
																						echo 'Error: please try again...<hr />';
																					}
																			}else{
																				echo '<b>'.$full_name.'</b> already exist running for <b>'.$edit_position.'<b><hr />';
																			}
																	}else{
																		echo 'Position not Selected...<hr />';
																	}
																}else{
																	echo 'Date of Birth not Selected...<hr />';
																}	
															}else{
																echo 'Last Name Field empty...<hr />';
															}
														}else{
															echo 'First Name Field empty...<hr />';
														}
												}
											}
										?>
										<form action="candidate_edit.php?id=<?php echo $candidate_id; ?>" method="POST">
											<h1>First Name</h1>
												<input value="<?php echo $first_name; ?>" name="edit_first_name" type="text" placeholder="First Name" /><br /><br />
											<h1>Last Name</h1>
												<input value="<?php echo $last_name; ?>" name="edit_last_name" type="text" placeholder="Last Name" /><br /><br />
											<h1>Other Name</h1>
												<input value="<?php echo $other_name; ?>" name="edit_other_name" type="text" placeholder="Other Name" /><br /><br />
											<h1>Date of Birth</h1>
												<input value="<?php echo $dob; ?>" name="edit_dob" type="date" placeholder="Date of Birth" /><br /><br />
											<h1>Position</h1>
												<select name="edit_position">
													<option><?php echo $election_name; ?></option>
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
											<input name="edit_candidate" type="submit" value="Edit Candidate" />
										</form>
									<?php
									}else{
										include '../includes/logout.inc.php';
									}
					?>
			</div>
		</div>	
	</div><!--End of content-->
<?php
	require '../includes/footer.inc.php';
?>