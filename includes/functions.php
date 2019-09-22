<?php
  function head($path){
    echo
    '<head>
      <meta charset="utf-8">
      <title>Team Piccolo Global Enterprises</title>
      <link rel="icon" href="'.$path.'/images/favicon.ico">
      <link rel="stylesheet" href="'.$path.'/css/master.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>';
  }

  function nav($path){
    echo
    '<nav>
      <ul>
        <li><a href="'.$path.'/index.php">Home</a></li>
        <li><a href="'.$path.'/our-team/index.php">Our Team</a></li>
        <li><a href="'.$path.'/e-learning/index.php">Web Development Class</a></li>
        <li><a href="'.$path.'/contact-us/index.php">Contact Us</a></li>
      </ul>
    </nav>';
  }
?>
