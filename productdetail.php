<?php
    include ("connect.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        $id=" ";
    }
    $sql_detail= mysqli_query($conn,"SELECT *FROM products WHERE product_id ='$id'");
?>

<?php
    while($row_detail = mysqli_fetch_array($sql_detail)){
?>
<section class="product-content">
    <div class="pro">
        <div class="product-top">
        </div>
        <form method="POST" action="?act=cart&id=<?php echo $row_detail['product_id']; ?>">
            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">

                        <img src="img/<?php echo $row_detail['image']?> ">
                    </div>
                    <div class="product-content-left-small-img">
                        
                        <img src="img/<?php echo $row_detail['image']?>">
                        <img src="img/<?php echo $row_detail['image_1']?>">
                        <img src="img/<?php echo $row_detail['image_2']?>">
            
                    </div>
                </div>
                
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1><?php echo $row_detail['name']?></h1>
                        <p>MSP: 10PG105</p>
                    </div>



                    <div class="product-content-right-product-feeback">
                        <div class="product-content-right-product-star">
                            <p>4.9 <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fas fa-star-half-alt"></i></p>
                        </div>
                        <div class="product-content-right-product-Evaluate">
                            <p>10,2k <small>Evaluate</small></p>
                        </div>
                        <div class="product-content-right-product-sold">
                            <p>10,4k<small> Sold</small></p>
                        </div>
                        
                    </div>

                    <div class="product-content-right-product-price">
                        <div class="cost"><small>$<?php echo $row_detail['original_price']?></small></div>
                        <div class="price">$<?php echo $row_detail['price']?></div>
                        <div class="sale">
                            <?php 
                                $sale=round((($row_detail['original_price']-$row_detail['price'])/$row_detail['original_price'])*100,1);
                                echo $sale?>% OFF
                        </div>
                    </div>
                    <div class="product-content-right-product-deal">
                        <p style="font-weight: bold;">Deal</p>
                        <div>Buy with shock deal</div>
                    </div>
                    <div class="quantity" >
                        <p style="font-weight: bold;">Quantity:</p>
                        <input name="quantity-order" type="number" min="1" value="1">
                        <p> <?php echo $row_detail['quantity']?> Products Available</p>
                        <br>  
                    </div>
                    <div class="product-content-right-product-button">
                        
                            <button name="addcart" class="cart"><i class="fas fa-shopping-cart"></i><p>add to cart</p></button>
                            <button class="buy">buy now</button>
                    </div>
                    <div class="product-content-right-product-icon">
                            <div class="product-content-right-product-icon-item">
                                <a href="#" title="+0123456789"><i class="fa-solid fa-phone-flip"></i> Hotline</a>
                            </div>
                            <div class="product-content-right-product-icon-item">
                                <a href="#" title="22itb@vku.udn.vn"><i class="fa-solid fa-envelope"></i> Mail</a>
                            </div>
                            <div class="product-content-right-product-icon-item">
                                <a href="#" title="Chat"><i class="far fa-comments"></i> Chat</a>
                            </div>
                    </div>

                </div>
            </div>
        </form>
        <div class="product-content-bottom">
            <div class="product-content-bottom-top">
                <i class="fa-solid fa-caret-down"></i>
            </div>

            <div class="product-content-bottom-content-big">
                <div class="product-content-bottom-content-title">
                    <div class="product-content-bottom-content-title-item chitiet">
                        <p>DETAILS INFORMATION</p>
                    </div>
                    <div class="product-content-bottom-content-title-item gioithieu">
                        <p>PRODUCT INTRODUCTION</p>
                    </div> 
                    <div class="product-content-bottom-content-title-item pictures">
                        <p>PICTURES</p>
                    </div>   
                </div>
                <div class="product-content-bottom-content">
                    <div class="product-content-bottom-content-chitiet">
                    <?php echo $row_detail['information']?>
                    </div>
                    <div class="product-content-bottom-content-gioithieu">
                    <?php echo $row_detail['introduction']?>
                    </div>
                    <div class="product-content-bottom-content-img">
                        <div class="product-content-left-small-img">
                            <?php echo $row_detail['image_small']?>
    
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<?php }?>

