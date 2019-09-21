<?php 
include 'inc/header.php'; 

 if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['publish']))
  {
    
    
    $add_admin=$ad->add_admin($_POST);
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
     if (isset($add_admin)) {
        echo $add_admin;
     }
    ?>
</h3>
 
<div class="col-md-8">


    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Admin Name</label>
            <input type="text" name="admin_name"  class="form-control">
        </div>

        <div class="form-group">
            <label for="category-title">Admin Email</label>
            <input type="text" name="admin_email"  class="form-control">
        </div>

        <div class="form-group">
            <label for="category-title">Admin Password</label>
            <input type="password" name="admin_pass"  class="form-control">
        </div>

        <div class="form-group">
            
            <input type="submit" name="publish" class="btn btn-primary" value="Add Admin">
        </div>      


    </form>


</div>


 </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include 'inc/footer.php'; ?>