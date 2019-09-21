<?php  
include 'lib/Session.php' ;
ob_start();
Session::init();

error_reporting(0);

include 'lib/Database.php' ;
include 'helpers/Format.php';
spl_autoload_register(function($class){
  include_once "classes/".$class.".php";
});
$db=new Database();
$fm=new Format();
$user = new User();
$cat = new Category();
$bk = new Book();
$ct = new Cart();
$tn = new Transaction();
$ad = new Admin();
$msg = new Message();
?>