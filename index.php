    <!-- Header -->
      <?php include 'inc/header.php'; ?>
    <!-- End Header -->
    

    <!-- Navigation -->
      <?php include 'inc/top_nav.php'; ?>
    <!-- Navigation End -->


   <!-- Page Content -->
    <div class="container">

        <div class="row">

           <!-- Side Category -->
            <?php include 'inc/side_category.php'; ?>
           <!-- End Side Category -->

            <div class="col-md-9">

               <?php include 'inc/slider.php'; ?>
                <?php 
                  
                  $result = $bk->get_all_book();
                  if($result){
                  while ($value=$result->fetch_assoc()) {
                  ?>
                <div class="row">
                   
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id=<?php echo $value['book_id'] ?>"><img src="admin/<?php echo $value['book_image'];?>" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $value['book_price']; ?></h4>
                                <h4><a href="item.php?id=<?php echo $value['book_id'] ?>""><?php echo $value['book_name']; ?></a>
                                </h4>
                                <p><?php  echo $fm->textShorten($value['description'],20) ;?></p>
                            </div>
                            
                        </div>
                    </div>

                  <?php } } ?>
                </div>
               
            </div>

        </div>

    </div>
    <!-- /.container -->



    


    <!-- Page Content -->
    <div class="container">

        

            
           
           <br>
           <?php 
             if (Session::get('userlogin') == true) {   ?>
            <div class="col-md-9">

               <button  id="autoclosable-btn-success" class="btn btn-primary btn-success btn-block text-center">
                 Suggestion For You
             </button>
                 <?php 
                  
                  $result = $bk->get_all_book_by_seggestion();
                  if($result){
                  while ($value=$result->fetch_assoc()) {
                  ?>
                <div class="row">
                   
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id=<?php echo $value['book_id'] ?>"><img src="admin/<?php echo $value['book_image']; ?>" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">$24.99</h4>
                                <h4><a href="item.php?id=<?php echo $value['book_id'] ?>"">First Product</a>
                                </h4>
                                <p><?php echo Session::get('username'); ?> like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            
                        </div>
                    </div>

                  <?php } } ?>
                </div>
              
            </div>
          <?php } else { ?>
           
                 <a href="login.php">Plz Logged in for Suggestion</a> 
             
        <?php } ?>
       

    </div>
    <!-- /.container -->

    
<?php include 'inc/footer.php'; ?>