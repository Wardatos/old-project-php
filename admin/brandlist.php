<?php require_once __DIR__. "/header.php"; ?>
<?php include '../classes/brand.php'?>
<?php
    $brand = new brand();
    if(isset($_GET['delid']) && $_GET['delid']!=NULL){
        $brandid = $_GET['delid'];
        $delbrand = $brand->del_brand($brandid);
    }else 

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
    if(isset($delbrand)){
        echo $delbrand;
    }
    ?>
    <?php
        $show_brand = $brand->show_brand();
        if($show_brand){ 
            $i=0;
            while($result = $show_brand->fetch_assoc()){
               $i++;
            
    ?>
    
    
    

    <tr class ="odd gradex">
        <td><?php echo $i; ?></td>
        <td><?php echo $result['brandname']; ?></td>
        <td><a href="brandedit.php?brandid=<?php echo $result['brandid'] ?>">Sửa</a> || <a onclick = "return confirm('Bạn có chắc muốn xóa không ?')" href="?delid=<?php echo $result['brandid'] ?>">Xóa</a></td>
        </tr>
        <?php
            } 
            } 
        ?>
</main>
<?php require_once __DIR__. "/footer.php"; ?>