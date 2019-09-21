<?php 
include 'inc/header.php'; 

 if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['publish']))
  {
    
    
    $add_slider=$ad->add_slider($_POST,$_FILES);
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
  Add Slider Image

</h1>
<h3 class="text-center bg-success">
    <?php 
     if (isset($add_slider)) {
        echo $add_slider;
     }
    ?>
</h3>
 
<div class="col-md-8">


    
    <form action="" method="post" enctype="multipart/form-data">
    
       
       <div class="form-group">
            <input type="file" name="file">
        </div>      
      
      <div class="form-group">
       <!-- <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft"> -->
        <input type="submit" name="publish" class="btn btn-primary btn-sm" value="Publish">
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