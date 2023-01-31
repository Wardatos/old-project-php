<?php require_once __DIR__. "/header.php"; ?>
<?php  include '../classes/category.php'; ?>
<?php  include '../classes/brand.php'; ?>
<?php  include '../classes/product.php'; ?>

<?php
 $pd = new product();
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){

        $insertproduct = $pd->insert_product($_POST,$_FILES);
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
<h2>Thêm mới sản phẩm</h2>
<form action="" method="post" enctype="multipart/form-data">
<?php
    if(isset($insertproduct)){
        echo $insertproduct;
    }
     ?>
     <div class="form-group">
        <label>Nhập tên sản phẩm</label></td>
       <td> <input type="text" name="productname" value=""
               class="form-control" id="title"/></td>
    </div>  

    <div class="form-group">
        <label>Ảnh đại diện</label>
        <input type="file" name="image" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
    </div>

    <div class="form-group">
        <label>Giá</label>
        <input type="text" name="price" value=""
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
            <option value="<?php echo $result['catid']?>"><?php echo $result['catname'] ?></option>
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
            <option value="<?php echo $result['brandid'] ?>"><?php echo $result['brandname'] ?></option>
        <?php }}
        ?></select>
    </div>

    <div class="form-group">
        <label>Loại sản phẩm</label>
        <select id="select" name="type">
            <option>Chọn loại sản phẩm</option>
            <option value="1">Nổi bật</option>
            <option value="0">Không nổi bật</option></select>
    </div>

    <div class="form-group">
        <label>Mô tả sản phẩm</label>
        <textarea name="productdesc" class="form-control"></textarea>
    </div>
    <input type="submit" name="submit" value="Thêm"/>
    </form>
</main>
<?php require_once __DIR__. "/footer.php"; ?>