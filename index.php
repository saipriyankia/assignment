<?php 
	require_once('products_class.php');
	$db = new products_class();
	$products = $db->products_list();
	//print_r($products);
	if(isset($_POST['check_product']) && count($_POST['check_product'])>0){
		$delete = $db->products_delete($_POST['check_product']);
			if($delete){
				echo "<script>alert('Product deleted successfully');window.location.replace('index.php');</script>";
			}else{
				echo "<script>alert('Something went wrong, Please try again'); </script>";
				
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Products</title>
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
    
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Products Lists
						<a href="trash.php" class="btn btn-info btn-sm pull-right">Trash</a>
						<a href="add-product.php" class="btn btn-primary btn-sm pull-right">Add Product</a>
						<div class="pull-right col-md-3 action">
							<div class="col-md-9 select-action">
								<select class="form-control" id="select_apply">
									<option value="">Select Action</option>
									<option value="1">Select All</option>
									<option value="2">Unselect All</option>
									<option value="3">Mass Delete Action</option>
								</select>
							</div>
							<div class="col-md-3 apply-button">
								<button class="btn btn-warning btn-sm" id="check_apply" >Apply</button>
							</div>
							
						</div>
					</h4>
					
                </div>

            </div>
           
            <div class="row">
			<form method="post" id="delete_products">
				<?php 
					if(isset($products)){
						foreach($products as $key=>$val){
				?>			
				
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <div><input type="checkbox" value="<?php echo $val['product_id'];?>" name="check_product[]" class="check_product" id="check_product"><?php echo $val['sku'];?></div>
						<div><?php echo $val['product_name'];?></div>
						<div>$<?php echo $val['price'];?></div>
                        <hr>
                        <h5>
						<?php 
							if($val['type_switcher']==1){
								echo 'Size: '.$val['switcher_attribute'];
							}elseif($val['type_switcher']==2){
								echo 'Weight: '.$val['switcher_attribute'];
							}elseif($val['type_switcher']==3){
								echo 'Dimensions: '.str_replace(',','x',$val['switcher_attribute']);
							}
						?>
						</h5>
                    </div>
                </div>
				<?php		
						}
					}else{
						echo '<h1>No Products Available</h1>';
					}
				?>
            </form>     
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
	<script src="assets/js/index-scripts.js"></script>
</body>
</html>
