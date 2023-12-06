<section class="manage">
        <div class="container-manage">
            <div class="container-box">
                <div class="box-heading">
                    <p>list products</p>
                </div>
                <div class="box-button">
                    <a href="?act=add-product" ><button>add products</button></a>
                </div>
                <div class="table-list">
                    <table>
                         <tr>
                            <th>image</th>
                            <th>name</th>
                            <th>Original Price</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>update date</th>
                            <th>created date </th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                      <?php if(isset($_GET['delete'])){
                                $id=$_GET['delete'];
                                $sql_delete= mysqli_query($conn,"DELETE FROM products WHERE product_id= '$id' ");
                            }
                        ?> 

                        <?php 
                            $item_per_page =!empty($_GET['per_page'])?$_GET['per_page']:6;
                            $current_page =!empty($_GET['page'])?$_GET['page']:1;
                            $offset = ($current_page-1)* $item_per_page;
                            $sql_mq = mysqli_query($conn,"SELECT * FROM products LIMIT ".$item_per_page." OFFSET ".$offset.";");
                            $total_mq = mysqli_query($conn,"SELECT * FROM products");
                            $total_mq= $total_mq->num_rows;
                            $total_page= ceil($total_mq / $item_per_page);

                            $products= $sql_mq->fetch_all(MYSQLI_ASSOC);
                            foreach ($products as $product ){
                   
                        ?>

                            <tr>
                                <td><img src="../img/<?php echo $product['image']?>"></td>
                                <td><p><?php echo $product['name']?></p></td>
                                <td>$<?php echo $product['original_price']?></td>
                                <td>$<?php echo $product['price']?></td>
                                <td><p><?php echo $product['quantity']?></p></td>
                                <td><?php echo $product['update_date']?></td>
                                <td><?php echo $product['created_date']?></td>
                                <td><a href="?act=update-product&update_id=<?php echo $product['product_id']?>">edit</a></td>
                                <td><a href="?act=list-product&delete=<?php echo $product['product_id']?>"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>

                        <?php } ?>

                        <tr>
                            <td colspan ="9"> 
                                <ul class="page" >
                                    <?php for ($num=1;$num<= $total_page;$num++ ){?>
                                        <a href ="?per_page=6&page=<?=$num?>"><?=$num ?></a>
                                    <?php } ?>
                               
                                </ul>
                            </td>
                        </tr>
                        
                    </table>
                </div>

            </div> 
         </div>
    </section> 
