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
    
   
    $updatebook=$bk->update_book($_POST,$_FILES,$id);
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
      if (isset($updatebook)) {
         echo $updatebook;
      }

    ?>
</h3>
</div>
 

<?php 
 $getbookbyid=$bk->get_book_by_id($id);
 if ($getbookbyid) {
   while ($value=$getbookbyid->fetch_assoc()) {
?>  






<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

   <div class="form-group">
    <label for="product-title">Book Name </label>
        <input type="text" name="book_name" value="<?php echo $value['book_name']; ?>" class="form-control">
       
    </div>

    <div class="form-group">
      <label for="product-title">Author Name </label>
        <input type="text" name="author_name" value="<?php echo $value['author_name'] ;?>" class="form-control">
       
    </div>
    



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Book Price</label>
        <input type="number" name="book_price" value="<?php echo $value['book_price']; ?>" class="form-control" size="60">
      </div>
    </div>

  
  <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Book Quantity</label>
        <input type="number" name="book_quantity" value="<?php echo $value['book_quantity']; ?>" class="form-control" size="60">
      </div>
    </div>


    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <!-- <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft"> -->
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Book Category</label>
         
        <select name="cat_id" id="" class="form-control">
            <option value="">Select Category</option>
            <?php 
             
              $getcat= $cat->getallCat();
              if ($getcat) {
                 while ($result=$getcat->fetch_assoc()) { ?>
              <option 
              <?php 
                 if($value['book_cat_id']==$result['cat_id'])
                 {?>

                       selected="selected"
                        <?php
                 }
              ?> value="<?php echo $result['cat_id'] ; ?>" >
               


              <?php echo $result['cat_title'] ; ?></option>
            
            <?php } } ?>
        </select>


     </div>

     





    


    


<!-- Product Tags -->


    <div class="form-group">
          <label for="product-title">Book ISBN</label>
         
        <input type="text" name="book_isbn" value="<?php echo $value['book_isbn'] ;?>" class="form-control">
    </div>

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Book Image</label>
        <input type="file" name="file"><br>
        <img src="<?php echo $value['book_image'] ;?>" width="100px">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>

 <?php } } ?>

                



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <?php include 'inc/footer.php'; ?>
