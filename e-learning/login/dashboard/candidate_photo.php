<?php
	require '../includes/head.inc.php';
?>
	<div id="content">
		<div class="row">
			<div class="col-full">
				<h1><u>Candidate Photo</u></h1>
				<?php
					
					$candidate_id = htmlspecialchars(htmlentities(stripslashes($_GET['id'])));
					
					if(isset($_POST['upload_photo'])){
						$image_name = htmlspecialchars($_FILES['image']['name']);
						$image_size = htmlspecialchars($_FILES['image']['size']);
						$image_type = htmlspecialchars($_FILES['image']['type']);
						$image_tmp_name = htmlspecialchars($_FILES['image']['tmp_name']);
						$image_name_ext = substr($image_name, strpos($image_name, '.') + 1);
						$image_new_name = date('Ynjgi').'.'.$image_name_ext;
						$image_path = '../images/media/candidate/'.$image_new_name;
							if($image_name_ext == 'jpg' || $image_name_ext == 'jpeg' || $image_name_ext == 'png' || $image_name_ext == 'gif'){
								if($image_type == 'image/jpeg' || $image_type == 'image/png' || $image_type == 'image/gif' || $image_type == 'image/jpg'){
									$location = '../images/media/candidate/'.$image_new_name;
										if(move_uploaded_file($image_tmp_name, $location)){
											include '../includes/connect.inc.php';
												$sql = $election->query("SELECT `candidate_photo` FROM `election_candidate` WHERE `candidate_id`='$candidate_id'");
													if($sql->rowCount() == 1){
														$sql_row = $sql->fetch();
															$candidate_photo = $sql_row['candidate_photo'];
																if(!empty($candidate_photo)){
																	if(unlink($candidate_photo)){
																		$query = $election->query("UPDATE `election_candidate` SET `candidate_photo`='$location' WHERE `candidate_id`='$candidate_id'");
																				if($query){
																					echo 'Image uploaded...<a href="./view_candidate.php">Click here to go back...</a><hr />';
																				}else{
																					echo 'Error: please try again...<hr />';
																				}
																	}else{
																		echo 'Error: Image cannot be deleted...<hr />';
																	}
																}else{
																	$query = $election->query("UPDATE `election_candidate` SET `candidate_photo`='$location' WHERE `candidate_id`='$candidate_id'");
																		if($query){
																			echo 'Image uploaded...<a href="./view_candidate.php">Click here to go back...</a><hr />';
																		}else{
																			echo 'Error: please try again...<hr />';
																		}
																}
													}else{
														echo 'Error: please try again...<hr />';
													}
										}else{
											echo 'Error: please try again...<hr />';
										}
								}else{
									echo 'File must be an Image...<hr />';
								}
							}else{
								echo 'Please choose a photo...<hr />';
							}
							
							
					}
				?>
				<form action="candidate_photo.php?id=<?php echo $candidate_id; ?>" method="POST" enctype="multipart/form-data">
					<h1>Choose a Photo</h1>
						<input name="image" type="file"> <br /><br />
						<input name="upload_photo" type="submit" value="Upload Photo" />
				</form>
			</div>
		</div>	
	</div><!--End of content-->
<?php
	require '../includes/footer.inc.php';
?>