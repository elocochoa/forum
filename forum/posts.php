<?php
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

	$topicid = $_GET['cat_id'];
	$User_id = $_SESSION['users_id'];

	if ($_SESSION['users_name'] != ''){
		if ($_POST['submit'] == 'Comment'){
		    $comment = $_POST['comment'];
		    $sql = $dbh->prepare("INSERT INTO Replies (post_content,post_date,post_topic,post_by) values ('$comment',now(),'$topicid','$User_id')");
		    $sql->execute();
		    
		}
	}

	$topicsql = $dbh->prepare("select cat_name from Categories where cat_id = '$topicid'"); 
	$topicsql->execute();
	$column = $topicsql->fetch();
	$topicname = $column['cat_name'];

	?>
	<div class="center_box" >
		<?php
			echo '<h1 class="t_name">>>'.$topicname.'<<</h1><br>_______________________<br><br><br>';
			//now show the posts!!!!

			
			$postsql = $dbh->prepare("select post_content from Replies where post_topic = '$topicid'");
			$postsql->execute();
			while ($row = $postsql->fetch()){
			    $content = $row[0];
			    echo $content.'<br><br><br>___________<br><br><br>';
			    
			}
			
		?>
		<br>
		<div class="bottom_form" >
		<form action = "posts.php?cat_id=<?php echo $topicid;?>" method="post">
			Comment on the Category <br>
		    <textarea name="comment"></textarea><br>
			<input type="submit" name="submit" value="Comment"><br><br><br><br>   
		</form>
	</div>
	</div>
	<?php
	include 'footer.php';
?>
    
    
    
    
    
    
    
    
    
