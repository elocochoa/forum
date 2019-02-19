<?php
//create_cat.php
include 'connect.php';
?>
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
        
        <a href="index.php" class="effect-underline" "id="log_in" >
          Sign Up
        </a>
        <a href="index.php"class="effect-underline">
        	Sign In
    	</a>
          
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
  <?php
  echo'<div class="center_box">';       
$submit = $_POST['submit'];
if ($submit == 'Add Category'){
    $catname = $_POST['catname'];
    $catdesc = $_POST['catdesc'];
    $inssql = $dbh->prepare("INSERT INTO Categories (cat_name,cat_descrip) values (?,?)");
    $inssql->bindValue(1,$catname,PDO::PARAM_STR);
    $inssql->bindValue(2,$catdesc,PDO::PARAM_STR);   
    $inssql->execute();
    
}

?>


<br><br>
<form action="create_cat.php" method="post">
<input placeholder="New Category Name" type="text" name="catname"><br>
<input placeholder="New Category Description"type="text" name="catdesc"><br>
<input type="submit" name="submit" value="Add Category">
</form>

<?php
//show categories so people can choose
$showcat = $dbh->prepare("SELECT * FROM Categories");
$showcat->execute();
while ($column = $showcat->fetch()){
    $id              = $column[0];//this could also be $row['id']; 
    $category        = $column[1];//this could also be $row['topicname'];
    $categorydescrip = $column[2];

    echo '<div class = "cat_square" style= "border: solid; width: 19em; height: 9em;">';
		echo'<a " href="posts.php?cat_id='.$id.'">'.$category.'</a>';
		echo'<p style= "text-align: center;">'.$categorydescrip.'</p>';
    echo '</div>';	
}





echo '</div>';
?>
<?php
include 'footer.php';
?>