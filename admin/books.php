<!-- Header -->
 <?php include 'inc/header.php'; ?>
<!-- End Header -->
    
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
             <!-- Brand and toggle get grouped for better mobile display -->
              
              <?php include 'inc/top_nav.php'; ?>
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
               <?php include 'inc/side_nav.php'; ?>
            
            <!-- /.navbar-collapse -->
           
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">

<h1 class="page-header">
   All Books

</h1>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Author Name</th>
           <th>Book ISBN</th>
           <th>Category</th>
           <th>Quantity</th>
           <th>Price</th>
           <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
      <?php 
          $result=$bk->get_all_book();
          if($result)
          {
            while($value=$result->fetch_assoc()) {
          
          ?>
  
      <tr>
            <td><?php echo $value['book_id'] ;?></td>
            <td><?php echo $value['book_name'] ;?><br>
              <img src="<?php echo $value['book_image'] ;?>" width="100px" alt="">
            </td>
            <td><?php echo $value['author_name'] ;?></td>
            <td><?php echo $value['book_isbn'] ;?></td>
            <td><?php echo $value['cat_title'] ;?></td>
            <td><?php echo $value['book_quantity'] ;?></td>
            <td><?php echo $value['book_price'] ;?></td>
            <td>
              <a  href="edit_book.php?id=<?php echo $value['book_id'] ;?>" class="glyphicon glyphicon-pencil btn btn-success">Edit<a>
              <a onclick="return confirm('Are You Sure');" href="delete_book.php?id=<?php echo $value['book_id'] ;?>" class="glyphicon glyphicon-remove btn btn-danger"><a>
            </td>
        </tr>
      
     <?php } } ?>

  </tbody>
</table>











                
                 


             </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->







    </div>
    <!-- /#wrapper -->

 

   <?php include'inc/footer.php'; ?>
