<?php require_once __DIR__. "/header.php"; ?>
<?php  include '../classes/category.php'; ?>
<?php  include '../classes/brand.php'; ?>
<?php  include '../classes/product.php'; ?>

<?php
 $pd = new product();
 if(isset($_GET['productid']) && $_GET['productid']!=NULL){
     $id = $_GET['productid'];
 }
 else {
     echo "<script>window.location ='productlist.php'</script>";
 }
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $updateproduct = $pd->update_product($_POST, $_FILES, $id);
 }
?>
<div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        ADMIN
                    </div>
                </nav>
            </div>
<div id="layoutSidenav_content">
<main>
<h2>Sửa sản phẩm</h2>
<?php
    if(isset($updateproduct)){
        echo $updateproduct;
    }
     ?>
     <?php 
     $get_product_by_id = $pd->getproductbyid($id);
        if($get_product_by_id){
            while($resultproduct = $get_product_by_id->fetch_assoc()){
        
     ?>
<form action="" method="post" enctype="multipart/form-data">

     <div class="form-group">
        <label>Tên sản phẩm</label></td>
       <td> <input type="text" name="productname" value="<?php echo $resultproduct['productname'] ?>"
               class="form-control" id="title"/></td>
    </div>  

    <div class="form-group">
        <label>Ảnh đại diện</label>
        <input type="file" name="image" value="" class="form-control" id="avatar"/>
        <img src="uploads/<?php echo $resultproduct['image'] ?>" width="120">
    </div>

    <div class="form-group">
        <label>Giá</label>
        <input type="text" name="price" value="<?php echo $resultproduct['price'] ?>"
               class="form-control" id="price"/>
    </div>

    <div class="form-group">
        <label>Danh mục</label>
        <select id="select" name="category">
            <option>Chọn danh mục</option>
            <?php $cat = new category(); 
            $catlist= $cat->show_category(); 
            if($catlist){
                while($result=$catlist->fetch_assoc()){
            ?>
            <option 
            <?php if($result['catid']==$resultproduct['catid']){ echo 'selected';}
            ?>
             value="<?php echo $result['catid']?>"><?php echo $result['catname'] ?></option>
            <?php } 
             }?></select>
    </div>

    <div class="form-group">
        <label>Thương hiệu</label>
        <select id="select" name="brand">
            <option>Chọn thương hiệu</option>
            <?php $brand = new brand(); 
            $brandlist= $brand->show_brand(); 
            if($brandlist){
                while($result=$brandlist->fetch_assoc()){
            ?>
            <option 
            <?php if($result['brandid']==$resultproduct['brandid']){ echo 'selected';}
            ?>
             value="<?php echo $result['brandid'] ?>"><?php echo $result['brandname'] ?></option>
        <?php }}
        ?></select>
    </div>

    <div class="form-group">
        <label>Loại sản phẩm</label>
        <select id="select" name="type">
            <option>Chọn loại sản phẩm</option>
            <?php if($resultproduct['type']==0){ 
                ?>
            <option selected value="1">Nổi bật</option>
            <option value="0">Không nổi bật</option>
            <?php }else{
                ?>
                <option  value="1">Nổi bật</option>
            <option selected value="0">Không nổi bật</option>
            <?php 
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Mô tả sản phẩm</label>
        <textarea name="productdesc" class="form-control" value="<?php echo $resultproduct['productdesc'] ?>"></textarea>
    </div>
    <input type="submit" name="submit" value="Sửa"/>
    <?php } }?>
    </form>
</main>
<?php require_once __DIR__. "/footer.php"; ?>