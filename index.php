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

    <title>Manufecturing Manager</title>
  </head>
  <body>
	
      <?php $page = "home"; 
      include 'header.php'; ?>
		 
      <!--Slider -->
		
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
                  <?php
                    $qry = "SELECT image FROM sliderimages WHERE pageid = 1 AND status = 1";
                    $result = $con->query($qry);
                    if($result->num_rows > 0){
                        for($i=0;$i<$result->num_rows;$i++){
                            $li = '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"';
                            if($i==0) $li=$li.'class="active"';
                            $li=$li.'></li>';
                            echo $li;
                        }
                    ?>
				
			  </ol>
				
			  <div class="carousel-inner">
                  <?php
                    $active = true;
                    while($row = $result->fetch_assoc()){
                        if($active){
                            echo '<div class="carousel-item active" style="background:url(\'image/slider/'.$row['image'].'\')"></div>';
                            $active = false;
                        }else{
                            echo '<div class="carousel-item" style="background:url(\'image/slider/'.$row['image'].'\')"></div>';
                        }	
                    }	
                }
                    ?>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
	
	
			
		
		<!-- Product Cards -->
 <div  class="container-fluid">
     <div class="row">
         <div class="card-deck">
                        <?php
            $qry = "SELECT id,title,image,smalldesc FROM product WHERE status = 1 ";
             $result = $con->query($qry);
            if($result->num_rows > 0){
           
                while($row = $result->fetch_assoc()){
        
            ?>	
             <div class="col-sm-4">
            
                <div class="card">
                  <img class="card-img-top" src="image/product/<?php echo $row['image']; ?>" alt="Card image cap">
                  <div class="card-body">
                    <div class="clearfix">
                        <h5 class="card-title float-left"><?php echo $row['title']; ?></h5>
                        <span class="badge badge-pill badge-primary float-right"></span>
                    </div>
                    <p class="card-text"><?php echo $row['smalldesc']; ?></p>
                    <a href="product.php?eid=<?php echo $row['id']; ?>" class="btn btn-primary">More Details ></a>
                  </div>
                </div>
                 <br>
             </div>
            	
            <?php
                }
            }
            ?>
		</div>	
		
	
            
     </div>
		
</div>
		
		<!-- Section -->
		<div class="raw">
			<div class="calabout">
        <?php
            $qry = "SELECT pagetitle,pagetext FROM pages WHERE id = 1 AND status = 1";
            $result = $con->query($qry);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                echo "<h1>".$row['pagetitle']."</h1>";
                echo "<p>".$row['pagetext']."</p>";
            }
                ?>
		</div>
      </div>        
		
		
		<!-- Footer -->
		
		<?php include 'footer.php'; ?>
		
		
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js" ></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>