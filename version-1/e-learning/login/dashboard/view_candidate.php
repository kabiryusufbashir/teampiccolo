<?php
	require '../includes/head.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<h1><u>View Candidate</u></h1>
					<?php
						include '../includes/connect.inc.php';
							$query = $election->query("SELECT * FROM `election_candidate`");
								if($query->rowCount() > 0){
										while($query_row = $query->fetch()){
											$candidate_id = $query_row['candidate_id'];
											$full_name = $query_row['full_name'];
											$dob = $query_row['dob'];
											$position = $query_row['position'];
											$candidate_photo = $query_row['candidate_photo'];
													$query_2 = $election->query("SELECT `name` FROM `election_name` WHERE `election_id`='$position'");
														$query_2_row = $query_2->fetch();
															$election_name = $query_2_row['name'];
													echo 
													'<div class="col-half">
														<img src="'.$candidate_photo.'" /><br />
														<h2>Full Name: '.$full_name.'<br />
														Date of Birth: '.$dob.'<br />
														Position: '.$election_name.'<br />
														<a href="./candidate_edit.php?id='.$candidate_id.'">Edit</a><br />
														<a href="./candidate_delete.php?id='.$candidate_id.'">Delete</a><br />
														<a href="./candidate_photo.php?id='.$candidate_id.'">Change Photo</a></h2>
													</div>';
										}
									echo '</table>';
								}else{
									echo '<h1>No Record found...<hr /></h1>';
								}
					?>
			</div>
		</div>	
	</div><!--End of content-->
<?php
	require '../includes/footer.inc.php';
?>