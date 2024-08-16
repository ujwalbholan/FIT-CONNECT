<?php
  $servername = "localhost";
  $usernamme = "root";
  $password = "";
  $dbname = "fit-connect";
  $port = 1000;

  $conn = new mysqli($servername,$usernamme,$password,$dbname,$port);
  
  if(!$conn){
    echo "something went wrong";
  }
?>