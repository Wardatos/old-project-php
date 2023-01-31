<?php require_once __DIR__. "/header.php"; ?>
<?php include '../classes/brand.php' ?>
<?php
 $brand = new brand();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$brandname= $_POST['brandname'];

        $insertbrand= $brand ->insert_brand($brandname);
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
    <h1>Trang thêm mới thương hiệu</h1>
    <?php
    if(isset($insertbrand)){
        echo $insertbrand;
    }
     ?>
    <form action="brandadd.php" method="post">
    <div class="form-sub-w3ls"><input placeholder="Nhập tên thương hiệu" name="brandname" type="text" required="Vui lòng nhập tên thương hiệu"></div>
    <input type="submit" value="Thêm">
    </form>
</main>
<?php require_once __DIR__. "/footer.php"; ?>