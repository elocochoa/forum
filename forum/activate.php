<?php
include 'connect.php';
$encryptedemail = $_GET['link'];
$decrypted = base64_decode($encryptedemail);
$upsql = $dbh->prepare("update Users set active = '1' where users_email = ?");
$upsql->bindValue(1,$decrypted,PDO::PARAM_STR);
$upsql->execute();
header ("Location: login.php");






?>