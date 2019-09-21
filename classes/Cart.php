<?php  
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php') ;
include_once ($filepath.'/../lib/Session.php') ;
?>

<?php
 /**
 * 
 */
 class Cart 
 {

 	private $db;
    private $fm;
 	
 	function __construct()
 	{
 		 $this->db=new Database();
         $this->fm=new Format();
 	}

 	
 	public function cart(){
    
    $total = 0;
    $item_total = 0;
    //paypal variable
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;
    //End Paypal Variable
    foreach ($_SESSION as $name => $value) {
    if($value > 0){ 
    if (substr($name, 0 , 5) == 'book_'){
    // $length = strlen(strlen($name) - 8);
    // $id = substr($name, 8 , $length);
    $myArray = explode('_', $name);
    
    $id = mysqli_real_escape_string($this->db->link,$myArray[1]);
    $query = "SELECT * FROM books WHERE book_id = '$id'";
	$result=$this->db->select($query);
	
	if($result){
	while ($row = $result->fetch_assoc()) {
		$sub = $row['book_price'] * $value;
		$item_total += $value;
    $book_id[] = $row['book_id'];
    $_SESSION['book_id'] = $book_id;

    $book_quantity[] = $value;
    $_SESSION['book_quantity'] = $book_quantity;
		$product = <<<DELIMETER
	<tr>
        <td>{$row['book_name']}<br>

        <img src="admin/{$row['book_image']}" width="80px">

        </td>
        <td>&#36;{$row['book_price']}</td>
        <td>{$value}</td>
        <td>&#36;{$sub}</td>
        <td>
     <a class="btn btn-success" href="cart.php?add={$row['book_id']}"><span class="glyphicon glyphicon-plus"></span></a>
     <a class='btn btn-warning' href="cart.php?remove={$row['book_id']}"><span class='glyphicon glyphicon-minus'></span></a>
     <a class='btn btn-danger' href='cart.php?delete={$row['book_id']}'><span class='glyphicon glyphicon-remove'></a>
        </td>
    </tr>
    

DELIMETER;
      echo $product;
      $total = $total + $sub;
      
      //paypal
      $item_name++;
      $item_number++;
      $amount++;
      $quantity++;
      //end paypal
      
     } }
     
     $_SESSION['item_total'] = $total;
     $_SESSION['total_quantity'] = $item_total;
    }
   
  }

 }
 	}


  public function show_payment_button(){
    if (isset($_SESSION['total_quantity']) && ($_SESSION['total_quantity']) >=1) {
    
      return true;
  }
 } 


}
 	