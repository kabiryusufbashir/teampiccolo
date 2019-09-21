<?php
	require '../includes/head.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<?php
					if(isset($_POST['add_candidate'])){
						if(isset($_POST['first_name'], $_POST['last_name'], $_POST['other_name'], $_POST['dob'], $_POST['position'])){
							$first_name = htmlspecialchars(htmlentities(stripslashes($_POST['first_name'])));
							$last_name = htmlspecialchars(htmlentities(stripslashes($_POST['last_name'])));
							$other_name = htmlspecialchars(htmlentities(stripslashes($_POST['other_name'])));
							$dob = htmlspecialchars(htmlentities(stripslashes($_POST['dob'])));
							$position = htmlspecialchars(htmlentities(stripslashes($_POST['position'])));
							$full_name = $first_name.' '.$last_name.' '.$other_name;
								if(!empty($first_name)){
									if(!empty($last_name)){
										if(!empty($dob)){
											if(!empty($position)){
												include '../includes/connect.inc.php';
													$query = $election->query("SELECT `election_id` FROM `election_name` WHERE `name`='$position'");
														$query_row = $query->fetch();
															$election_id = $query_row['election_id'];
															
													$sql = $election->query("SELECT * FROM `election_candidate` WHERE `first_name`='$first_name' && `last_name`='$last_name' && `other_name`='$other_name' && `dob`='$dob' && `position`='$position'");
														if($sql->rowCount() == 0){
															$stmt = $election->prepare("INSERT INTO `election_candidate`(first_name, last_name, other_name, dob, position, full_name) VALUES(?, ?, ?, ?, ?, ?)");
																$stmt->bindValue(1, $first_name);
																$stmt->bindValue(2, $last_name);
																$stmt->bindValue(3, $other_name);
																$stmt->bindValue(4, $dob);
																$stmt->bindValue(5, $election_id);
																$stmt->bindValue(6, $full_name);
																	if($stmt->execute()){
																		echo '<b>'.$full_name.' added...<a href="./election.php">Click here to go back...</a><hr /></b>';	
																	}else{
																		echo 'Error: please try again...<hr />';
																	}
														}else{
															echo '<b>'.$first_name.' '.$last_name.' '.$other_name.'</b> already stored running for the <b>'.$position.'</b> election...<hr />';
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
				<h1><u>Add Candidate</u></h1>
				<form action="add_candidate.php" method="POST">
					<h1>First Name</h1>
						<input name="first_name" type="text" placeholder="First Name" /><br /><br />
					<h1>Last Name</h1>
						<input name="last_name" type="text" placeholder="Last Name" /><br /><br />
					<h1>Other Name</h1>
						<input name="other_name" type="text" placeholder="Other Name" /><br /><br />
					<h1>Date of Birth</h1>
						<input name="dob" type="date" placeholder="Date of Birth" /><br /><br />
					<h1>Position</h1>
						<select name="position">
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
					<input name="add_candidate" type="submit" value="Add Candidate" />
				</form>
			</div>
		</div>	
	</div><!--End of content-->
<?php
	require '../includes/footer.inc.php';
?>