<?php
	require '../includes/head.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<h1><u>View Election</u></h1>
					<?php
						include '../includes/connect.inc.php';
							$query = $election->query("SELECT * FROM `election_name`");
								if($query->rowCount() > 0){
									echo '<table>
											<tr>
												<th>Name</th>
												<th>Status</th>
												<th>Action</th>
											</tr>';
										while($query_row = $query->fetch()){
											$election_id = $query_row['election_id'];
											$election_name = $query_row['name'];
											$election_status = $query_row['status'];
												$election_status = ($election_status == 1) ? 'Active' : 'De-Active';
													echo '
														<tr>
															<td>'.$election_name.'</td>
															<td>'.$election_status.'</td>
															<td><a href="./election_edit.php?id='.$election_id.'">Edit</a> | <a href="./election_delete.php?id='.$election_id.'">Delete</a></td>
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