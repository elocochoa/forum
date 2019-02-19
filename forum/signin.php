<?php
    ob_start();
  if ($_POST['submit'] == 'Log In'){
    //reads the submit button
    $username2 = $_POST['email'];
    //get the username
    $password2 = $_POST['password'];
    //gets the password
    $encrypted = sha1($password2);
    //above is the encrypted password that we can call the database with 
    //need to put tablenames in front because we are calling 2 tables!! 
    $sql = $dbh->prepare("select users_id,users_name from Users where users_email = ? and users_pass = ?");
    
    
    //looking for the above query to generate at least one match
    $sql->bindValue(1,$username2,PDO::PARAM_STR);
    //bind the value of the first question mark and make sure it's an Integer
    $sql->bindValue(2,$encrypted,PDO::PARAM_STR);  
    //bind the value of the second question mark and make sure it's a string!
    $sql->execute();
      
    $row  = $sql->fetch();
    //no loop because we're looking for 1 result
    $id   = $row['users_id'];
    $name = $row['users_name'];
    
    //get values from the query 
    if (empty($name)){
      echo 'We\'re sorry, your credentials are not matching our database. Please try again';
    }
    else{
        session_start();
      $_SESSION['users_id'] = $id;
      $_SESSION['users_name'] = $name;    
    }
  }
?>