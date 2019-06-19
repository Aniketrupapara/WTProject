<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/my.css" >
	<link rel="stylesheet" href="css/about.css" >
      <link rel="stylesheet" href="css/w3.css" >
	

    <title>Manufecturing Manager</title>
  </head>
  <body>
		<?php $page = "about";
      include 'header.php'; ?>
		<!-- About Us Page -->

        
      
      
		<div class="aboutus-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    
                    <?php
                        $qry = "SELECT pagetitle,pagetext FROM pages WHERE id = 2 AND status = 1";
                        $result = $con->query($qry);
                        if($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                    ?>
                    
                    <div class="aboutus">
                        <h2 class="aboutus-title">About Us</h2>
                        <h3><?php echo $row['pagetitle']; ?></h3>
                        <p class="aboutus-text"><?php echo $row['pagetext']; ?></p>
                       
                        
                    </div>
      <?php } ?>
                </div>
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus-banner">
                        <img src="http://themeinnovation.com/demo2/html/build-up/img/home1/about1.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="feature">    
                    <?php
                        $qry = "SELECT image,firstname,lastname,userrole FROM users WHERE status = 1";
                        $result = $con->query($qry);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                     ?>  
                    
                    
                    
                        
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="glyphicon glyphicon-cog icon"></span>
                                </div>
                                <div class="feature-content">
                                    <img src="image/users/<?php echo $row['image']; ?>" alt="..." class="rounded-circle w-75 p-2">
                                <h5 class="card-title"><?php echo $row['firstname']." ".$row['lastname']; ?></h5>
                                <p class="card-text"><?php echo $row['userrole']; ?></p><br>
                                </div>
                            </div>
                        </div>
                        
                     <?php } } ?>   
                    </div>
                </div>
            </div>
        </div>
    </div>
		
      
    <!-- Footer -->
		
		<?php include 'footer.php'; ?>  
		
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>