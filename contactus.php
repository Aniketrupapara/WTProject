<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/my.css" >
	<link rel="stylesheet" href="css/contact.css" >
      <link rel="stylesheet" href="css/w3.css" >
	
    <title>Manufecturing Manager</title>
  </head>
  <body>
		<?php $page = "contact";
      include 'header.php'; ?>
		
		<!-- PAGE -->
<?php
$qry = "SELECT pagetitle,pagetext FROM pages WHERE id = 3 AND status = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
?>
      
      
<div class="container contact" style="padding-bottom:600px;">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				<h2>Contact Us</h2>
                <h3><?php echo $row['pagetitle']; ?></h3>
				<h4><?php echo $row['pagetext']; ?></h4>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
                <form name="msgForm" method="post" action="" onSubmit="return validateForm()">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="fname">Full Name:</label>
				  <div class="col-sm-10">          
					<input name="name" type="text" class="form-control" id="fname" placeholder="Enter First Name" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10">
					<input name="email" type="email" class="form-control" id="email" placeholder="Enter email" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="comment">Comment:</label>
				  <div class="col-sm-10">
					<textarea name="msg" class="form-control" rows="5" id="comment"></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Submit</button>
				  </div>
				</div>
             </form>
                <?php
                    if(isset($_POST['name']) && $_POST['name']!="" && $_POST['email']!="" && $_POST['msg']!=""){    
                        $qry = "INSERT INTO contactus (name,email,message) VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['msg']."')";

                        if($con->query($qry)){
                            echo "<p>Message submitted.</p>";
                        }else{
                            echo "<p>Something went wrong. Cannot submit message.</p>";
                        }
                    }   
                    ?>
			</div>
		</div>
	</div>
 </div>
      
		 
		<?php
}
?>		
	<!-- Footer -->
		
		<?php include 'footer.php'; ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>