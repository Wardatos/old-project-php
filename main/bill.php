<?php
include 'header.php';
 ?>
 <?php
 $cus = new customer();
 $ct = new cart();
 ?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Thôn tin hóa đơn</h2>
                    </div>
                </div>
            </div>
        </div>
</div> 
</div>
    <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Người đặt hàng</th>
                                                <th class="product-total">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php $showbill = $cus->showbill(); 
                                            if($showbill){
                                                
                                            while($result = $showbill->fetch_assoc()){  
                                                ?>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    Họ và tên </td>
                                                <td class="product-total">
                                                    <span class="amount"><?php echo $result['cusname']  ?></span> </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Số điện thoại </th>
                                                <td><span class="amount"><?php  echo $result['phone']  ?></span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Địa chỉ</th>
                                                <td>

                                                <?php  echo $result['town'] ?>,<?php  echo $result['street'] ?>,<?php  echo $result['city'] ?>
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Email</th>
                                                <td>
                                                <?php  echo $result['email'] ?>
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Sản phẩm</th>
                                                <td>
                                                <?php $get_product_cart = $ct->get_product_cart(); 
                                            if($get_product_cart){
                                                $subtotal = 0;
                                            while($result_cart = $get_product_cart->fetch_assoc()){  
                                            ?>
                                                <?php echo $result_cart['productname'] ?> <strong class="product-quantity">× <?php echo $result_cart['quantity'] ?></strong>
                                                <?php }} ?>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>   
                                    <?php }} ?>    
                                            </div>                                                    
 
 
                                            <?php include 'footer.php' ?>