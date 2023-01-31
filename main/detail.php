<?php
include 'header.php';
 ?>
 <?php
 if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
    echo "<script>window.location ='404.php'</script>";
 }else{
    $id = $_GET['proid'];
 }
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $addtocart = $ct->addtocart($id,$quantity);
}
?>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Detail</h2>
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
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <?php
                            $getproduct_feathered = $pd->getproduct_slider();
                                if($getproduct_feathered){
                                    while($result = $getproduct_feathered->fetch_assoc()){
                            ?>
                        <div class="thubmnail-recent">
                            <img src="../admin/uploads/<?php echo $result['image']?>" class="recent-thumb" alt="">
                            <h2><a href=""><?php echo $result['productname']?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $result['price']?></ins> 
                            </div>                             
                        </div>
                        <?php }} ?> 
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="index.php">Home</a>
                            <a href=""></a>
                        </div>
                        <div class="row">
                            <?php 
                            $get_product_detail = $pd->getproductbyid($id);
                            if($get_product_detail){
                                while($result_detail = $get_product_detail->fetch_assoc()){
                            
                            ?>
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="../admin/uploads/<?php echo $result_detail['image'] ?>" alt="">
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $result_detail['productname'] ?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo $result_detail['price'] ?></ins> 
                                    </div>    
                                    
                                    <form action="" method="post" class="cart">
                                        <input type="number" class="add_to_cart_number" name="quantity" value="1" min="1"/>
                                        <button class="add_to_cart_button" name="submit" type="submit">Add to cart</button>
                                    </form>   
                                    <?php if(isset($addtocart)) {echo '<span style="color:red; font-size:18px;">Sản phẩm đã được thêm vào rồi!</span>';} ?> 
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p><?php echo $result_detail['productdesc'] ?></p>
                                                <p></p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                            <?php
                            $getproduct_feathered = $pd->getproduct_slider();
                                if($getproduct_feathered){
                                    while($result = $getproduct_feathered->fetch_assoc()){
                            ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="../admin/uploads/<?php echo $result['image']?>" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="detail.php?proid=<?php echo $result['productid']?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href=""><?php echo $result['productname']?></a></h2>

                                    <div class="product-carousel-price">
                                        <ins><?php echo $result['price']?></ins> 
                                    </div> 
                                    </div>
<?php }} ?>
                                    </div>                            
                                </div>                                    
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer.php' ?>