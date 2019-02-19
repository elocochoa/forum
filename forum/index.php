    	<?php
    	//index.php
    	include 'connect.php';
    	include 'header.php';
    	?>
    <div class="top_image">
      <!--here starts the signup form code-->
      <div id="box" class="sign_in invisible">
        <div onclick="toggleColor()" class="closer">x</div>
        <?php
          include 'signup.php';
          echo $msg;
        ?>
        <div id="box2" class="invisible">
          <form action ="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="text" name="fullname" placeholder="Full Name Here" required><br>
            <input type="password" name="users_pass" placeholder="Create Password" required><br>
            <input type="email" name="email" placeholder="Email Here" required><br>
              
            <?php
              //include captcha from other script
              include 'captcha.php';  
            ?>    
            <br>
            <input type="text" name="captcha" placeholder="Enter the above">
            <br>
            <input type="submit" name="submit" value="Register">
          </form>
        </div>
      </div>
        
      <!--here starts the signin form code-->
      <div id="box3" class="sign_in invisible">
        <form action="index.php" method="post">
          Username: <input type="text" name="email" placeholder="email address"><br>
          Password: <input type="password" name="password"><br>
          <input type="submit" name="submit" value="Log In">
        </form>
      </div>
    </div>



    <?php
      include 'footer.php';
    ?>
  </body>
</html>