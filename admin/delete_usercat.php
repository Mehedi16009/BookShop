<?php include 'inc/header.php'; ?>

<?php  
if (!isset($_GET['id'])or $_GET['id']==NULL) {
  echo "<script>window.location='user_categories.php'</script>";
  //header("Location:catlist.php");
}else
{
  
  $id=$_GET['id'];
  $delusercat=$cat->del_user_cat($id);


  /**/
}