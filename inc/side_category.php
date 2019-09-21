 
 <div class="col-md-3">
    <p class="lead">Category</p>
    <?php 
      $result = $cat->getallCat();
      if($result)
        {
          while ($value=$result->fetch_assoc()) {
       ?>

    <div class="list-group">
        <a href="category.php?id=<?php echo $value['cat_id'] ?>" class="list-group-item"><?php echo $value['cat_title']; ?></a>
    </div>

    <?php } } ?>
</div>