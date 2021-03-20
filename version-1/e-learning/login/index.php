<?php
	session_start();
?>

<html>
	<head>
		<title>Login - Web Development Class</title>
		<link rel="Icon" type="image/ico" href="../images/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/responsive.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script type="text/javascript"> 
			//<![CDATA[ 
				var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
				document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
			//]]>
		</script>
	</head>
	<body>
		<div id="container">
			<div class="banner">
				<img src="../images/banner.jpg" alt="Banner of Web Development Class" title="Banner" />
			</div><!--End of Banner-->
			<div class="row">
				<div class="logo">
					<img src="../images/logo.png" />
				</div><!--End of Logo-->	
			</div>
			<div class="row">
				<div class="title">
					Latest Update
				</div>
				<div class="latest_update">
					<marquee direction="left" scrollamount="4" behavior="scroll">
						<span>Welcome to Team Piccolo Global Enterprises Web Development Class!!! &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span>
						<span>Welcome to Team Piccolo Global Enterprises Web Development Class!!! &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span>
						<span>Welcome to Team Piccolo Global Enterprises Web Development Class!!! &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span>
					</marquee>
				</div>
			</div>
			<div class="row">
				<nav>
					<ul>
						<li><a href="../index.php">Home</a></li>
						<li><a href="#">Tutorials</a>
							<ul>
								<li><a href="../tutorials/html-css.php">HTML & CSS</a></li>
								<li><a href="../tutorials/mysql.php">MySQL</a></li>
								<li><a href="../tutorials/php.php">PHP</a></li>
								<li><a href="../tutorials/pdo.php">PDO</a></li>
								<li><a href="../tutorials/jquery.php">Jquery</a></li>	
							</ul>
						</li>
						<li><a href="../pdf/index.php">PDF</a></li>
						<li><a href="../login/index.php">Login</a></li>
					</ul>
				</nav><!--End of Navigation-->
			</div>
			<div id="content">
				<div class="row">
					<div class="col-half" style="float:right;">
						<?php
							if(isset($_POST['login'])){
								if(isset($_POST['username'], $_POST['password'])){
									$username = htmlspecialchars(htmlentities(stripslashes($_POST['username'])));
									$password = htmlspecialchars(htmlentities(stripslashes($_POST['password'])));
									$password_hash = md5('qwertyuioplkjhgfdsa'.$password.'mnbvcxzasdfghjklpoiuytrewq');
									
										if(!empty($username)){
											if(!empty($password)){
												include './includes/connect.inc.php';
													$query = $election->query("SELECT `user_id`, `password` FROM `election_login_details` WHERE `user_id`='$username' && `password`='$password_hash'");
														$count = $query->rowCount();
															if($count == 1){
																$query_2 = $election->query("SELECT `user_id`, `password`, `category` FROM `election_login_details` WHERE `user_id`='$username' && `password`='$password_hash'");
																	$query_2_row = $query_2->fetch();
																		$category = $query_2_row['category'];
																			$_SESSION['user_id'] = $username;
																			$_SESSION['category'] = $category;
																				if($_SESSION['category'] == 1){
																					echo '
																						<script type="text/javascript">
																							window.location = "./dashboard/index.php";
																						</script>';
																				}else if($_SESSION['category'] == 2){
																					echo '
																						<script type="text/javascript">
																							window.location = "./voters/index.php";
																						</script>';
																				}else{
																					echo 'Please check your Login Credentials and try again...<hr />';
																				}
															}else{
																echo 'Invalid Login Details<hr />';
															}
											}else{
												echo 'Password field empty...<hr />';
											}
										}else{
											echo 'Username Name field empty...<hr />';
										}
								}
							}
						?>
						<form id="login_form" action="index.php" method="POST">
							<input name="username" class="username" type="text" placeholder="username" />
							<input name="password" class="password" type="password" placeholder="password" />
							<input name="login" type="submit" value="Login" />
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-half">
						<form action="index.php" method="POST" id="form_sign_up">
							<div class="col-full">
								<h2>Don't have an Account?</h2>
							</div>
							<div class="col-full">
								<?php
									if(isset($_POST['submit'])){
										if(isset($_POST['first_name'], $_POST['last_name'], $_POST['other_name'], $_POST['dob'], $_POST['gender'], $_POST['user_name'], $_POST['password'])){
											
											$first_name = htmlspecialchars(htmlentities(stripslashes($_POST['first_name'])));
											$last_name = htmlspecialchars(htmlentities(stripslashes($_POST['last_name'])));
											$other_name = htmlspecialchars(htmlentities(stripslashes($_POST['other_name'])));
											$dob = htmlspecialchars(htmlentities(stripslashes($_POST['dob'])));
											$gender = htmlspecialchars(htmlentities(stripslashes($_POST['gender'])));
											$user_name = htmlspecialchars(htmlentities(stripslashes($_POST['user_name'])));
											$password = htmlspecialchars(htmlentities(stripslashes($_POST['password'])));
											$password_hash = md5('qwertyuioplkjhgfdsa'.$password.'mnbvcxzasdfghjklpoiuytrewq');
											
											$code = rand(1111, 9999);
												
												if(!empty($first_name)){
													if(!empty($last_name)){
														if(!empty($dob)){	
															if(!empty($gender)){
																if(!empty($user_name)){
																	if(!empty($password)){
																		include './includes/connect.inc.php';
																			$query = $election->query("SELECT `user_id` FROM `election_login_details` WHERE `user_id`='$user_name'");
																				$count = $query->rowCount();
																					if($count < 1){
																						$stmt = $election->prepare("INSERT INTO election_login_details(user_id, password, category) VALUES(?, ?, ?)");
																						$stmt->bindValue(1, $user_name);
																						$stmt->bindValue(2, $password_hash);
																						$stmt->bindValue(3, 2);
																							$stmt->execute();
																								
																						$stmt_2 = $election->prepare("INSERT INTO election_users(first_name, last_name, other_name, dob, gender, user_id, confirmation_code) VALUES(?, ?, ?, ?, ?, ?, ?)");
																						$stmt_2->bindValue(1, $first_name);
																						$stmt_2->bindValue(2, $last_name);
																						$stmt_2->bindValue(3, $other_name);
																						$stmt_2->bindValue(4, $dob);
																						$stmt_2->bindValue(5, $gender);
																						$stmt_2->bindValue(6, $user_name);
																						$stmt_2->bindValue(7, $code);
																							$stmt_2->execute();
																								echo '<br / > <h3>Registration Successfully... Click here to <a href="./index.php#login_form">login</a></h3><hr />';
																								
																					}else{
																						echo '<h3><b>'.$user_name .'</b> already exists...</h3><hr />';
																					}
																					
																			
																	}else{
																		echo '<h3>Password field empty!</h3><hr />';
																	}
																}else{
																	echo '<h3>User Name field empty!</h3><hr />';
																}
															}else{
																echo '<h3>Gender not selected!</h3><hr />';
															}
														}else{
															echo '<h3>Date of Birth not selected!</h3><hr />';
														}
													}else{
														echo '<h3>Last Name field empty!</h3><hr />';
													}
												}else{
													echo '<h3>First Name field empty!</h3><hr />';
												}	
										}
									}
								?>
							</div>
							<div class="col-full">
								<input name="first_name" type="text" placeholder="First Name" />
							</div>
							<div class="col-full">
								<input name="last_name" type="text" placeholder="Last Name" />
							</div>
							<div class="col-full">
								<input name="other_name" type="text" placeholder="Other Name" /><br /><br />
							</div>
							<div class="col-half">
								<strong>Date of Birth:</strong><br />
								<input name="dob" type="date" /><br /><br />
							</div>
							<div class="col-half">
								<strong>Gender:</strong><br />
								Male <input type="radio" name="gender" value="Male" checked="checked" /> 
								Female <input type="radio" name="gender" value="Female" />
							</div>
							<div class="col-full">
								<input name="user_name" type="text" placeholder="Username" />
							</div>
							<div class="col-full">
								<input name="password" type="password" placeholder="Password" /><br /><br />
							</div>
							<div class="col-full">
								<input name="submit" type="submit" value="Sign Up" />
							</div>
						</form>
					</div>
					<div class="col-half">
						<img src="../images/sign_up.jpg" />
					</div>
				</div>	
			</div><!--End of content-->
			<?php
				include '../includes/footer.inc.php';
			?>
		</div><!--End of container-->
		<script language="JavaScript" type="text/javascript">
			TrustLogo("https://teampiccolo.com", "CL1", "none");
		</script>
		<a href="https://ssl.comodo.com" id="comodoTL">Comodo SSL</a>
	</body>
</html>