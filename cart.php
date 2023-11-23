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
    <?php
        if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
        if(isset($_POST['addcart'])){
            $num = 1;
            $product_id= $row_detail['product_id'];
            $image = $row_detail['image'];
            $name = $row_detail['name'];
            $price = $row_detail['price'];
            $quantity = $_POST['quantity-order'];
            $amount =round($price * $quantity,1);
            
            //ktra sp trung trong cart
            $product = 0;
            for($i=0; $i < sizeof($_SESSION['cart']);$i++){
                if($_SESSION['cart'][$i][1]==$name){
                    $product=1;
                    $quantity_new =$quantity + $_SESSION['cart'][$i][3];
                    $_SESSION['cart'][$i][3] = $quantity_new;
                    break;
                }
            }
            if($product==0){
                //them moi sp vao cart
                $sp=[$image,$name,$price,$quantity];
                $_SESSION['cart'][]=$sp; 
            }
            //var_dump($_SESSION['cart']);
        }
        function showcart(){
            if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))){
                for($i=0; $i < sizeof($_SESSION['cart']); $i++){
                    $amount=$_SESSION['cart'][$i][2]*$_SESSION['cart'][$i][3];
                    echo '<tr>
                    <td>'.($i+1).'</td>
                    <td><img src ="img/'.$_SESSION['cart'][$i][0].'"> </td>
                    <td><p>'.$_SESSION['cart'][$i][1].'</p></td>
                    <td><p>'.$_SESSION['cart'][$i][2].'$</p</td>
                    <td><input type="number" min="1"value='.$_SESSION['cart'][$i][3].'></td>
                    <td><P>'.$amount.'$</P></td>
                    <td><span><i class="fa fa-trash-can"></i></span></td>
                </tr>';
                }
            }
        }
        function total(){
            if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))){
                $total_amount=0;
                for($i=0; $i < sizeof($_SESSION['cart']); $i++){
                    $amount=$_SESSION['cart'][$i][2]*$_SESSION['cart'][$i][3];
                    $total_amount += $amount;
                }
                echo 
                    '<tr>
                        <td>total product</td>
                        <td>.......$</td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>'.$total_amount.'$</td>
                    </tr>
                    <tr>
                        <td>Transport fee</td>
                        <td>5,00 $ </td>
                    </tr>
                    <tr>
                    
                        <td>Total amount</td>
                        <td>'.$total_amount+5.00.'$</td>
                    </tr>';
            }
        }
    ?>

    <section class="Cart">
        <h1 class="heading">  <span>cart</span> </h1> 
        <div class="container">
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
        </div>
        <div class="container">
            <div class="cart-content">
                <div class="cart-content-left">
                    <table >
                        <tr>
                            <th>STT</th>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Erase </th>

                        </tr>
                        
                        <tr>
                            <?php showcart();?>
                        </tr>

                    </table>
                    <div class="cart-button">
                        <button class="cart-button-del">Xóa giỏ hàng</button>
                        <a href="?act=shop"><button class="cart-button-order">Tiếp tục đặt hàng</button></a>
                    </div>

                </div>
                <div class="cart-content-right">
                    <table>
                        <tr>
                            <th colspan="2">Total order</th>
                        </tr>

                        <?php total();?>
                        
                        <tr>
                            <td colspan="2">
                                <div class="cart-content-right-text">
                                    <p>You will receive free shipping when you buy 2 or more products</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="cart-content-right-button">
                        <button class="cart-content-right-button-shopping">Shopping</button>
                        <button class="cart-content-right-button-pay">Pay</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php } ?>
