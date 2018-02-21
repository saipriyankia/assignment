<?php 
require('db_class.php');
class products_class extends db_class{
	
	/*Constructor for accessing the database connections all over the class*/
	public function __construct(){
		$this->get_access();
	}
	/*Inserting Products*/
	public function products_save($product_info){
		if(isset($product_info['size'])){
			$switcher_attribute=$product_info['size'];
		}elseif(isset($product_info['weight'])){
			$switcher_attribute=$product_info['weight'];
		}elseif(isset($product_info['dimension'])){
			$switcher_attribute=implode(',',$product_info['dimension']);
		}
		$sql="insert into products set sku='".$product_info['sku']."',product_name='".$product_info['product_name']."',price='".$product_info['price']."',type_switcher='".$product_info['type_switcher']."',switcher_attribute='".$switcher_attribute."',sort_order='".$product_info['sort_order']."',status=1,created_date='".date('Y-m-d H:i:s')."'";
		 if (mysqli_query($this->connection, $sql)) {
               return true;
            } else {
               return false;
            }
            $this->connection->close();
	}
	/*Fetching Products List*/
	public function products_list(){
		$result = array();
		$sql="SELECT * FROM `products` where status=1 order by sort_order asc ";
		if($fetch= mysqli_query($this->connection,$sql)){
			while ($row=mysqli_fetch_array($fetch,MYSQLI_ASSOC)){
				$result[]=$row;
			}
		}
		return $result;
	}
	/*Fetching Trash List*/
	public function trash_list(){
		$result = array();
		$sql="SELECT * FROM `products` where status=0 order by sort_order asc ";
		if($fetch= mysqli_query($this->connection,$sql)){
			while ($row=mysqli_fetch_array($fetch,MYSQLI_ASSOC)){
				$result[]=$row;
			}
		}
		return $result;
	}
	/*Checking the sku for unique*/
	public function check_sku($sku){
		$sql="select * from products where sku='".$sku."'";
		if($fetch = mysqli_query($this->connection,$sql)){
			return mysqli_fetch_array($fetch,MYSQLI_NUM);
		}
	}
	/*Delete Product*/
	public function products_delete($products){
		
		foreach($products as $key=>$val){
			//$sql="delete from products where product_id=".$val;
			$sql="update products set status=0 where product_id=".$val;
			mysqli_query($this->connection,$sql);
		}
		return true;
	}
	/*Restore Product*/
	public function products_restore($products){
		
		foreach($products as $key=>$val){
			//$sql="delete from products where product_id=".$val;
			$sql="update products set status=1 where product_id=".$val;
			mysqli_query($this->connection,$sql);
		}
		return true;
	}
	
}

?>