<?php
	require '../includes/head.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<h1><u>View Voters</u></h1>
					<?php
						include '../includes/connect.inc.php';
							
							$query = $election->query("SELECT * FROM `election_users` ORDER BY `id` DESC");
								if($query->rowCount() > 0){
									echo '<h1>Total Voters: '.$total_voters = $query->rowCount() .'</h1>';
									echo '<table>
											<tr>
												<th>Name</th>
												<th>Date of Birth</th>
												<th>Gender</th>
											</tr>';
										while($query_row = $query->fetch()){
											$first_name = $query_row['first_name'];
											$last_name = $query_row['last_name'];
											$other_name = $query_row['other_name'];
											$dob = $query_row['dob'];
											$gender = $query_row['gender'];
											$full_name = $first_name.' '.$last_name.' '.$other_name;	
													echo '
														<tr>
															<td>'.$full_name.'</td>
															<td>'.$dob.'</td>
															<td>'.$gender.'</td>
														</tr>
													';
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