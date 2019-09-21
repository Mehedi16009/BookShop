<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php') ;
include_once ($filepath.'/../lib/Session.php') ;
require_once($filepath.'/../vendor/autoload.php');

?>

<?php 
\Stripe\Stripe::setApiKey('sk_test_YkwG8YiVfVJQrDzJNTco2ou0');

?>


<?php
 /**
 * 
 */
 class Transaction 
 {

 	private $db;
    private $fm;
 	
 	function __construct()
 	{
 		 $this->db=new Database();
         $this->fm=new Format();
 	}

 	public function addTransaction($data){

 	  $email=$this->fm->validation($data['email']);
      $email=mysqli_real_escape_string($this->db->link,$email);

      $phone=$this->fm->validation($data['phone']);
      $phone=mysqli_real_escape_string($this->db->link,$phone);


      $token=$this->fm->validation($data['stripeToken']);
      $token=mysqli_real_escape_string($this->db->link,$token);
 		

 	$customer = \Stripe\Customer::create(array(
	   "email" => $email,
	   "source" => $token 
	  ));	

    $charge = \Stripe\Charge::create(array(
		  "amount" => $_SESSION['item_total']*100,
		  "currency" => "usd",
		  "description" => "You Baught total".$_SESSION['total_quantity']."Books",
		  "customer" => $customer->id
		));


    $id = $charge->id;
    $customer_id = $charge->customer;
    $product = $charge->description;
    $amount = $charge->amount;
    $currency = $charge->currency;
    $status = $charge->status;
    $total_amount = $_SESSION['item_total'];
    $total_quantity = $_SESSION['total_quantity'];

    $user_id = Session::get('userid');

    
    	$query="INSERT INTO 
	         transaction(id,customer_id,total_quantity,currency,user_id,total_amount,phone,status)
	         VALUES('$id','$customer_id','$total_quantity','$currency','$user_id','$total_amount','$phone','$status')";
	         $result=$this->db->insert($query);

      
      foreach (array_combine($_SESSION['book_id'], $_SESSION['book_quantity']) as $value => $value1){
        
          
          $query2 = "INSERT INTO 
           orders(book_id,user_id,quantity,phone,status)
           VALUES('$value','$user_id','$value1','$phone','status')";

           $result=$this->db->insert($query2);   
      }


    session_unset($_SESSION['item_total']);
    session_unset($_SESSION['total_quantity']);
    
    header('Location: pay_success.php?tid='.$charge->id.'&product='.$charge->description);

        
      }
      
    
    
 	
    


 

 public function get_all_transaction(){
    $query="SELECT transaction.*,
          users.username
          FROM transaction
          INNER JOIN users
          on transaction.user_id = users.id
          ";
   $result=$this->db->select($query);
   return $result;
 }

 public function get_all_orders(){
    $query = "SELECT orders.quantity,orders.phone,orders.status,users.username,
              books.book_name,books.book_price  
              FROM orders 
                  INNER JOIN books  ON books.book_id = orders.book_id
                  INNER JOIN users  ON users.id  = orders.user_id
              ";

   $result=$this->db->select($query);
   return $result;
 }



 }


