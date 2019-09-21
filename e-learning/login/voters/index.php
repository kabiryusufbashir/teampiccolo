<?php
	require '../includes/head_voters.inc.php';
?>
	<div id="content">
		<div class="col-full">
			<form action="./vote.php" method="POST">
				<h1>Select Election Type</h1>
				<select name="election_type">
					<option></option>
					<?php
						include '../includes/connect.inc.php';
							$sql = $election->query("SELECT `name` FROM `election_name` WHERE `status`='1' ORDER BY `name`");
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
			<input name="select_election" type="submit" value="Select Election" />
			</form>
		</div>	
	</div><!--End of content-->
<?php
	require '../includes/footer.inc.php';
?>			