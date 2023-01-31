<?php require_once __DIR__. "/header.php"; ?>
<?php include '../classes/category.php' ?>
<?php 
   $cat = new category();
    if(isset($_GET['catid']) && $_GET['catid']!=NULL){
        $id = $_GET['catid'];
    }
    else {
        echo "<script>window.location ='catlist.php'</script>";
    }
    if($_SERVER['REQUEST_METHOD']==='POST'){
		$catname= $_POST['catname'];

        $updatecat= $cat ->update_category($catname,$id);
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
    <h1>Trang sửa danh mục</h1>
    <?php
    if(isset($updatecat)){
        echo $updatecat;
    }
    ?>
        <?php 
            $get_cat_name = $cat->getcatbyid($id);  
            if($get_cat_name){
                while($result = $get_cat_name->fetch_assoc()){
        ?>
    <form action="" method="post">
    <div class="form-sub-w3ls">
    <input placeholder="Nhập tên danh mục cần sửa" name="catname" value="<?php echo $result['catname'] ?>" type="text" ></div>
    <input type="submit" value="Sửa">
    </form>
    <?php 
                }
            }
    ?>
</main>
<?php require_once __DIR__. "/footer.php"; ?>