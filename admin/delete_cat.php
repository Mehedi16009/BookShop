<?php include 'inc/header.php'; ?>

<?php  
if (!isset($_GET['id'])or $_GET['id']==NULL) {
  echo "<script>window.location='categories.php'</script>";
  //header("Location:catlist.php");
}else
{
  
  $id=$_GET['id'];
  $delcat=$cat->del_cat($id);


  /**/
}