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
          <div class="col-fill">
            <form action="index.html" method="post">
              <input placeholder="Full Name" type="text" name="name" required="">
              <input placeholder="Subject" type="text" name="subject" required="">
              <input placeholder="Email" type="email" name="email" required="">
              <input placeholder="Phone" type="text" name="phone" required="">
              <textarea name="message" required=""></textarea>
              <input name="submit" type="submit" value="SEND">
            </form>
          </div>
          <div class="col-extra bg-white">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1380.029350253521!2d8.604651825840886!3d11.952856080372493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x11ae8265683aac83%3A0xd477b851b4bad822!2sIbrahim%20Kunya%20Housing%20Estate!5e0!3m2!1sen!2sng!4v1569176345363!5m2!1sen!2sng" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </main>
    <?php footer('../', 'bg-grey'); ?>
    <?php linkJs('../'); ?>
  </body>
</html>
