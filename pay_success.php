
<?php include 'inc/header.php'; ?>

<?php 
if (!empty($_GET['tid']) && !empty($_GET['product'])) {
	$GET = filter_var_array($_GET,FILTER_SANITIZE_STRING);
	
	$product = $GET['product'];
	$tid = $GET['tid'];
}else{

	header('Location: index.php');
}

?>



	<div class="container">
		<h2>Thank You Purchasing <?php echo $product ;?></h2>
		<hr>
		<p>
			Your Transaction id is <?php echo $tid; ?>
		</p>
		<p>
			Check your Email for more Info.
		</p>
		<p>
			<a href="index.php" class="btn btn-light mt-2">Go Back</a>
		</p>
	</div>
	

<?php include 'inc/footer.php'; ?>