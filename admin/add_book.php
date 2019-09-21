<?php 
include 'inc/header.php'; 

 if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['publish']))
  {
    
   
    $addbook=$bk->add_book($_POST,$_FILES);
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






<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Product

</h1>
<h3 class="text-center bg-success">
   <?php 
      if (isset($addbook)) {
         echo $addbook;
      }

    ?>
</h3>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

   <div class="form-group">
    <label for="product-title">Book Name </label>
        <input type="text" name="book_name" class="form-control">
       
    </div>

    <div class="form-group">
      <label for="product-title">Author Name </label>
        <input type="text" name="author_name" class="form-control">
       
    </div>
    



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Book Price</label>
        <input type="number" name="book_price" class="form-control" size="60">
      </div>
    </div>

  
  <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Book Quantity</label>
        <input type="number" name="book_quantity" class="form-control" size="60">
      </div>
    </div>

   <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <!-- <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft"> -->
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Book Category</label>
         
        <select name="cat_id" id="" class="form-control">
            <option value="">Select Category</option>
            <?php 
             
              $getcat= $cat->getallCat();
              if ($getcat) {
                 while ($result=$getcat->fetch_assoc()) {
                    
                 
              
                   
            ?>
            <option value="<?php echo $result['cat_id'] ; ?>"><?php echo $result['cat_title'] ; ?></option>
            <?php } } ?>
        </select>


     </div>

     





    


    


<!-- Product Tags -->


    <div class="form-group">
          <label for="product-title">Book ISBN</label>
         
        <input type="text" name="book_isbn" class="form-control">
    </div>

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Book Image</label>
        <input type="file" name="file">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>



                



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <?php include 'inc/footer.php'; ?>
