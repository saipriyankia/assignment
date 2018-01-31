<?php 
class products_class{
	public $host = 'localhost:3333';
	public $user = 'root';
	public $password = '';
	public $database = 'assign_task';
	public $connection='';
	public $error_msg='';
	/*Constructor for accessing the database connections all over the class*/
	public function __construct(){
		$this->connection = new mysqli($this->host,$this->user,$this->password,$this->database);
		if(!$this->connection){
			$this->error_msg = 'Unable to connect to the database.';
			return false;
		}
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
		$sql="SELECT * FROM `products` order by sort_order asc ";
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
			$sql="delete from products where product_id=".$val;
			mysqli_query($this->connection,$sql);
		}
		return true;
	}
	
}

?>