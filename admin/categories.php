<?php include 'inc/header.php'; ?>

<?php 
  
  if($_SERVER['REQUEST_METHOD']== 'POST')
  {
    $cat_title=$_POST['cat_title'];
   
    $addcat=$cat->addcatagory($cat_title);
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
  Product Categories

</h1>
<h3 class="text-center bg-success">
    <?php 
     if (isset($addcat)) {
        echo $addcat;
     }
    ?>
</h3>

<div class="col-md-4">
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="cat_title" class="form-control">
        </div>

        <div class="form-group">
            
            <input type="submit" class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
            </thead>


    <tbody>
        <?php 
        $result=$cat->getallCat();
        if($result)
        {
            
            while ($value=$result->fetch_assoc()) {
               
            
        
        ?>
        <tr>
            <td><?php echo $value['cat_id']; ?></td>
            <td><?php echo $value['cat_title']; ?></td>
            <td>
            <a  href="edit_cat.php?id=<?php echo $value['cat_id'] ;?>" class="glyphicon glyphicon-pencil btn btn-success">Edit<a>
            <a onclick="return confirm('Are You Sure');" href="delete_cat.php?id=<?php echo $value['cat_id'] ;?>" class="glyphicon glyphicon-remove btn btn-danger"><a>
            </td>
        </tr>
    </tbody>
        <?php } } ?>
        </table>

</div>

       </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include 'inc/footer.php'; ?>