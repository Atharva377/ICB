<?php 
  if(!isset($counsumerBought)){
    $counsumerBought = "200+";
  }
  if(!isset($productName)){
    $productName = "Product Name";
  }

  if(!isset($productLink)){
    $productLink = "NA";
  }

  if(!isset($_SESSION["id"]) || $_SESSION['type']=="voluneteer"){
    $action_button_message = "Purchase";
  }else if($_SESSION['type']=="associate"){
    $action_button_message = "Pitch Product";
  }else{
    $action_button_message = "Purchase";
  }

?>

<div class="product-component swiper-slide">
    <div class="card-image">
      <img src="./images/undefined6.png" alt="" class="card-img">
    </div>
  
    <div class="card-content">
      <h2 class="name"><?php echo $productName; ?></h2>
      <div class="product_details">
        <div class="product_details__bought"><?php echo $counsumerBought;?></div>
        <a href="<?php echo $productLink; ?>">
          <button class="product_details__button <?php echo $productLink=="NA"?"inactive":""; ?>" <?php echo $productLink=="NA"?"disabled":""; ?>>
            <?php
              echo $action_button_message; 
            ?>
          </button>
        </a>
        <div class="product_details__watchlater"><img src="./images/watch_later.png" alt="watch_later" class="product_details__watchlater__img"></div>
      </div>

    </div>
  </div>