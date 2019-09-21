 <?php include 'inc/header.php'; ?>

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
   All Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>S.N</th>
           <th>UserName</th>
           <th>Book Name</th>
           <th>Price</th>
           <th>Total price</th>
           <th>Quantity</th>
           <th>Phone Number</th>
           <th>Status</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          
         $result=$tn->get_all_orders();
          if($result)
          {
            $i=0;
            while($value=$result->fetch_assoc()) {
            $i++;
          ?>

        
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['username']; ?></td>

            <td><?php echo $value['book_name']; ?></td>
            <td><?php echo $value['book_price']; ?></td>
            <td><?php echo $value['book_price'] * $value['quantity'] ; ?></td>
            <td><?php echo $value['quantity']; ?></td>
            <td><?php echo $value['phone']; ?></td>
           <td><?php echo $value['status']; ?></td>
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

    <?php include 'inc/footer.php'; ?>
