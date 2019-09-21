<?php 
    if(!isset($_GET['id']) or $_GET['id']==NULL)
  {
    echo "<script>window.lobrandion='users.php'</script>";
  }
  else
  {
    $id=$_GET['id'];
  }


?>

<?php 
include 'inc/header.php'; 

 if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['update']))
  {
    
    
    $updateuser=$ad->update_user($_POST,$id);
  }

?>

<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
             
              
              <?php include 'inc/top_nav.php'; ?>
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
               <?php include 'inc/side_nav.php'; ?>
            
            <!-- /.navbar-collapse -->
        </nav>



        <div id="page-wrapper">

            <div class="container-fluid">

            

            

<h1 class="page-header">
  Edit User

</h1>
<h3 class="text-center bg-success">
    <?php 
     if (isset($updateuser)) {
        echo $updateuser;
     }
    ?>
</h3>
 
<div class="col-md-8">
   
<?php 
$getuserbyid=$ad->get_user_by_id($id);
if ($getuserbyid) {
while ($value=$getuserbyid->fetch_assoc()) {
?> 

    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Old Pass</label>
            <input type="text" name="admin_name" value="<?php echo $value['admin_name']; ?>"  class="form-control">
        </div>

        <div class="form-group">
            <label for="category-title">New Pass</label>
            <input type="text" name="admin_email" value="<?php echo $value['admin_email']; ?>"  class="form-control">
        </div>

        <div class="form-group">
            
            <input type="submit" name="update" class="btn btn-primary" value="Update Category">
        </div>      


    </form>
<?php } } ?>

</div>


 </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include 'inc/footer.php'; ?>