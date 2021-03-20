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
          <?php
						if(isset ($_POST['submit'])){

							$fname = htmlentities($_POST['name']);
							$from = htmlentities($_POST['email']);
							$to = 'info@teampiccolo.com';
							$phone = htmlentities($_POST['phone']);
							$subject = htmlentities($_POST['subject']);
							$message = htmlentities($_POST['message']);
							$body = '<div style="font-size:17px;">'.$message .'</div> <br />Name: <b>'.$fname .'</b><br /> Phone: <b>'.$phone.'</b><br />Email: <b>'.$from.'</b><br /> Message was sent from <a href="www.teampiccolo.com"><b>teampiccolo.com</b></a>';

							$encoding = "utf-8";

							// Preferences for Subject field
							$subject_preferences = array(
								"input-charset" => $encoding,
								"output-charset" => $encoding,
								"line-length" => 76,
								"line-break-chars" => "\r\n"
							);

							// Mail header
							$header = "Content-type: text/html; charset=".$encoding." \r\n";
							$header .= "From: ".$from." <".$from."> \r\n";
							$header .= "MIME-Version: 1.0 \r\n";
							$header .= "Content-Transfer-Encoding: 8bit \r\n";
							$header .= "Date: ".date("r (T)")." \r\n";
							$header .= iconv_mime_encode("Subject", $message, $subject_preferences);

							// Send mail

							if($fname && $from && $subject && $body){
								mail($to, $subject, $body, $header);
								echo "<center>Thank you for your mail, We will get back to you soon...</center>";
								echo '
									<script type="text/javascript">
										function counter(time, url){
											var interval = setInterval(function(){
												time = time - 1;
														if(time == 0){
															clearInterval(interval);
															window.location = url;
														}
											}, 1000)
										}
										counter(5, "index.php")
									</script>
								';
							}else{
                echo 'Please try again later. Thank You!!!';
              }
						}
					?>
          <div class="col-fill">
            <form action="index.php" method="post">
              <input placeholder="Full Name" type="text" name="name" required="">
              <input placeholder="Subject" type="text" name="subject" required="">
              <input placeholder="Email" type="email" name="email" required="">
              <input placeholder="Phone" type="text" name="phone" required="">
              <textarea name="message" required="" placeholder="Message"></textarea>
              <input name="submit" type="submit" value="SEND">
            </form>
          </div>
          <div class="col-extra bg-white" style="margin-bottom: 2%;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1380.029350253521!2d8.604651825840886!3d11.952856080372493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x11ae8265683aac83%3A0xd477b851b4bad822!2sIbrahim%20Kunya%20Housing%20Estate!5e0!3m2!1sen!2sng!4v1569176345363!5m2!1sen!2sng" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            For Enquiries, You can contact us on:<br>
            <span style="width: 10%; float:left;">
              <img style="width: 50px; position:relative; top:15px;" src="../images/tel.png" alt="Telphone Icon">
            </span>
            <span style="width: 80%; position:relative; top:10px; left: 15px; float:left;">
             08032338280<br> 08068593127<br> info@teampiccolo.com
            </span>
          </div>
        </div>
      </div>
    </main>
    <?php footer('../', 'bg-grey'); ?>
    <?php linkJs('../'); ?>
  </body>
</html>
