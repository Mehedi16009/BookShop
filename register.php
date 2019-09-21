    <!-- Header -->
      <?php include 'inc/header.php'; ?>
    <!-- End Header -->
    

    <!-- Navigation -->
      <?php include 'inc/top_nav.php'; ?>
    <!-- Navigation End -->

<?php 

if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['register_submit']))
{


$user_registration=$user->userRegistration($_POST);
}

?>    


<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
           
          <div class="text-center bg-danger">
          	<?php if (isset($user_registration)) {
          		echo $user_registration;
          	} ?>
          </div>
								
		</div>



	</div>
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="login.php">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="register.php" class="active" id="">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" method="post" role="form" >
                                    
                                    <div class="form-group">
										<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="First Name" value="" required >
									</div>

									<div class="form-group">
										<input type="text" name="last_name" id="last_name" tabindex="1" class="form-control" placeholder="Last Name" value="" required >
									</div>

									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required >
									</div>
									<div class="form-group">
										<input type="email" name="email" id="register_email" tabindex="1" class="form-control" placeholder="Email Address" value="" required >
									</div>
									
									<div class="form-group">
										
         								<select name="user_cat_id" id="" class="form-control">
							            <option value="">Select Category</option>
							            
							            <?php 
							             
							              $getcat= $cat->getalluserCat();
							              if ($getcat) {
							                 while ($result=$getcat->fetch_assoc()) {
							                    
							            ?>
							            <option value="<?php echo $result['cat_id'] ; ?>"><?php echo $result['cat_title'] ; ?></option>
							            <?php } } ?>
							        
							        </select>
									</div>



									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register_submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


<?php include 'inc/footer.php'; ?>