<?php
	require '../includes/head.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<h1><u>Delete Candidate</u></h1>
					<?php
						include '../includes/connect.inc.php';
							$candidate_id = htmlspecialchars(htmlentities(stripslashes($_GET['id'])));
								$query = $election->query("SELECT * FROM `election_candidate` WHERE `candidate_id`='$candidate_id'");
									if($query->rowCount() > 0){
											$sql = $election->query("DELETE FROM `election_candidate` WHERE `candidate_id`='$candidate_id'");
												if($sql){
													echo 'Deleted Successfully...<a href="./view_candidate.php">Click here to go back...</a><hr />';
												}else{
													echo 'Error: please try again...<hr />';
												}
										?>
										
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