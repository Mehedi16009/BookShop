 <?php 
    if(!isset($_GET['id']) or $_GET['id']==NULL)
  {
    echo "<script>window.lobrandion='category.php'</script>";
  }
  else
  {
    $id=$_GET['id'];
  }


?>




    <!-- Header -->
      <?php include 'inc/header.php'; ?>
    <!-- End Header -->
    

    <!-- Navigation -->
      <?php include 'inc/top_nav.php'; ?>
    <!-- Navigation End -->
    
    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->

            
               <?php include 'inc/side_category.php'; ?>
          

<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <?php 

    $result = $bk->get_book_by_id($id);
    if($result)
    {
      while ($value=$result->fetch_assoc()) {


    ?>

    <div class="col-md-7">
       <img class="img-responsive" src="admin/<?php echo $value['book_image']; ?>" alt="">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><a href="#"><?php echo $value['book_name']; ?></a> </h4>
        <hr>
        <h4 class="">$<?php echo $value['book_price']; ?></h4>

    
          
        <p><?php echo $value['description']; ?></p>

   
    <form action="">
        <div class="form-group">
           <a href="cart.php?add=<?php echo $value['book_id']; ?>" class="btn btn-primary">Buy Now!</a>
        </div>
    </form>

    </div>
 
</div>

</div>

<?php } } ?>

</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<p></p>
           
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>


    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

  <div class="col-md-12">

       <h3> Reviews From </h3>
        <?php include 'inc/disqus.php'; ?>

    </div>


    

 </div>

 </div>

</div>


</div><!--Row for Tab Panel-->




</div>

</div>
    <!-- /.container -->

   <?php include 'inc/footer.php'; ?>
