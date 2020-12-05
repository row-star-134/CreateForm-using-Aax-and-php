<?php
if(isset($_SESSION['email'])){
   echo $_SESSION['email'];
}
else{
   

   header("Location: http://localhost/exam/index.php"); 
}

?>