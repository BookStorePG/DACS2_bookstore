
<?php
    if( isset($_POST['btn-search'])){
        $content = $_POST['content'];
    }else{
        $content ='';
    }  
?>
<?php
    include "connect.php";
    $sql = "SELECT * FROM products WHERE name LIKE '%$content%'";
    $result = mysqli_query($conn, $sql);
    
?>
 <section class="arrivals" id="arrivals">   
    <h1 class="heading">  <span>new arrivals</span></h1>
    <?php 
        while($row = mysqli_fetch_array($result) ){
    ?>   
    <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
            <a href="?act=shop?pagegarden=products&id=<?php echo $row['product_id']?>" class="swiper-slide box">

                <div class="image">
                    <img src="img/<?php echo $row['image'] ?>" >
                </div>
                <div class="content">
                    <h3><?php echo $row['name']?></h3>
                    <div class="price"><?php echo number_format($row['price']).'$'?><span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

            </a>
        </div>
    </div>
        <?php
            } 
        ?>
</section>
