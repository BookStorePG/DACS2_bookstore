<?php

include 'connect.php';


include 'add_to_cart.php';

?>
    
<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>Giảm tới 70% </h3>
            <p>PageGarden - nơi cung cấp cho bạn những tài liệu bổ ích nhất để giúp bạn nâng cao kiến thức,
                kĩ năng và trở thành một chuyên gia trong lĩnh vực Công nghệ thông tin.</p>
            <a href="?act=shop" class="btn">shop now</a>
        </div>

        <div class="swiper books-slider">
            <div class="swiper-wrapper">
                <a href="" class="swiper-slide"><img src="img/book5.png" alt=""></a>
                <a href="" class="swiper-slide"><img src="img/book4.png" alt=""></a>
                <a href="" class="swiper-slide"><img src="img/Book6.png" alt=""></a>
                <a href="" class="swiper-slide"><img src="img/book8.png" alt=""></a>
                <a href="" class="swiper-slide"><img src="img/book3.png" alt=""></a>
                <a href="" class="swiper-slide"><img src="img/book11.png" alt=""></a>
            </div>
            <img src="img/stand.png" class="stand" alt="">
        </div>

    </div>

</section>

<!------------------ home section end ---------------------->



<!-------------------- icons section starts ------------------->

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-plane"></i>
        <div class="content">
            <h3>free shipping</h3>
            <p>order over $100</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>secure payment</h3>
            <p>100% secure payment</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
            <h3>easy returns</h3>
            <p>10 days returns</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 support</h3>
            <p>call us anytime</p>
        </div>
    </div>

</section>

<!------------------- icons section ends --------------------------->


<!------------------- featured section starts ---------------------->

<section class="featured" id="featured">

    <h1 class="heading"> <span>latest books</span> </h1>

    <div class="containers">

        <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 8") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>

        <form action="" method="post" class="box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="?act=productdetail&id=" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="img/<?php echo $fetch_products['image']; ?>" alt="">
            </div>
            <div class="content">
                <h3><?php echo $fetch_products['name']; ?></h3>
                <div class="price">
                    $<?php echo $fetch_products['price']; ?>
                    <span>$<?php echo $fetch_products['original_price']; ?></span>
                    <button type="submit" name="add_to_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to
                        cart</button>
                </div>
            </div>

            <!-- <input type="number" min="1" name="product_quantity" value="1" class="qty"> -->
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_ori_price" value="<?php echo $fetch_products['original_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
        </form>

        <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

    </div>

    <div class="load-more" style="margin-top: 2rem; text-align:center">
        <a href="?act=shop" class="optn-btn">load more</a>
    </div>


</section>

<!------------------- featured section end ---------------------->

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="img/about.jpg" alt="">
        </div>

        <div class="content">
            <h3>about us</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia
                corporis ratione saepe sed adipisci?</p>
            <a href="?act=about" class="optn-btn">read more</a>
        </div>

    </div>

</section>

<!------------ newsletter section starts ----------------->

<section class="newsletter">

    <div class="content">
        <h3>have any questions?</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet
            ullam voluptatibus?</p>
        <a href="?act=contact" class="optn-btn">contact us</a>
    </div>

</section>

<!------------- newsletter section ends ------------------>
