<?php

include 'connect.php';

include 'add_to_cart.php';

?>

<!-- arrivals section starts -->

<section class="arrivals" id="arrivals">

    <div class="box-container">
        <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>

        <form action="" method="post" class="box">
            <a href="?act=productdetail&id=<?php echo $fetch_products['product_id']; ?>"><img name="id" class="image"
                    src="img/<?php echo $fetch_products['image']; ?>" alt=""></a>
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="price">$<?php echo $fetch_products['price']; ?></div>
            <div class="price_2">$<?php echo $fetch_products['original_price']; ?></div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_id" value="<?php echo $fetch_products['product_id']; ?>">
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
