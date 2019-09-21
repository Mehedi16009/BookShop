    <!-- Header -->
      <?php include 'inc/header.php'; ?>
    <!-- End Header -->
     
      <?php if (Session::get('userlogin') != true || isset($_COOKIE['email'])) {
         $fm->redirect('login.php');
      } ?>

    <!-- Navigation -->
      <?php include 'inc/top_nav.php'; ?>
    <!-- Navigation End -->

    <!-- Page Content -->
    <div class="container">




<div class="row">
      <h4 class="text-center bg-danger"><?php Session::display_message();  ?></h4>
      <h1>Checkout</h1>


    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
             <?php $ct->cart(); ?>
        </tbody>

    </table>
  <?php if ($ct->show_payment_button())  {
     include 'inc/pay_form.php';
    } else { ?>
   
   <p>No Items</p>

   <?php } ?>




<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount">
<?php if(isset($_SESSION['total_quantity'])){ echo $_SESSION['total_quantity'];} ?>
</span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">

  $<?php if(isset($_SESSION['item_total'])){ echo $_SESSION['item_total'];} ?>

</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->

 <?php include 'inc/footer.php'; ?>