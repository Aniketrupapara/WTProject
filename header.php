<?php 


require_once("connectiondb.php");


?>


<nav class="navbar navbar-expand-lg  navbar-dark topnav">
		  <a class="navbar-brand" href="#">Manufecturing Manager</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item <?php if($page=="home"){ echo 'active'; } ?>">
				<a class="nav-link" href="index.php" >Home</a>
			  </li>
			  
			  
			  <li class="nav-item" <?php if($page=="about"){ echo 'active'; } ?>">
				<a class="nav-link" href="aboutus.php">About Us</a>
			  </li>
			<li class="nav-item" <?php if($page=="contect"){ echo 'active'; } ?>">
				<a class="nav-link" href="contactus.php">Contact Us</a>
			  </li>
			</ul>
			<form class="form-inline my-2 my-lg-0" action="admin/login.php">
			  
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log in</button>
			</form>
		  </div>
		</nav>
