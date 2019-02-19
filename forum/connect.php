<?php
session_start();//start a session 

//new instance of  a PDO Object connection to be included on every page!
$dbh = new PDO('mysql:host=mysql.miguel.codes;dbname=scarif','elocochoa','gelato8A');

function makepass() {
$salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
srand((double)microtime()* 1000000);
$i=0;
while($i<10)   
{ 
$num = rand() % 33; 
$tmp = substr($salt,$num,1); 
$pass = $pass.$tmp;
 $i++; 
}
return $pass;
}
?>