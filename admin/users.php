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



<div class="col-lg-12">
  

    <h1 class="page-header">
        Users
     
    </h1>
      <p class="bg-success">
        
    </p>

    <a href="add_user.php" class="btn btn-primary">Add Admin</a>


    <div class="col-md-12">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
              <?php 
                $result=$ad->get_admin_info();
                if($result)
                {
                    
                    while ($value=$result->fetch_assoc()) {
                       
                    
                
                ?>
           

                <tr>

                   
                   
                    
                    <td><?php echo $value['admin_name']; ?></td>
                    <td><?php echo $value['admin_email']; ?></td>
                   
                   <td>
                    <?php if (Session::get('adminid') == $value['admin_id']) { ?>
                        
                    
                    <a  href="edit_user.php?id=<?php echo $value['admin_id'] ;?>" class="glyphicon glyphicon-pencil btn btn-success">Edit<a>
                    <a onclick="return confirm('Are You Sure');" href="change_pass.php?id=<?php echo $value['admin_id'] ;?>" class="btn btn-info">Change Password<a>
                   <?php  } ?>
                   </td>
                </tr>


           <?php } }  ?>

                
                
            </tbody>
        </table> <!--End of Table-->
    

    </div>










    
</div>













            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
  <?php include 'inc/footer.php'; ?>
