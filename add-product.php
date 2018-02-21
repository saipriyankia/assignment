<?php 
	require_once('products_class.php');
	$db = new products_class();
	$error_array=array();
	if(isset($_POST['submit'])){
		if($_POST['sku']==''){
			$error_array[1]='SKU is required';
		}else{
			$sku = $db->check_sku($_POST['sku']);
			if($sku){ $error_array[2]='SKU is already taken'; }
		}
		if($_POST['product_name']==''){
			$error_array[3]='Name is required';
		}
		if($_POST['price']==''){
			$error_array[4]='Price is required';
		}
		if($_POST['sort_order']==''){
			$error_array[5]='Sort Order is required';
		}
		if($_POST['type_switcher']==''){
			$error_array[6]='Type Switcher is required';
		}
		if(isset($_POST['weight']) && $_POST['weight']==''){
			$error_array[7]='Weight is required';
		}
		if(isset($_POST['size']) && $_POST['size']==''){
			$error_array[8]='Size is required';
		}
		if(isset($_POST['dimension']) && count($_POST['dimension'])<0){
			$error_array[9]='Dimensions are required';
		}
		if(count($error_array)<=0){
			$insert = $db->products_save($_POST);
			if($insert){
				echo "<script>alert('Product saved successfully');window.location.replace('index.php');</script>";
			}else{
				echo "<script>alert('Something went wrong, Please try again'); </script>";
				
			}
		}
		$data = $_POST;
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add Product</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
	<header>
        <div class="container">
            <div class="row">
            </div>
        </div>
    </header>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Product
							<a href="index.php" class="btn btn-warning btn-sm pull-right"><i class="fa fa-arrow-left"></i> Back</a>
						</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Product
                        </div>
                        <div class="panel-body">
                       <form method="post">
							<div id="message" class="error-message"></div>
							  <div class="form-group">
								<label for="sku">SKU </label>
								<input type="text" value="<?php if(isset($data['sku'])){echo $data['sku'];}?>" name="sku" class="form-control" id="sku" placeholder="Enter SKU" required />
								<span class="error-message"><?php if(array_key_exists(2,$error_array)) echo $error_array[2];?></span>
							  </div>
							  <div class="form-group">
								<label for="product_name">Name</label>
								<input type="text" value="<?php if(isset($data['product_name'])){echo $data['product_name'];}?>" class="form-control" id="product_name" name="product_name" placeholder="Enter Name" required />
							  </div>
							  <div class="form-group">
								<label for="price">Price</label>
								<input type="text" value="<?php if(isset($data['price'])){echo $data['price'];}?>" class="form-control" id="price" name="price" placeholder="Price" required />
							  </div>
							  <div class="form-group">
								<label for="sorder">Sort Order</label>
								<input type="number" value="<?php if(isset($data['sort_order'])){echo $data['sort_order'];}?>" class="form-control" id="sorder" name="sort_order" placeholder="Enter Sort Order" required />
							  </div>
							  <div class="form-group">
								<label for="type_switcher">Type Switcher</label>
								<select name="type_switcher" class="form-control" id="type_switcher" required>
									<option value="">Select Type Switcher</option>
									<option value="1" <?php if(isset($data['type_switcher']) && $data['type_switcher']=='1'){echo 'selected="selected"';}?>>DVD-disc</option>
									<option value="2" <?php if(isset($data['type_switcher']) && $data['type_switcher']=='2'){echo 'selected="selected"';}?>>Book</option>
									<option value="3" <?php if(isset($data['type_switcher']) && $data['type_switcher']=='3'){echo 'selected="selected"';}?>>Furniture</option>
								</select>
							  </div>
							<div class="hidden-element" id="hide">  
							<?php 
								if(isset($data)){
									if(isset($data['size']) && $data['size']!=''){
							?>	
							<div class="form-group">
								<label for="type_switcher">Switcher Attribute (DVD-Disc)</label>
								<input type="text" value="<?php if(isset($data['size'])){echo $data['size'];}?>"  placeholder="Please Enter Size in MB Ex: 100MB" name="size" id="switcher_attribute" required class="form-control">
								<label>Note: Please Enter Size in MB Ex: 100MB</label>
							</div>
							<?php
									}elseif(isset($data['weight']) && $data['weight']!=''){
							?>
							<div class="form-group">
								<label for="type_switcher">Switcher Attribute (Book)</label>
								<input type="text" value="<?php if(isset($data['weight'])){echo $data['weight'];}?>"  placeholder="Please Enter Weight in Kgs Ex: 100Kgs" name="weight" id="switcher_attribute" required class="form-control">
								<label>Note: Please Enter Weight in Kgs Ex: 100Kgs</label>
							</div>
							<?php
									}elseif(isset($data['dimension']) && count($data['dimension'])>0){
							?>
							
							<div class="form-group">
								<div class="col-md-4">
									<label for="dimension">Switcher Attribute (Furniture)</label>
									<input value="<?php if(isset($data['dimension'])){echo $data['dimension'][0];}?>"  type="text" placeholder="Please Enter Height" name="dimension[]" id="dimension" required class="form-control">
								</div>
								<div class="col-md-4">
									<label for="dimension1">&nbsp;</label>
									<input value="<?php if(isset($data['dimension'])){echo $data['dimension'][1];}?>"  type="text" placeholder="Please Enter Width" name="dimension[]" id="dimension1" required class="form-control">
								</div>
								<div class="col-md-4">
									<label for="dimension2">&nbsp;</label>
									<input  value="<?php if(isset($data['dimension'])){echo $data['dimension'][2];}?>"  type="text" placeholder="Please Enter Length" name="dimension[]" id="dimension2" required class="form-control">
								</div>
								<label>Note: Please Provide Dimensions in HxWxL</label>
							</div>
							
							<?php
									}
								}else{
									
							?>
								
							<?php
								}
							?>
							  </div>
							  
							  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
													   <hr />
							 
							</div>
	
						</form>
                            </div>
                            </div>
                    </div>
						
                </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
   <footer>
        <div class="container">
            <div class="row">
            </div>
        </div>
    </footer>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/add-product-scripts.js"></script>
</body>
</html>
