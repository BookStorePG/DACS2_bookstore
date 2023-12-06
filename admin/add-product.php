<section class="container-box">
                <div class="box-heading">
                    <p>Add products</p>
                </div>


                <?php
                    if((isset($_POST['add']))){
                        $name=$_POST['name']; 
                        $image=$_FILES['image']['name'];
                        $image_tmp=$_FILES['image']['tmp_name'];
                        $price=$_POST['price'];
                        $original_price=$_POST['original_price'];
                        $quantity=$_POST['quantity'];
                        $publication_date=$_POST['publication_date'];
                        $information=$_POST['information'];
                        $introduction=$_POST['introduction'];
                        $path="../img/";
                    
                    $add=mysqli_query($conn,"INSERT INTO products (name,information,introduction,image,price,original_price,quantity,publication_date) 
                                              VALUES ('$name','$information','$introduction','$image','$price','$original_price','$quantity','$publication_date')");
                    
                    move_uploaded_file($image_tmp,$path.$image); 
                    
                    header("location:?act=list-product");

                    
                }
               
                ?>


                <form method="POST"  class="add-product"  enctype="multipart/form-data" >
                    <div class="wrap-box">
                        <table class="table-add">
                            <tr>
                                <td><label>Name: </label></td>
                                <td><input type="text" name="name"/></td>
                            </tr>
                            <tr>
                                <td><label>image: </label></td>
                                <td><input type="file" name="image"/></td>
                            </tr>
                            <tr>
                                <td><label>quantity: </label></td>
                                <td><input type="number" name="quantity" min="1"/></td>
                            </tr>
                            <tr> 
                                <td><label>price: </label></td>
                                <td><input type="number" name="price"/></td>
                            </tr>
                            <tr>
                                <td><label>original price: </label></td>
                                <td><input type="number" name="original_price"/></td>
                            </tr>
                            <tr>
                                <td><label>publication date: </label></td>
                                <td><input type="date" name="publication_date"/></td>
                            </tr>
                            <tr>
                                <td><label>information: </label></td>
                                <td><textarea name="information" ></textarea></td>
                            </tr>
                            <tr>
                                <td><label>introduction: </label></td>
                                <td><textarea name="introduction"  ></textarea></td>
                            </tr>
                        </table>
                        <div class="button-save">
                            <input type="submit" name="add" value="Save">
                        </div>
                    </div>
                </form>   
    </section> 
