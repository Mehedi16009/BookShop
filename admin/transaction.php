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
   All Transaction

</h1>
</div>

<div class="row">
<table class="table table-striped" id="example" >
    <thead>

      <tr>
           <th>S.N</th>
           <th>Transaction Id</th>
           <th>Customer Id</th>
           <th>Total Quantity</th>
           <th>Currency</th>
           <th>Customer Name</th>
           <th>Amount</th>
           <th>Phone</th>
           <th>Status</th>
           <th>Created At</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          
         $result=$tn->get_all_transaction();
          if($result)
          {
            $i=0;
            while($value=$result->fetch_assoc()) {
            $i++;
          ?>

        
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['id']; ?></td>
           <td><?php echo $value['customer_id']; ?></td>
            <td><?php echo $value['total_quantity']; ?></td>
            <td><?php echo $value['currency']; ?></td>
            <td><?php echo $value['username']; ?></td>
           <td><?php echo $value['total_amount']; ?></td>
           <td><?php echo $value['phone']; ?></td>
           <td><?php echo $value['status']; ?></td>
           <td><?php echo $fm->formatDate($value['created_at']); ?></td>
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

