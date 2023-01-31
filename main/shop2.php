<?php 
include 'header.php'; 
?> 
<?php 
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
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="maincontent-area"><!-- Tất cả sản phẩm -->
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Tất cả sản phẩm</h2>
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
    </div> 
    <div class="maincontent-area"><!-- dell -->
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Các sản phẩm thuộc dell</h2>
                        <div class="product-carousel">
                            <?php
                            $getproduct_dell = $pd->getproduct_branddell();
                                if($getproduct_dell){
                                    while($result_dell = $getproduct_dell->fetch_assoc()){
                                
                
                            ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="../admin/uploads/<?php echo $result_dell['image']?>" alt="">
                                    <div class="product-hover">
                                        <a href="detail.php?proid=<?php echo $result_dell['productid']?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="single-product.html"><?php echo $result_dell['productname']?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins><?php echo $result_dell['price']?></ins> 
                                </div> 
                            </div>
                            <?php }}?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="maincontent-area"><!-- msi -->
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản phẩm thuộc MSI</h2>
                        <div class="product-carousel">
                            <?php
                            $getproduct_brandmsi = $pd->getproduct_brandmsi();
                                if($getproduct_brandmsi){
                                    while($result = $getproduct_brandmsi->fetch_assoc()){
                                
                
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
    </div> 
    <div class="maincontent-area"><!-- asus -->
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản phẩm thuộc Asus</h2>
                        <div class="product-carousel">
                            <?php
                            $getproduct_brandasus = $pd->getproduct_brandasus();
                                if($getproduct_brandasus){
                                    while($result = $getproduct_brandasus->fetch_assoc()){
                                
                
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
    </div> 
    <div class="maincontent-area"><!-- HP -->
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản phẩm thuộc HP</h2>
                        <div class="product-carousel">
                            <?php
                            $getproduct_brandhp = $pd->getproduct_brandhp();
                                if($getproduct_brandhp){
                                    while($result = $getproduct_brandhp->fetch_assoc()){
                                
                
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
    </div> 
    <div class="maincontent-area"><!-- acer -->
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản phẩm thuộc Acer</h2>
                        <div class="product-carousel">
                            <?php
                            $getproduct_brandacer = $pd->getproduct_brandacer();
                                if($getproduct_brandacer){
                                    while($result = $getproduct_brandacer->fetch_assoc()){
                                
                
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
    </div> 
   <?php include 'footer.php' ?>