<?php
include 'header.php';
?><?php
if(isset($_GET['cusid'])){
        $cusid = $_GET['cusid'];
        $delcus = $cus->del_cus($cusid);
    }
    ?>
<?php
 
 $cus = new customer();
 $ct = new cart();
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){

        $insertcustomer = $cus->insertcustomer($_POST,$_FILES);
	}
 ?>
     <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Trang thông tin khách hàng</h2>
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
                         <h2 class="sidebar-title">CÁC SẢN PHẨM BẠN CÓ THỂ THÍCH</h2>
                        <?php 
                    $getproduct_feathered = $pd->getproduct_slider();
                                if($getproduct_feathered){
                                    while($result = $getproduct_feathered->fetch_assoc()){
                            ?>
                       
                        <div class="thubmnail-recent">
                            <img src="img/<?php echo $result['image'] ?> " class="recent-thumb" alt="">
                            <h2><a href="detail.php?proid=<?php echo $result['productid']?>"><?php echo $result['productname'] ?> </a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $result['price'] ?> </ins> 
                            </div>                             
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                
                
<?php
if(isset($insertcustomer)){
    echo $insertcustomer;
}
 ?>
 <?php
                            if(isset($delcus)){
                                echo $delcus;
                            }
                         ?>
                            <form enctype="multipart/form-data" action="" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>
                                            

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Họ và tên <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_first_name" name="cusname" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_company_field" class="form-row form-row-wide">
                                                <label class="" for="billing_company">Số điện thoại</label>
                                                <input type="text" value="" placeholder="" id="billing_company" name="phone" class="input-text ">
                                            </p>

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Thành phố <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_first_name" name="city" class="input-text ">
                                            </p>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Quận huyện <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Street address" id="billing_address_1" name="street" class="input-text ">
                                            </p>

                                            <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">Phường/ Xã <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Town / City" id="billing_city" name="town" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Địa chỉ Email <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_email" name="email" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                            <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">Direct Bank Transfer </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </li>
                                        </ul></div> <input type="submit" name="submit" value="Xác nhận!"/>
                                        <?php $showbill = $cus->showbill(); 
                                            if($showbill){
                                                
                                            while($result = $showbill->fetch_assoc()){  
                                                ?>
                                        <a title="Remove this item" class="remove" href="?cusid=<?php echo $result['cusid'] ?>">Reset</a> <?php }} ?>
                                    </div>
                                   

                                </div>

                                <!-- <h3 id="order_review_heading">Your order</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php $get_product_cart = $ct->get_product_cart(); 
                                            if($get_product_cart){
                                                $subtotal = 0;
                                            while($result_cart = $get_product_cart->fetch_assoc()){  
                                                ?>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    <?php echo $result_cart['productname'] ?> <strong class="product-quantity">× <?php echo $result_cart['quantity'] ?></strong> </td>
                                                <td class="product-total">
                                                    <span class="amount"><?php $price = $result_cart['price'] * $result_cart['quantity']; $subtotal += $price; echo $price; ?></span> </td>
                                            </tr>
                                           <?php }} ?>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Tổng hóa đơn</th>
                                                <td><span class="amount"><?php  $sum = Session::get('sum'); echo $sum ?></span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Phí ship</th>
                                                <td>

                                                    Free Shipping
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Phí VAT</th>
                                                <td>
                                                    8%
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Tổng thành phần</th>
                                                <td><strong><span class="amount"><?php $megatotal = $sum + $sum*0.08; echo $megatotal; ?></span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table> -->


                                    

                                        <!-- <div class="form-row place-order">

                                            <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                        </div> -->

                                        <div class="clear"></div>

                                    </div>
                                </div>
                                
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer.php' ?>