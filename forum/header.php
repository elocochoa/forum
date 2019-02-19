<!DOCTYPE html>
<?php 
  ob_start();
  session_start();
?>
<html lang="eng">
  <head>
  <link href="https://fonts.googleapis.com/css?family=Bigelow+Rules|Permanent+Marker|Poiret+One|Rock+Salt|Shadows+Into+Light" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>
    PHP-MySQL forum
  </title>
</head>



<body>

  <div class="nav">
    <div id="navbar" class="body_table">
      <h1>
        <a href="index.php">
          MOG. forum
        </a>
      </h1>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
      <div class="topnav" id="myTopnav">
        <a class="effect-underline" href="create_cat.php">
          Categories
        </a>
        
        <a class="effect-underline" onclick="toggleup()"id="log_in" >
          Sign Up
        </a>
        <?php
          include 'signin.php';
            
          if (empty($_SESSION['users_name'])){
            echo '<a class="effect-underline" onclick="togglein()">Sign In</a>';
          }
          else{
            echo '<a class="effect-underline" href="logout.php">Log Out</a>';
          }
        ?>
        <a>
          <?php
            include 'signin.php';
    
            if ($_SESSION['users_name'] != ''){
              echo $_SESSION['users_name'];
            }
            else {
              echo 'Not Logged In';
            }

          ?>
        </a>
      </div>
    </div>
  </div>

  </div>














