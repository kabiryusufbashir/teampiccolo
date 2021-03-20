<?php
	require '../includes/head.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<?php
					if(isset($_POST['add_election'])){
						if(isset($_POST['new_election'], $_POST['election_status'])){
							$new_election = htmlspecialchars(htmlentities(stripslashes($_POST['new_election'])));
							$election_status = htmlspecialchars(htmlentities(stripslashes($_POST['election_status'])));
								if(!empty($new_election)){
									if(!empty($election_status)){
										include '../includes/connect.inc.php';
											$query = $election->query("SELECT `name`, `status` FROM `election_name` WHERE `name`='$new_election'");
												$count = $query->rowCount();
													if($count == 1){
														echo $new_election .' already exists...<hr />';
													}else if($count == 0){
														$election_status = ($election_status == 'Active') ? 1 : 0 ;
															$stmt = $election->prepare("INSERT INTO `election_name`(name, status) VALUES(?, ?)");
																$stmt->bindValue(1, $new_election);
																$stmt->bindValue(2, $election_status);
																	if($stmt->execute()){
																		echo $new_election .' added...<hr />';
																	}else{
																		echo 'Error: Please try again...<hr />';
																	}
																	
													}else{
														echo 'Error: please try again...<hr />';
													}
									}else{
										echo 'Election Status not selected...<hr />';
									}
								}else{
									echo 'Name of Election field is empty...<hr />';
								}
						}
					}
				?>
				<h1><u>Add An Election</u></h1>
				<form action="add_election.php" method="POST">
					<h1>Election Name</h1>
						<input name="new_election" type="text" placeholder="New Election" /><br /><br />
					<h1>Election Status</h1>
						<select name="election_status">
							<option></option>
							<option>Active</option>
							<option>De-Active</option>
						</select><br /><br />
					<input name="add_election" type="submit" value="Add Election" />
				</form>
			</div>
		</div>	
	</div><!--End of content-->
<?php
	require '../includes/footer.inc.php';
?>