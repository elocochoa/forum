<?php
  if ($_POST['submit'] == 'Register'){
    echo "HIT";        
    if ($_POST['captcha'] != $_SESSION['captcha']){
      $msg = 'TRY AGAIN';
    }

    else {
      var_dump($_POST);
      $fullname = $_POST['fullname'];
      $users_pass = $_POST['users_pass'];
      $email = $_POST['email'];
    
      $checksql = $dbh->prepare("select count(users_id) as numusers from Users where users_email = ?");
      $checksql->bindValue(1,$email,PDO::PARAM_STR);
    
      $checksql->execute();
    
      print_r($checksql->errorInfo());
      $numusers = $checksql->fetch();
      if ($numusers['numusers'] > 0){
        echo 'It appears your email is already in our database. Please click <a href="reset.php">here</a> to reset your password';
      }
      else{
        $pass= $users_pass;
        $encrypt=sha1($pass);
    
        $inssql = $dbh->prepare("INSERT INTO Users (users_name,users_pass,users_email,users_date)VALUES (?,?,?,now())");
   
        $inssql->bindValue(1,$fullname,PDO::PARAM_STR);     
        $inssql->bindValue(2,$encrypt,PDO::PARAM_STR);   
        $inssql->bindValue(3,$email,PDO::PARAM_STR);      
        $inssql->execute();    
        $link = base64_encode($email);
        $content = 'Thank you...your password is '.$pass.'. Please click the following link to activate: <a href="http://mm214.com/webd166members/activate.php?link='.$email;
            
        echo $pass;
        
        
    
      }
    }
  } 
?>