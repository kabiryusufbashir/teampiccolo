<?php
  function head($path){
    echo
    '<head>
      <meta charset="utf-8">
      <title>Team Piccolo Global Enterprises</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		  <link rel="icon" href="'.$path.'/images/favicon.ico">
      <link rel="stylesheet" href="'.$path.'/css/master.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>';
  }

  function headerSection($path, $sloganHeading, $sloganTitle, $sloganAuthor, $sloganRank){
    echo
    '<header>
      <div class="header-content">
        <div class="logo">
          <img src="'.$path.'/images/logo.png" alt="Team Piccolo Global Enterprises Logo">
        </div>
        <div class="nav-section">
          <nav>
            <ul>
              <li><a href="'.$path.'index.php">Home</a></li>
              <li><a href="'.$path.'our-team/index.php">Our Team</a></li>
              <li><a href="'.$path.'e-learning/index.php">Web Development Class</a></li>
              <li><a href="'.$path.'contact-us/index.php">Contact Us</a></li>
            </ul>
          </nav>
        </div>
        <div class="toggle-btn">
          <img src="'.$path.'/images/toggle_btn.png" alt="Toggle button">
        </div>
      </div>
      <div class="slogan">
        <h1>'.$sloganHeading.'</h1>
        <h2>"'.$sloganTitle.'"</h2>
        <h3>'.$sloganAuthor.'</h3>
        <h4><i>'.$sloganRank.'</i></h4>
      </div>
    </header>';
  }

  function footer($path, $background){
    echo '
    <footer class="'.$background.'">
       <p>
         Team Piccolo Global Enterprises Copyright &copy; '.date('Y').' All Rights Reserved
      </p>
      <div class="contact-links">
        <a
          href="https://web.facebook.com/Teampiccolo/"
          target="_blank"
          class="btn contact-details"
          ><i class="fab fa-facebook-square"></i></a
        >
        <a
          id="profile-link"
          href="#"
          target="_blank"
          class="btn contact-details"
          ><i class="fab fa-github"></i></a
        >
        <a
          href="https://twitter.com/Piccolo_OEnterp/"
          target="_blank"
          class="btn contact-details"
          ><i class="fab fa-twitter"></i></a
        >
      </div>
    </footer>
    ';
  }

  function linkJs($path){
    echo '
    <script type="text/javascript" src="'.$path.'/js/jquery.js"></script>
    <script type="text/javascript" src="'.$path.'/js/script.js"></script>
    ';
  }
?>
