<?php
$page="events";
include("header.php");
$eid=0;
if(isset($_GET['eid']) && $_GET['eid']!=""){
    $eid=$_GET['eid'];
}
?>

<div class="content-wrapper">
<?php
$qry = "SELECT * FROM product WHERE status = 1 AND id=".$eid;
$result = $con->query($qry);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
?>
    <section class="content-header">
      <h1>
        <?php echo $row['title']; ?>
        <small>Product Details</small>
      </h1>
    </section>
    <section class="content container-fluid">
		
 <?php
if(isset($_POST['updateBasics']))
{
    
    $str='';
	$file_name = date("m-d-H-i").$_FILES['image']['name'];
	$file_type = $_FILES['image']['type'];
	$file_size = $_FILES['image']['size'];
    $title = $_POST['P_title'];
    if(strstr($file_name,".exe")){
        $str = '<div class="callout callout-danger"><p>.EXE files are not allowed</p></div>';
    }
    if($file_size > 350000)
    {
        $str = '<div class="callout callout-danger"><p>File is too large...</p></div>';
    }
    
		$target = "../image/product/".$file_name;
		
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
    {
        $qry = 'UPDATE product set title="'.$title.'" , image="'.$file_name.'" where id="'.$eid.'"';
        if($con->query($qry)){
            $str = '<div class="callout callout-success"><p>Image has been uploaded successfully.</p></div>';
        }else{
            $str = '<div class="callout callout-danger"><p>Problem occured !!!! Please try again.</p></div>';
        }        
    }
    else{
        $str = '<div class="callout callout-danger"><p>Problem occurred while uploading image. Please try again.</p></div>';
    }
    

		echo $str;
    
}
?>

<?php
if(isset($_POST['updateDesc']))
{
    
    $str='';
    $description = $_POST['DESC'];
    
		
	
        $qry = 'UPDATE product set fulldesc="'.$description.'" where id="'.$eid.'"';
        if($con->query($qry)){
            $str = '<div class="callout callout-success"><p>Image has been uploaded successfully.</p></div>';
        }else{
            $str = '<div class="callout callout-danger"><p>Problem occured !!!! Please try again.</p></div>';
        }        
    
    

		echo $str;    
}
?>



<div class="row">
	<div class="col-md-4">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Basic Details</h3>
			</div>
			<div class="box-body">
				<form action="" method="post" enctype="multipart/form-data">
				    <img class="eventImage" src="../image/product/<?php echo $row['image']; ?>" /><br/>
                    <div class="input-group">
                        <span class="input-group-addon">Image</span>
                        <input type="file" class="form-control" placeholder="Product Title" name="image">
                    </div><br/>
                    <div class="input-group">
                        <span class="input-group-addon">Title</span>
                        <input type="text" class="form-control" placeholder="Event Title" name="P_title" value="<?php echo $row['title']; ?>">
                    </div><br/>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm" name="updateBasics">Update</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">More Details</h3>
			</div>
			<div class="box-body">
				<form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Full Description</label>
                        <textarea id="fullDesc"  placeholder="Full Description" name="DESC"><?php echo $row['fulldesc']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm" name="updateDesc">Update</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>		

   <!-- product images-->

  


   
<div class="row">
	<div class="col-sm-12">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Product Images</h3>
			  <div class="box-tools">
			  </div>
			</div>
			<div class="box-body image-list">
<?php
$qry2 = "SELECT * FROM productimages WHERE status = 1 AND eventid=".$eid;
$result2 = $con->query($qry2);
if($result2->num_rows > 0){
	while($row2 = $result2->fetch_assoc()){
        echo '<div class="event-image" style="background-image:url(\'../image/product/p'.$row2['eventid'].'/'.$row2['image'].'\');"></div>';
    }
}
?>
			</div>
		</div>
	</div>
</div>
   
   
<!-- Add Product Images -->

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Product
        <small>Detail</small>
      </h1>
    </section>
    <section class="content container-fluid">
		
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Product Details</h3>
		  <div class="box-tools">
			<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-new-event">Add New Product</button>
		  </div>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tbody><tr>
			  <th width="100px">ID</th>
			  <th width="150px">Image</th>
			  <th>Title</th>
			  
			  <th width="200px">Status</th>
			  <th width="100px">Action</th>
			</tr>
<?php
$qry = "SELECT * FROM productimages WHERE eventid=".$eid;
$result = $con->query($qry);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
?>
<tr>
	<td><?php echo $row['id']; ?></td>
	<td><div class="img-circle img-slider" style="background-image:url('../image/product/p<?php echo $row['eventid']; ?>/<?php echo $row['image']; ?>');"></div></td>
	<td><?php echo $row['title']; ?></td>
	
	<td><?php
	if($row['status'])
		echo '<span class="label label-success">Active</span>';
	else
		echo'<span class="label label-danger">Inactive</span>';
	?></td>
    
	<td>
        <?php
	if($row['status'])
		echo '<a href="apis/productimages.php?eid='.$row['id'].'&del=true" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
	else
		echo '<a href="apis/productimages.php?eid='.$row['id'].'&rev=true" class="btn btn-sm btn-success"><i class="fa fa-undo"></i></a>';
	?>
              </td>
</tr>
<?php
	}
}
?>			
		  </tbody></table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
  </div>		

    </section>
  </div>
        
        
        
        
        
        
        
        
        
        
        
        
<!--End of Add Product Images -->       
	<!--test--> 
<div class="modal fade" id="modal-new-event">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Fill initial details</h4>
	  </div>
	  <form action="" method="post" enctype="multipart/form-data">
	  <div class="modal-body">
            <div class="input-group">
                <span class="input-group-addon">Image</span>
                <input type="file" class="form-control" name="P_Image" placeholder="Image">
            </div><br/>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
		<button type="submit" class="btn btn-primary" name="create">ADD Image</button>
	  </div>
	  </form>
	</div>
  </div>
</div> 


   
   
   
<!-- End of Add Product Images -->   
    </section>

<?php
}else{
    echo '<section class="content container-fluid"><div class="callout callout-danger"><p>Error fetching product data. Please try again.</p></div></section>';
}
?>
</div>
  
 
<?php
include("footer.php");
?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('fullDesc');
  })
</script>