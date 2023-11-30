<?php

include 'connect.php';


if(isset($_POST['add_to_cart'])){

    $user_id = $_SESSION['user_id']; 
    
    if(!isset($user_id)){
    
        echo '<script>alert("Login to countinue..")</script>';
        echo '<script>window.location="?act=login"</script>';
        
    }else{
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_ori_price = $_POST['product_ori_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;

        $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_id IN (SELECT product_id FROM `products` WHERE product_id = '$product_id') AND user_id = '$user_id'") or die('query failed');

        if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart!';
        header('location:?act=cart');
        }else{
        mysqli_query($conn, "INSERT INTO `cart`(user_id, product_id, quantity) VALUES('$user_id', '$product_id', '$product_quantity')") or die('query failed');
        $message[] = 'product added to cart!';
        header('location:?act=cart');
        }
    }
    
}


?>
