<style>
    .StripeElement {
  background-color: white;
  height: 40px;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
         
         <div class="form-row">   
        
        <form action="charge.php" method="post" id="payment-form">
          
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" StripeElement StripeElement--empty placeholder="Email">
          </div>


          <div class="form-group">
            <label for="">Phone</label>
            <input type="text" class="form-control" StripeElement StripeElement--empty name="phone"  placeholder="Phone Number">
          </div>   
          
          <?php 
            if (isset($_SESSION['book_id'])) {
         
            foreach ($_SESSION['book_id'] as $value) {
              ?>
             <input type="hidden" name="book_id[<?php echo $value ;?>]">
          <?php  } }?>

         <div id="card-element">
              <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
          

          <button>Submit Payment</button>
        </form>
      

      </div>

      </div>
      
    </div>
  </div>
</div>

