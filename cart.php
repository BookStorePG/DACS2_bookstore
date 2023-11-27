<?php

include 'connect.php';


if(isset($_POST['update_update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
    if($update_quantity_query){
       header('location:?act=cart');
    };
 };

 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
    header('location:?act=cart');
 };

 if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart`");
    header('location:?act=cart');
 }

?>

<section class="shopping-cart">

    <h1 class="heading"><span>cart</span></h1>

    <div class="cart-top-wrap">
        <div class="cart-top">
            <div class="cart-top-cart cart-top-item">
                <i class="fa fa-shopping-cart cart-top-item"></i>
            </div>
            <div class="cart-top-cart">
                <i class="fa fa-map-marker-alt cart-top-item"></i>
            </div>
            <div class="cart-top-cart ">
                <i class="fa fa-money-check-alt cart-top-item"></i>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <th>product</th>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>total price</th>
            <th>delete</th>
        </thead>

        <tbody>

            <?php 

            $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
            $grand_total = 0;
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            ?>

            <tr>
                <td><img src="img/<?php echo $fetch_cart['image']; ?>" height="160" alt=""></td>
                <td><?php echo $fetch_cart['name']; ?></td>
                <td>$<?php echo number_format($fetch_cart['price'],2); ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                        <input type="number" name="update_quantity" min="1"
                            value="<?php echo $fetch_cart['quantity']; ?>">
                        <input type="submit" value="update" name="update_update_btn">
                    </form>
                </td>
                <td>$<?php echo $sub_total = number_format(($fetch_cart['price'] * $fetch_cart['quantity']),2); ?>
                </td>
                <td>
                    <a href="?act=cart&remove=<?php echo $fetch_cart['id']; ?>"
                        onclick="return confirm('remove item from cart?')" class="remove">
                        <i class="fas fa-trash-can"></i>
                    </a>
                </td>
            </tr>
            <?php
                $grand_total += $sub_total;  
                };
            };
            ?>

            <tr class="table-bottom">
                <td colspan="3">grand_total</td>
                <td></td>
                <td>$<?php echo $grand_total; ?></td>
                <td><a href="?act=cart&delete_all" onclick="return confirm('are you sure you want to delete all?');"
                        class="delete-btn"> <i class="fas fa-trash-can"></i> all</a></td>
            </tr>
            <tr class="table-bottom">
                <td colspan="3" class="free-ship">You will receive free shipping when you order over $100</td>
                <td colspan="3"></td>
            </tr>
            <tr class="table-bottom">
                <td colspan="3">transport fee</td>
                <td></td>
                <td>$5.00</td>
                <td></td>
            </tr>
            <tr class="table-bottom">
                <td colspan="3">grand total</td>
                <td></td>
                <td>
                    <strong>$<?php if($grand_total > 100){
                                echo $grand_total;
                                }else{
                                    echo number_format(($grand_total + 5),2);
                                }
                            ?>
                    </strong>
                </td>
                <td class="checkout-btn">
                    <a href="?act=checkout" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">checkout</a>
                </td>
            </tr>

        </tbody>

    </table>

    <div class="cont-btn">
        <a href="?act=shop" class="optn-btn">continue shopping</a>
    </div>

</section>
