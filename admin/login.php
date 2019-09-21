<?php include 'inc/header_login.php';; 
Session::checkLogin();
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submit']))
  {
    
    
    $admin_login=$ad->admin_login($_POST);
  }



?>

    
    <!-- Navigation -->
     
    <!-- Navigation End -->
  

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group"><label for="">
                    Email<input type="text" name="admin_email" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="admin_pass" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

    <?php include 'inc/footer.php'; ?>