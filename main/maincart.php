<?php
include 'header.php';
 ?>
   <?php 
    if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid'];
        $delcart = $ct->del_cart($cartid);
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $cartid = $_POST['cartid'];
    $quantity = $_POST['quantity'];
    $update_quantity_cart = $ct->update_quantity_cart($cartid,$quantity);}
    ?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản phẩm</h2>
                        <?php
                            $getproduct_feathered = $pd->getproduct_slider();
                                if($getproduct_feathered){
                                    while($result = $getproduct_feathered->fetch_assoc()){
                            ?>
                        <div class="thubmnail-recent">
                            <img src="../admin/uploads/<?php echo $result['image'] ?>" class="recent-thumb" alt="">
                            <h2><a href="detail.php?proid=<?php echo $result['productid']?>"><?php echo $result['productname'] ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $result['price'] ?></ins> 
                            </div>                             
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">   

                            <form method="post" action="#">                           
                        <?php
                            if(isset($update_quantity_cart)){
                                echo $update_quantity_cart;
                            }
                         ?>
                         <?php
                            if(isset($delcart)){
                                echo $delcart;
                            }
                         ?>
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php $get_product_cart = $ct->get_product_cart(); 
                                            if($get_product_cart){
                                                $subtotal = 0;
                                            while($result_cart = $get_product_cart->fetch_assoc()){  
                                            ?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="?cartid=<?php echo $result_cart['cartid'] ?>">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../admin/uploads/<?php echo $result_cart['image'] ?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html"><?php echo $result_cart['productname'] ?> </a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?php echo $result_cart['price'] ?></span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <form action ="" method="post">
                                                    <input type="hidden" name="cartid" size="4" class="input-text qty text" title="Qty" value="<?php echo $result_cart['cartid'] ?>">
                                                    <input type="number" name="quantity" size="4" class="input-text qty text" title="Qty" value="<?php echo $result_cart['quantity'] ?>" min="1" step="1">
                                                    <input type="submit" value="Update Cart" name="submit" class="button" >
                                            </form>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span type="text"><?php $total = $result_cart['quantity'] * $result_cart['price']; echo $total ?></span> 
                                            </td>
                                        </tr>
                                        <?php $subtotal += $total;}} ?> 
                                        
                                    </tbody>
                                </table>
                            </form>
                            

                            <div class="cart-collaterals">


                            <div class="cross-sells">
                                <h2>You may be interested in...</h2>
                                <?php
                            $getproduct_random = $pd->getproduct_random();
                                if($getproduct_random){
                                    while($result_random = $getproduct_random->fetch_assoc()){
                            ?>
                                <ul class="products">
                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="../admin/uploads/<?php echo $result_random['image'] ?>">
                                            <h3><?php echo $result_random['productname'] ?></h3>
                                            <span class="price"><span class="amount"><?php echo $result_random['price'] ?></span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="detail.php?proid=<?php echo $result_random['productid']?>">Xem chi Tiết</a>
                                    </li>
<?php  }} ?>
                                </ul>
                            </div>

                            <?php
                            $check_cart = $ct->check_cart();
                            if($check_cart){
                            ?>
                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>
                    
                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tổng hóa đơn</th>
                                            <td><span class="amount"><?php 
                                             echo $subtotal;
                                             Session::set('sum',$subtotal);
                                              ?></span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping </th>
                                            <td>Free Shipping</td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>VAT </th>
                                            <td>8 %  </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount"><?php $vat = $subtotal * 0.08;
                                            $megatotal = $subtotal + $vat; echo $megatotal ?></span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <tr>
                                            <td class="actions" colspan="6">
                                                <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward">
                                            </td>
                                        </tr>
                            </div>
                                <?php }else{echo 'Mua thêm đi bạn eeiiii!';} ?>
                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>


<?php include 'footer.php' ?>