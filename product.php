<!doctype html>

<?php
$page = "product";




?>



<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="css/w3.css" >
	<link rel="stylesheet" href="css/product.css">
	<title>Manufecturing Manager</title>
</head>

<body>


	<?php
      include 'header.php'; 
    
        $qry = "SELECT * FROM product WHERE status = 1 AND id=".$_GET['eid'];
        $result = $con->query($qry);
        if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    ?>
    
	<!-- PRODUCT -->

	<div class="pt-5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="individual-car-title">
					<h3><?php echo $row['title']; ?></h3>
				</div>

				<!-- Slider -->
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
                  <?php
                    $qry2 = "SELECT * FROM productimages WHERE status = 1 AND eventid=".$_GET['eid'];
                    $result = $con->query($qry2);
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
                            echo '<div class="carousel-item active" style="background:url(\'image/product/p'.$row['eventid'].'/'.$row['image'].'\')"></div>';
                            $active = false;
                        }else{
                            echo '<div class="carousel-item" style="background:url(\'image/product/p'.$row['eventid'].'/'.$row['image'].'\')"></div>';
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

				<!-- Card Detail -->
                
                <?php
                  
                    $qry = "SELECT * FROM product WHERE status = 1 AND id=".$_GET['eid'];
                    $result = $con->query($qry);
                    if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                ?>
                

				<div class="cars-tabs">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<h4>Overview</h4>
								</div>
								<div class="col-md-6">
									<ul>
										<li><strong>Brand :</strong> <?php echo $row['Brand']; ?> </li>
										<li><strong>Model :</strong> <?php echo $row['Model']; ?> </li>
										<li><strong>Metal :</strong> <?php echo $row['Metal']; ?> </li>
										<li><strong>Availability :</strong> <?php echo $row['Availability']; ?> </li>
										
									</ul>
								</div>
								<div class="col-md-6">
									<ul>

										<li><h3>Description :</h3>
	                                       <p><?php echo $row['fulldesc']; ?></p>
                                        </li>
										
									</ul>
								</div>
								<div class="col-md-12">
									<footer class="blockquote-footer">Please mention whenever you call that you found the details on this
										particular site.</footer>
									<footer class="blockquote-footer">Always arrange a meeting in a safe place.</footer>
									<footer class="blockquote-footer">This site helps you in searching for a vehicle. We do not verify the
										authenticity of the product.</footer>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
            <?php
                     }   ?>
			<div class="col-md-4">
                <form  method="post" action="" >
				<div class="menu sticky-top ">
					<div class="card bg-light ">
						<div class="card-body">
							<small> Get in touch with Seller</small>
							<h3><i class="fa fa-inr"></i> Enter Valid Detail </h3>
							<div class="form-group">
								<input name="name" type="text" class="form-control" id="name1" placeholder="Name">

							</div>
							<div class="form-group">
								<input name="mob" type="text" class="form-control" id="phone1" placeholder="Mobile">
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="updatecheck1">
								<label class="form-check-label" for="updatecheck1">
									<small>By submitting this form you agree to our <a href="#">terms and conditions </a> </small>
								</label>
							</div>
							<div class="pb-3">

							</div>
							<button type="submit" class="btn btn-warning">Contact the Seller</button>

						</div>
					</div>
				</div> 
                </form>
                <?php
                    if(isset($_POST['name']) && $_POST['name']!="" && $_POST['mob']!="" ){    
                     $qry2 = "INSERT INTO contactseller (name,mobile) VALUES('".$_POST['name']."','".$_POST['mob']."')";

                        if($con->query($qry2)){
                            echo "<p>Message submitted.</p>";
                        }else{
                            echo "<p>Something went wrong. Cannot submit message.</p>";
                        }
                    }
                 ?>
                
			</div>
		</div>
	</div>





	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->

	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/product.js"></script>

<?php
}else{
	header("Location: 404.php");
}

//include('footer.php');
?>    
    <?php include 'footer.php'; ?>
</body>

</html>