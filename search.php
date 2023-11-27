
<?php
    if( isset($_POST['btn-search'])){
        $content = $_POST['content'];
    }else{
        $content ='';
    }  
?>
<?php
    include "connect.php";
    include 'add_to_cart.php';
    
    $sql = "SELECT * FROM products WHERE name LIKE '%$content%'";
    $result = mysqli_query($conn, $sql);
    
?>
 <section class="arrivals" id="arrivals">   
    <div class="box-container">

        <?php 
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result) ){
        ?>

        <form action="" method="post" class="box">
            <a href="?act=productdetail&id=<?php echo $row['product_id']?>">
                <img name="id" class="image" src="img/<?php echo $row['image']; ?>" alt="">
            </a>
            <div class="name"><?php echo $row['name']; ?></div>
            <div class="price">$<?php echo $row['price']; ?></div>
            <div class="price_2">$<?php echo $row['original_price']; ?></div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
            <input type="hidden" name="product_ori_price" value="<?php echo $row['original_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
            <button type="submit" value="wishlist" name="add_to_wish" class="delete-btn"><i
                    class="fas fa-heart"></i></button>
            <button type="submit" name="add_to_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to
                cart</button>
        </form>
        <?php
        }
        }else{
           echo '<p class="empty">no products has found</p>';
        }
        ?>
</section>
