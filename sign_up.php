<?php
  include("connection_sql.php");
 
  if($conn){
    $name = $_GET['name'];
    $email =$_GET['email'];
    $password =$_GET['password'];
      $query = "INSERT INTO sign_up(name, email ,password) values('$name','$email','$password')"  ;
      $insert = mysqli_query($conn,$query);
      if($insert){
          echo "Data insert succesfully";
      }
      else{
          echo "Not inserted any value";
      }
  }
  else{
    echo "connection not succesfully";
  }
?>