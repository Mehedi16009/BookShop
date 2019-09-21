<?php include 'inc/init.php';  ?>

<?php 
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $result = $bk->get_book_by_id($id);
    
    if($result){
      while ($value=$result->fetch_assoc())
       {
	
		if ($value['book_quantity'] != $_SESSION['book_' . $_GET['add']]) {
			$_SESSION['book_' . $_GET['add']] +=1;
			$fm->redirect("checkout.php");
		}else{
			Session::set_message("We Only Have ". $value['book_quantity'] . " " . "Available");
			$fm->redirect("checkout.php");
		}
      }
}
}


if (isset($_GET['remove'])) {

	$_SESSION['book_' . $_GET['remove']]--;
	if($_SESSION['book_' . $_GET['remove']] < 1)
	{
		$fm->redirect("checkout.php");
		Session::set_message("Your Cant Decrement less than 1");
		unset($_SESSION['item_total']);
        unset($_SESSION['total_quantity']);
        
		
    }
    $fm->redirect("checkout.php");
	
}

if (isset($_GET['delete'])){
   
   $_SESSION['book_' . $_GET['delete']] = '0';
   unset($_SESSION['item_total']);
   unset($_SESSION['total_quantity']);
   $fm->redirect("checkout.php");
   
   }	
?>
