<?php include '../includes/functions.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php head('../'); ?>
  <body>
    <?php headerSection('../', 'Our Vision', 'Our vision is to be an ICT company of repute using cutting-edge technology to advance today\'s possibilities', 'Mr Umar Grema Muhammad', 'C.O.O Team Piccolo'); ?>
    <main>
      <div class="col-full bg-white">
        <h2><center>Contact Us</center></h2>
        <div class="col-full bg-white">
          <div class="col-sm-6">
            <form action="./index.php" method="post">
  						<div class="form-group">
  							<label for="name">NAME*</label>
  							<div class="input-group">
  								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  								<input class="form-control" type="text" name="name" required="">
  							</div>
  						</div>
  						<div class="form-group">
  							<label for="subject">SUBJECT*</label>
  							<div class="input-group">
  								<span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
  								<input class="form-control" type="text" name="subject" required="">
  							</div>
  						</div>
  						<div class="form-group">
  							<label for="email">EMAIL*</label>
  							<div class="input-group">
  								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  								<input class="form-control" type="email" name="email" required="">
  							</div>
  						</div>
  						<div class="form-group">
  							<label for="phone">PHONE*</label>
  							<div class="input-group">
  								<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
  								<input class="form-control" type="text" name="phone" required="">
  							</div>
  						</div>
  						<div class="form-group">
  							<label for="message">MESSAGE*</label>
  							<div class="input-group">
  								<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
  								<textarea class="form-control" name="message" required=""></textarea>
  							</div>
  						</div>
  						<div class="form-group">
  							<input style="width:15%;" class="form-control btn btn-success" name="submit" type="submit" value="SEND">
  						</div>
  					</form>
          </div>
          <div class="col-sm-6"></div>
        </div>
      </div>
    </main>
    <?php footer('../', 'bg-grey'); ?>
    <?php linkJs('../'); ?>
  </body>
</html>
