<?php 
    if(!isset($_GET['id']) or $_GET['id']==NULL)
  {
    echo "<script>window.lobrandion='books.php'</script>";
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
    
    $cat_title = $_POST['cat_title'];
    $editcat=$cat->edit_cat($cat_title,$id);
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
  Edit Categories

</h1>
<h3 class="text-center bg-success">
    <?php 
     if (isset($editcat)) {
        echo $editcat;
     }
    ?>
</h3>
 
<div class="col-md-8">

<?php 
$getcatbyid=$cat->get_cat_by_id($id);
if ($getcatbyid) {
while ($value=$getcatbyid->fetch_assoc()) {
?> 
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="cat_title" value="<?php echo $value['cat_title']; ?>" class="form-control">
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