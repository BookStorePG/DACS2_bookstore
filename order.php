<section class="placed-orders">

    <h1 class="heading"> <span>placed orders</span> </h1>

    <div class="box-container">
    <?php 
        $select_order = mysqli_query($conn, "SELECT phone_number,email,cash_payment,address,total_products ,total_price ,order_date
                                            FROM `orders` 
                                            WHERE user_id = '$user_id'");
                
                if(mysqli_num_rows($select_order) > 0){
                    while($fetch_order = mysqli_fetch_assoc($select_order)){        
    ?>

        <div class="box">
            <p> placed on : <span>abc</span> </p>
            <p> name : <span><?php echo $_SESSION['user_name'] ?></span> </p>
            <p> number : <span><?php echo $fetch_order['phone_number'] ?></span> </p>
            <p> email : <span><?php echo $fetch_order['email'] ?></span> </p>
            <p> address : <span><?php echo $fetch_order['address'] ?></span> </p>
            <p> payment cash : <span><?php echo $fetch_order['cash_payment'] ?></span> </p>
            <p> your orders : <span><?php echo $fetch_order['total_products'] ?></span> </p>
            <p> total price : <span><?php echo $fetch_order['total_price'] ?></span> </p>
            <p> order date : <span><?php echo $fetch_order['order_date'] ?></span> </p>
            <p> payment status : <span style="color: red;"> pending</span> </p>
        </div>
        <?php 
            };
            };
        ?>
    </div>

</section>
