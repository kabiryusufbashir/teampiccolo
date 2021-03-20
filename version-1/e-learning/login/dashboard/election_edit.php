<?php
	require '../includes/head.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<h1><u>Edit Election</u></h1>
					<?php
						include '../includes/connect.inc.php';
							$election_id = htmlspecialchars(htmlentities(stripslashes($_GET['id'])));
								$query = $election->query("SELECT * FROM `election_name` WHERE `election_id`='$election_id'");
									if($query->rowCount() > 0){
											$query_row = $query->fetch();
												$election_name = $query_row['name'];
												$election_status = $query_row['status'];
												$election_status = ($election_status == 1) ? 'Active' : 'De-Active';
										?>
										<?php
											if(isset($_POST['edit_election'])){
												if(isset($_POST['edit_election_name'], $_POST['edit_election_status'])){
													$edit_election_name = htmlspecialchars(stripslashes(htmlentities($_POST['edit_election_name'])));
													$edit_election_status = htmlspecialchars(stripslashes(htmlentities($_POST['edit_election_status'])));
														if(!empty($edit_election_name)){
															if(!empty($edit_election_status)){
																$edit_election_status = ($edit_election_status == 'Active') ? 1 : 0;
																$sql_2 = $election->query("SELECT * FROM `election_name` WHERE `name`='$edit_election_name' && `status`='$edit_election_status'");
																	if($sql_2->rowCount() == 0){
																		$sql = $election->query("UPDATE `election_name` SET `name`='$edit_election_name', `status`='$edit_election_status' WHERE `election_id`='$election_id'");
																			if($sql){
																				echo 'Updated successfully...<a href="./view_election.php">Click here to go back...</a><hr />';
																			}else{
																				echo 'Error: please try again...<hr />';
																			}
																	}else{
																		echo '<b>'.$edit_election_name.'</b> already exist...<hr />';
																	}
/* 																			
*/																	}else{
																echo 'Election Status not Selected...<hr />';
															}
														}else{
															echo 'Election Name Field is empty...<hr />';
														}
												}
											}
										?>
										<form action="election_edit.php?id=<?php echo $election_id; ?>" method="POST">
											<h1>Election Name</h1>
												<input value="<?php echo $election_name; ?>" name="edit_election_name" type="text" placeholder="Edit Election" /><br /><br />
											<h1>Election Status</h1>
												<select name="edit_election_status">
													<option><?php echo $election_status; ?></option>
													<option></option>
													<option>Active</option>
													<option>De-Active</option>
												</select><br /><br />
											<input name="edit_election" type="submit" value="Edit Election" />
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