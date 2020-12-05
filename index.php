  <?php
  session_start();
  error_reporting(E_ERROR | E_PARSE);
  ?>
  <!doctype html>
  <html lang="en">

  <head>
    <title>Exam Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
    <style>
      .form {
        opacity: 90%;
        background-color: antiquewhite;
        width: 30%;
      }
    </style>
    <script>
      var count = 0, count1 = 0, count2 = 0, count3 = 0;
      function verify_input() {
        var email = document.getElementById('email');
        var password = document.getElementById("password");
        if (email.value == '' && password.value == '') {
          alert("Please fill the all field");
        }
        else {
          
          //call the data base for check the input
          var http = new XMLHttpRequest();
          http.open("GET","verify_login.php?email="+email.value+"&password="+password.value,false);
          http.send();
        
          if("1" == http.responseText){
            alert("Succesfully Logged In");
          
            window.location = "/exam/main/index.php";
            
            
          

          }
          else{
            alert("Please Enter Correct password")
            alert(http.responseText);
          }
        
        }

      }


      //password conformation function
    
      function conformation() {
        var a = document.getElementById("h1")
        var m = document.getElementById("h3");
        var span1 = document.getElementById("t1");
        var span2 = document.getElementById("t2");
        var span3 = document.getElementById("t3");
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var str = /[0-9]/;
        if ((a.value.length) >= 8) {
          t1.style.display = "none";
          count = 1;
        }
        else {
          t1.style.display = "";
          count = 0
        }
        if (a.value.match(format)) {
          t2.style.display = "none";
          count1 = 1;
        }
        else {
          t2.style.display = "";
          count1 = 0;
        }

        if (a.value.match(str)) {
          t3.style.display = "none";
          count2 = 1
        }
        else {
          t3.style.display = "";
          count2 = 0;
        }

        if (a.value == m.value) {
          h2.style.display = "none";
          count3 = 1;
        }
        else {
          h2.style.display = "";
          count3 = 0;
        }


      }
      //submit sign-up form
      function submitted() {
        var name=  document.getElementById("sign_name").value ; 
        var email = document.getElementById("sign_email-id").value;
        var a = document.getElementById("h1").value;
    
        var m = document.getElementById("h3").value;
        if (name!='' & email!='' & count == 1 && count1 == 1 && count2 == 1 && count3 == 1) {
      
          var http = new XMLHttpRequest();
          http.open("GET","sign_up.php?name="+name+"&email="+email+"&password="+a,false);
          http.send();
          if('Data insert succesfully' == http.responseText){
            alert("Succesfully Register Your data");
            swap_form("1")
          }
          else{
            alert("Not login");
          }
        }
        else {
          alert('Please check all field');
        }

      }
      function swap_form(a){
        if(a =='0'){
          document.getElementById("login_form").style.display ="none";
          document.getElementById("sign_up_form").style.display ="";
        }
        else{
          document.getElementById("login_form").style.display ="";
          document.getElementById("sign_up_form").style.display ="none";
        }
      }

    </script>
  </head>

  <body>


    <div class='container form mt-5' id='login_form'>
      <form class='p-4'>
        <h4 class='text-center'>Login</h4>
        <hr class='w-50'>
        <div class="form-group">
          <label for="title_username">Email address/username:</label>
          <input type="email" class="form-control" placeholder="Enter email /user" id="email" >
        </div>
        <div class="form-group">
          <label for="title_username">Password</label>
          <input type="password" class="form-control" placeholder="Enter Password" id="password">
        </div>
        <div class='text-center'>
          <button type='button' class="btn btn-primary p-3" type="button" value='Login'
            onclick='verify_input()'>Login</button>
        </div>
      </form>
      <div class='text-center'>
      <a href="#" class='text-center btn ' onclick='swap_form("0")' id='swap_sign'><b>Create Account</b></a>
    </div>
    </div>

    <div class='container form mt-5' id=sign_up_form style="display: none;">
      <form class='p-4'>
        <h4 class='text-center'>Registration Form</h4>
        <hr class='w-50'>
        <div class="form-group">
          <label for="title_username">Enter the Name:</label>
          <input type="email" class="form-control" placeholder="Enter email /user" id="sign_name">
        </div>
        <div class="form-group">
          <label for="title_email">Enter Email-id</label>
          <input type="email" class="form-control" placeholder="Enter email /user" id="sign_email-id">
        </div>
        <div class="form-group">
          <label for="title_password">Password</label>
          <input type="password" class="form-control" id="h1" onkeyup="conformation()">
          <span class="alert alert-danger my-1" id="t1" style="display:block;">*minimum 8 character required</span><br>
          <span class="alert alert-danger my-1" id="t2" style="display:block;">*at least one symbol required</span><br>
          <span class="alert alert-danger my-1" id="t3" style="display:block">*at least one number required</span><br>
        </div>
        <div class="form-group">
          <label for="title_conformapass">Conform Password</label>
          <input type="password" class="form-control" id="h3" onkeyup="conformation()">
          <span  class="alert alert-danger my-1" id="h2" style="display:block">Password Not match</span>
        </div>
        <div class='text-center'>
          <button type='button' class="btn btn-primary p-3" type="button" value='Login'
            onclick='submitted()'>Sign Up</button>
        </div>
      </form>
      <div class='text-center'>
        <a href="#" class='text-center btn ' onclick='swap_form("1")' id='swap_login'><b>Already have Account</b></a>
      </div>
    </div>

  </body>

  </html>