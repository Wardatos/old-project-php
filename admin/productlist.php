<?php require_once __DIR__. "/header.php"; ?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php $fm = new Format(); 
     $pd = new product();
    if(isset($_GET['productid'])){
        $id = $_GET['productid'];
        $delproduct = $pd->del_product($id);
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
    <h1>TRANG DANH SÁCH DANH MỤC</h1>
    <?php
        $show_product = $pd->show_product();
        if($show_product){ 
            $i=0;
            while($result = $show_product->fetch_assoc()){
            $i++;
    ?>
   <table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $i?></td>
    </tr>
    <tr>
        <th>Tên sản phẩm</th>
        <td><?php echo $result['productname']?></td>
    </tr>
    <tr>
        <th>Tên danh mục</th>
        <td><?php echo $result['catname']?></td>
    </tr>
    <tr>
        <th>Tên thương hiệu</th>
        <td><?php echo $result['brandname']?></td>
    </tr>
    <tr>
        <th>Image</th>
        <td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td> 
    </tr>
    <tr>
        <th>Price</th>
        <td><?php echo $result['price'] ?></td>
    </tr>
    <tr>
        <th>Mô tả</th>
        <td><?php echo $fm->textShorten($result['productdesc'], 50)?></td>
    </tr>
    <tr>
        <th>Loại</th>
        <td><?php if($result['type']==0){ echo 'Sẵn sàng';}else{ echo 'Không sẵn sàng';}  ?></td>
    </tr>
    <td><a href="productedit.php?productid=<?php echo $result['productid'] ?>">Sửa</a> || <a onclick = "return confirm('Bạn có chắc muốn xóa không ?')" href="?productid=<?php echo $result['productid'] ?>">Xóa</a></td>

    <?php
            } 
            } 
        ?> 
</table>
        
    

</main>
<?php require_once __DIR__. "/footer.php"; ?>