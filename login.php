<!doctype html>
<html lang="en">
  <head>
      
       <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/my.css" >
	<link rel="stylesheet" href="css/w3.css" >
      
    <!-- Required meta tags -->
    
        <title>Login page</title>
		<link rel="stylesheet" href="css/loginc.css" >
	

  </head>
  <body>
     
      <?php $page = "login";
      include 'header.php'; ?>
	
      <div class="login-box">
	<form name="login" action="admin/index.php"  method="post">
	
	<h1>Login</h1>
	
	
	<div class="textbox">
	<i class="fas fa-user" aria-hidden="true"></i>
	<input type="text" placeholder="username" name="uname" value="">
	
	</div>
 
	<div class="textbox">
	<i class="fas fa-lock" aria-hidden="true"></i>
	<input type="password" placeholder="password" name="pass" value="">
	</div> 
  
  <input class="btn" type="submit" name="" value="Sign in">
</form> 
          </div>
      
      <!-- Footer -->
		
		<!--<?php include 'footer.php'; ?>-->
      
  </body>
  </html>