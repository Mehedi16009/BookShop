<?php 
include 'inc/init.php';



 if($user->logged_in()){
 if($_SERVER['REQUEST_METHOD']== 'POST' )
  {
  
      $tn->addTransaction($_POST);
  

  }
   
 }else{
 	$fm->redirect("login.php");
 }




 







?>