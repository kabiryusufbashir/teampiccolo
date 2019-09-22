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
              <input type="text" name="name" required="">
              <input type="text" name="subject" required="">
              <input type="email" name="email" required="">
              <input type="text" name="phone" required="">
              <textarea name="message" required=""></textarea>
              <input style="width:15%;" name="submit" type="submit" value="SEND">

            </form>
          </div>
          <div class="col-extra bg-white"></div>
        </div>
      </div>
    </main>
    <?php footer('../', 'bg-grey'); ?>
    <?php linkJs('../'); ?>
  </body>
</html>
