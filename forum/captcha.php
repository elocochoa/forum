<?php
//random number and session set...
$num = mt_rand(1000,9999);
echo $num;
$_SESSION['captcha'] = $num;
?>