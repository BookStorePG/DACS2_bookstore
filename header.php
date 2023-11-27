<?php

include 'connect.php';

session_start();


?>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">
    <div class="header-1">
        <a href="#" class="logo"><img src="img/logo.png" alt=""></a>

        <form  method="post" action="?act=search" class="search-form" >
            <input type="search" name="content" placeholder="search here..." id="search-box">
            <button  type="submit" name="btn-search" for="search-box" class="fas fa-search"></button>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fa fa-heart"></a>
            <?php
               $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
               $row_count = mysqli_num_rows($select_rows); 
            ?>
            <a href="?act=cart" class="cart-num">
                <div id="cart" class="fa fa-shopping-cart"><span><?php echo $row_count; ?></span></div>
            </a>
            <div href="" id="user-btn" class="fas fa-user"></div>

        </div>

        <div class="account-box">
            <?php
            if (isset($_SESSION['user_name'])) { // Kiểm tra xem người dùng đã đăng nhập thành công hay chưa
                ?>
            <p>Hello <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email <span><?php echo $_SESSION['user_email']; ?></span></p>
            <p>Thanks for choosing us<span></span></p>
            <a href="?act=logout" name="logout" class="delete-btn">Logout</a>
            <?php
            } else { // Người dùng chưa đăng nhập
                ?>
            <p>Wellcome to PageGarden</p>
            <a href="?act=login" id="login-btn" name="login" class="btn">Login</a>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="?act=home">home</a>
            <a href="?act=shop">shop</a>
            <a href="?act=about">about</a>
            <a href="?act=contact">contact</a>
            <a href="?act=order">orders</a>
        </nav>
    </div>
</header>


<!--------------------- header section ends ----------------------->

<!--------------------- bottom navbar ----------------->

<nav class="bottom-navbar">
    <a href="?act=home" class="fas fa-home"></a>
    <a href="?act=shop" class="fas fa-list"></a>
    <a href="?act=about" class="fas fa-comments"></a>
    <a href="?act=contact" class="fas fa-address-book"></a>
    <a href="?act=order" class="fas fa-money-check-dollar"></a>
</nav>
<!--------------------- bottom navbar ----------------->
