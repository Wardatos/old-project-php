<?php 
include 'header.php'; 
include 'slider.php';
?> 
<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $addtocart = $ct->addtocart($id,$quantity);
}
    ?>
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            <?php
                            $getproduct_feathered = $pd->getproduct_feathered();
                                if($getproduct_feathered){
                                    while($result = $getproduct_feathered->fetch_assoc()){
                                
                
                            ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="../admin/uploads/<?php echo $result['image']?>" alt="">
                                    <div class="product-hover">
                                        <a href="detail.php?proid=<?php echo $result['productid']?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="single-product.html"><?php echo $result['productname']?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins><?php echo $result['price']?></ins> 
                                </div> 
                            </div>
                            <?php }}?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/hp.png" alt="">
                            <img src="img/dell.png" alt="">
                            <img src="img/acer.jpg" alt="">
                            <img src="img/asus.jpg" alt="">
                            <img src="img/msi.png" alt="">            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->

   <?php include 'footer.php' ?>