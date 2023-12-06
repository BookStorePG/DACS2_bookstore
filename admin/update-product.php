<section class="container-box">
                <div class="box-heading">
                    <p>update products</p>
                </div>


                <?php
                    if((isset($_POST['update']))){
                        $id=$_POST['id_update'];
                        $name=$_POST['name']; 
                        $image=$_FILES['image']['name'];
                        $image_tmp=$_FILES['image']['tmp_name'];
                        $price=$_POST['price'];
                        $original_price=$_POST['original_price'];
                        $quantity=$_POST['quantity'];
                        $publication_date=$_POST['publication_date'];
                        $information=$_POST['information'];
                        $introduction=$_POST['introduction'];
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $update_time = date("Y-m-d H:i:s");
                        $path="../img/";

                        if($image==''){
                            $sql_update=" UPDATE products SET name='$name' ,information='$information',introduction='$introduction', price='$price', quantity='$quantity',publication_date ='$publication_date', update_date ='$update_time' WHERE product_id ='$id' ";  
                        }else{
                            $sql_update=" UPDATE products SET name='$name' ,information='$information',introduction='$introduction',image='$image', price='$price', quantity='$quantity',publication_date = '$publication_date', update_date ='$update_time' WHERE product_id ='$id'" ; 
                            move_uploaded_file($image_tmp,$path.$image);
                        }
                    
                        mysqli_query($conn,$sql_update);
                    
                    header("location:?act=list-product");

                    
                }
                ?>
                <?php

                if((isset($_GET['act'])=='update-product')){
                            $id_update=$_GET['update_id']; 
                            $sql_update=mysqli_query($conn,"SELECT * FROM products WHERE product_id = '$id_update'");
                            $row_update=mysqli_fetch_array($sql_update);
                                   
                ?>

                <form method="POST"  class="add-product"  enctype="multipart/form-data" >
                    <div class="wrap-box">
                        <table class="table-add">
                            <tr>
                                <td><label>Name: </label></td>
                                <td><input type="text" name="name" value="<?php echo $row_update['name']?>"/></td>
                                    <input type="hidden" name="id_update" value="<?php echo $row_update['product_id']?>"/></td>

                            </tr>
                            <tr>
                                <td><label>image: </label></td>
                                <td><input type="file" name="image" multiple></td>
                             </tr>        

                            <tr>  <td></td>   
                                <td><img src="../img/<?php echo $row_update['image']?>" height="65" width="50px">
                               
                                <?php 
                                    if (isset($row_update['image_1']) && !empty($row_update['image_1']) && isset($row_update['image_2']) && !empty($row_update['image_2'])) {
                                        echo '
                                            <img src="../img/' . $row_update['image_1'] . '" height="65" width="50px">
                                            <img src="../img/' . $row_update['image_2'] . '" height="65" width="50px">
                                        ';
                                    }
                                ?>
                            
                                </td>
                            </tr>
                            <tr>
                                <td><label>quantity: </label></td>
                                <td><input type="number" name="quantity" min="1"value="<?php echo $row_update['quantity']?>"/></td>
                            </tr>
                            <tr> 
                                <td><label>price: </label></td>
                                <td><input type="number" name="price" value="<?php echo $row_update['price']?>"/></td>
                            </tr>
                            <tr>
                                <td><label>original price: </label></td>
                                <td><input type="number" name="original_price" value="<?php echo $row_update['original_price']?>"/></td>
                            </tr>
                            <tr>
                                <td><label>publication date: </label></td>
                                <td><input type="date" name="publication_date" value="<?php echo $row_update['publication_date']?>"/></td>
                            </tr>
                            <tr>
                                <td><label>information: </label></td>
                                <td><textarea name="information" cols="information" rows="100px" value="" ><?php echo $row_update['information']?></textarea></td>
                            </tr>
                            <tr>
                                <td><label>introduction: </label></td>
                                <td><textarea name="introduction" cols="" rows="" value=""><?php echo $row_update['introduction']?></textarea></td>
                            </tr>
                        </table>
                        <div class="button-save">
                            <input type="submit" name="update" value="Save">
                        </div>
                    </div>
                </form>   
                <?php }?>
    </section> 