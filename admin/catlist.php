<?php require_once __DIR__. "../header.php"; ?>
<?php include '../classes/category.php'?>
<?php
    $cat = new category();
    if(isset($_GET['delid']) && $_GET['delid']!=NULL){
        $id = $_GET['delid'];
        $delcat = $cat->del_category($id);
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
    if(isset($delcat)){
        echo $delcat;
    }
    ?>
    <?php
        $show_cat = $cat->show_category();
        if($show_cat){ 
            $i=0;
            while($result = $show_cat->fetch_assoc()){
               $i++;
            
    ?>
    
    
    

    <tr class ="odd gradex">
        <td><?php echo $i; ?></td>
        <td><?php echo $result['catname']; ?></td>
        <td><a href="catedit.php?catid=<?php echo $result['catid'] ?>">Sửa</a> || <a onclick = "return confirm('Bạn có chắc muốn xóa không ?')" href="?delid=<?php echo $result['catid'] ?>">Xóa</a></td>
        </tr>
        <?php
            } 
            } 
        ?>
</main>
<?php require_once __DIR__. "/footer.php"; ?>