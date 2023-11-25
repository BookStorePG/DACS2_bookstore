<section class="container-box">
                <div class="box-heading">
                    <p>Add products</p>
                </div>
                <form action="?act=list-product" class="add-product">
                    <div class="wrap-box">
                        <table class="table-add">
                            <tr>
                                <td><label>Name: </label></td>
                                <td><input type="text" name=" "/></td>
                            </tr> 
                                <td><label>image: </label></td>
                                <td><input type="file" name=" "/></td>
                            </tr> 
                                <td><label>price: </label></td>
                                <td><input type="text" name=" "/></td>
                            </tr>
                            <tr>
                                <td><label>original price: </label></td>
                                <td><input type="text" name=" "/></td>
                            </tr>
                            <tr>
                                <td><label>publication date: </label></td>
                                <td><input type="date" name=" "/></td>
                            </tr>
                            <tr>
                                <td><label>information: </label></td>
                                <td><textarea name="information" cols="" rows="100px" ><?php if(isset($_POST["information"])) echo ($_POST["tomtat"]) ?></textarea></td>
                            </tr>
                            <tr>
                                <td><label>introduction: </label></td>
                                <td><textarea name="introduction" cols="" rows="" ><?php if(isset($_POST["introduction"])) echo ($_POST["tomtat1"]) ?></textarea></td>
                            </tr>
                        </table>
                        <div class="button-save">
                            <button>Save</button>
                        </div>
                    </div>
                </form>    
    </section> 