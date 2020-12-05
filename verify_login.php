<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
    include("connection_sql.php");
    if($conn){
        $email =$_GET['email'];
        $password =$_GET['password'];
       
        $query = "SELECT * FROM sign_up WHERE email='$email' AND  password='$password'";
        $row = mysqli_query($conn,$query);
        if($row)
        {
         $count = mysqli_num_rows($row);
        
        if($count){
        
            $_SESSION['email'] =$email;
            echo "1";
            
            
        }
        else{
            echo "Please Check your username and password";
            
        }
    }
    }
    else{
            echo "You are not connected with server ";
            
    }
?>