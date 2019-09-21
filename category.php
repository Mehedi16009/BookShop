  <?php 
    if(!isset($_GET['id']) or $_GET['id']==NULL)
  {
    echo "<script>window.lobrandion='index.php'</script>";
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

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Category Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
            <?php 
            $result = $bk->get_cat_book($id);
            if($result)
            {
              while ($value=$result->fetch_assoc()) {
           ?>  
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="admin/<?php echo $value['book_image'] ?>" class="img-responsive" height="50px" alt="">
                    <div class="caption">
                        <h3><?php echo $value['book_name']; ?></h3>
                        <p><?php  echo $fm->textShorten($value['description'],20) ;?></p>
                        <p>
                            <a href="cart.php?add=<?php echo $value['book_id']; ?>" class="btn btn-primary">Buy Now!</a> <a href="item.php?add=<?php echo $value['book_id']; ?>" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
       
       <?php } } else { ?>
        
        <p class="text-center bg-wrning">Sorry This Category has not any Products</p>
        
      <?php } ?>
            
      </div>
        <!-- /.row -->


<?php include 'inc/footer.php'; ?>