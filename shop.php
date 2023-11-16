<?php

include 'connect.php';

// session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:?act=home');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_ori_price = $_POST['product_ori_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!-- arrivals section starts -->

<section class="arrivals" id="arrivals">

    <h1 class="heading"> <span>new arrivals</span></h1>

    <div class="box-container">
        <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>

        <form action="" method="post" class="box">
            <img class="image" src="img/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="price">$<?php echo $fetch_products['price']; ?></div>
            <div class="price_2">$<?php echo $fetch_products['original_price']; ?></div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_ori_price" value="<?php echo $fetch_products['original_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            <button type="submit" value="wishlist" name="add_to_wish" class="delete-btn"><i
                    class="fas fa-heart"></i></button>
            <button type="submit" name="add_to_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to
                cart</button>
        </form>

        <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

    </div>

</section>
