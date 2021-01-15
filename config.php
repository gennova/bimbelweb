<?php
$host="localhost";
$user="u5621566_bimbel";
$password="Semarang2020";
$db = "u5621566_bimbel";
 
$con = mysqli_connect($host,$user,$password,$db);
 //crosscek
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{   
  	//echo "Connect";   
   }
 
?>