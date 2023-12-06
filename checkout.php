
    <section class="checkout">
        <h1 class="heading"> <span>checkout</span> </h1>
        <div class="check-product">
                <div class="header-checkout-product-content">
                    <div class="product-content-name">
                        <h2>Products</h2>
                    </div>
                    <div class="product-content-price">Price</div>
                    <div class="product-content-quantity">Quantity</div>
                    <div class="product-content-amount">Total price</div>
                </div>
                <?php 
                 $select_cart = mysqli_query($conn, "SELECT cart.id, cart.product_id, cart.quantity, products.name, products.image, products.price 
                                                FROM `cart` 
                                                JOIN `products` ON cart.product_id = products.product_id
                                                WHERE user_id = '$user_id'");
                $grand_total = 0;
                $quantity_total= 0;
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                
                ?>
                <div class="checkout-product-content">
                    <div class="product-info">
                    <img name="id" class="image" src="img/<?php echo $fetch_cart['image']; ?>">

                    <p><?php echo $fetch_cart['name']; ?></td></p>
                    </div>
                    <span>$<?php echo number_format($fetch_cart['price'],2); ?></span>
                    <span><?php echo number_format($fetch_cart['quantity']); ?></span>
                   
                    <span>$<?php echo $sub_total = number_format(($fetch_cart['price'] * $fetch_cart['quantity']),2); ?></span>
                </div>
                <?php    
                    $grand_total += $sub_total; 
                    $quantity = number_format($fetch_cart['quantity']);
                    $quantity_total += $quantity; 
                    };
                    };
                ?>

        </div> 
        <?php
            if(isset($_POST['name'])){
                $user_id = $_SESSION['user_id'];
                $address=$_POST['address'];
                $phone = $_POST['phone_number'];
                $email =$_SESSION['user_email'];
              
                $insert_order =  mysqli_query($conn,"INSERT INTO orders(user_id,phone_number,email,address,total_products,total_price) VALUES ('$user_id','$phone','$email','$address','$quantity_total','$grand_total')");
                if($insert_order){
                    $id_order = mysqli_insert_id($conn);
                    foreach($select_cart as $value){
                        mysqli_query($conn,"INSERT INTO order_detail (id_order,product_id,quantity,price) VALUES ('$id_order','$value[product_id]','$value[quantity]','$value[price]')");

                    }
                }
            }

        ?>
      
        <form method ="POST" >
            <div class="container-checkout">
                <div class="checkout-info">
                    <h2>Information</h2>

                        <label>Name</label> 
                        <div class="form-info-name">
                            <input type="text" name="name" id="" required placeholder=" Name" value="<?php echo $_SESSION['user_name']; ?>">  
                        </div>

                        <label>Email</label> 
                        <div class="form-info-name">
                            <input type="text" name="email" id="" required placeholder=" Email"  value="<?php echo $_SESSION['user_email']; ?>">  
                        </div>

                        <label>Address</label> 
                        <div class="form-info-addr">
                            <input type="text" name="address" id="address" required placeholder=" Address"> 
                        </div> 

                        <label>Phone</label>               
                        <div class="form-info-phone">
                            <input type="text" name="phone_number" id="phone_number" required placeholder=" Phone number">
                        </div> 
                    
                    </div>
                </div>
                <div class="checkout-product">
                    <h2>checkout</h2>
                    <div class="form-checkout">
                        <div class="checkout-total">
                            <label>total product</label>
                            <span><?php echo number_format($quantity_total);?></span>
                        </div>
                        <div class="checkout-price">
                            <label>price</label>
                            <span>$<?php echo number_format($grand_total,2);?></span>
                        </div>
                        <div class="checkout-transp">
                            <label>Transport fee</label>
                            <span>$<?php if($grand_total < 100){
                                        echo '5';
                                        }else{
                                            echo '0';
                                        }
                                    ?>
                            </span>
                        </div>
                        <div class="checkout-amount">
                            <label>Total price</label>
                            <span>$<?php if($grand_total > 100){
                                    echo number_format($grand_total,2);
                                    }else{
                                        echo number_format(($grand_total + 5),2);
                                    }
                                ?></span>
                        </div>

                    </div>
                <div class="checkout-button">
                <button><a href="?act=order">checkout</a></button>
                    </div>
                </div>
            
            </div>
        </form>
   
    </section>

