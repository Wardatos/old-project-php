<?php require_once __DIR__. "/header.php"; ?>
<?php include '../classes/category.php' ?>
<?php
 $cat = new category();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$catname= $_POST['catname'];

        $insertcat= $cat ->insert_category($catname);
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
    <h1>Trang thêm mới danh mục</h1>
    <?php
    if(isset($insertcat)){
        echo $insertcat;
    }
     ?>
    <form action="addcat.php" method="post">
    <div class="form-sub-w3ls"><input placeholder="Nhập tên danh mục" name="catname" type="text" required="Vui lòng nhập tên danh mục"></div>
    <input type="submit" value="Thêm">
    </form>
</main>
<?php require_once __DIR__. "/footer.php"; ?>