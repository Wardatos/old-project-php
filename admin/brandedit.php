<?php require_once __DIR__. "/header.php"; ?>
<?php include '../classes/brand.php' ?>
<?php 
   $brand = new brand();
    if(isset($_GET['brandid']) && $_GET['brandid']!=NULL){
        $brandid = $_GET['brandid'];
    }
    else {
        echo "<script>window.lobrandion ='brandlist.php'</script>";
    }
    if($_SERVER['REQUEST_METHOD']==='POST'){
		$brandname= $_POST['brandname'];

        $updatebrand= $brand ->update_brand($brandname,$brandid);
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
    if(isset($updatebrand)){
        echo $updatebrand;
    }
    ?>
        <?php 
            $get_brand_name = $brand->getbrandbyid($brandid);  
            if($get_brand_name){
                while($result = $get_brand_name->fetch_assoc()){
        ?>
    <form action="" method="post">
    <div class="form-sub-w3ls">
    <input placeholder="Nhập tên danh mục cần sửa" name="brandname" value="<?php echo $result['brandname'] ?>" type="text" ></div>
    <input type="submit" value="Sửa">
    </form>
    <?php 
                }
            }
    ?>
</main>
<?php require_once __DIR__. "/footer.php"; ?>