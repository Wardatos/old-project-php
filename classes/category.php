<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class category{
    private $db;
    private $fm;

    function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
public function insert_category($catname){
  $catname = $this -> fm -> validation($catname);   

  $catname = mysqli_real_escape_string($this->db->link, $catname);

  if (empty($catname)){
    $alert = "Điền tên danh mục pls ? :)) ";
    return $alert;
  } else{
    $query = "INSERT INTO tbl_category(catname) VALUES('$catname')";
    $result = $this->db->insert($query);
    if($result){
        $alert = "<span class = 'success'> Thêm danh mục sản phẩm thành công</span>";
        return $alert;
    }else{
        $alert = "<span class = 'success'> Không thêm được bạn ôi </span>";
        return $alert;
    }
  }
}
  public function show_category(){
    $query = "SELECT * FROM tbl_category order by catid desc";
    $result = $this->db->select($query);
    return $result;
  }
  public function update_category($catname,$id){
    $catname = $this -> fm -> validation($catname);   
    $catname = mysqli_real_escape_string($this->db->link, $catname);
    $id = mysqli_real_escape_string($this->db->link, $id);
    if (empty($catname)){
      $alert = "Điền tên danh mục pls ? :)) ";
      return $alert;
    } else{
      $query = "UPDATE tbl_category SET catname = '$catname' WHERE catid='$id'";
      $result = $this->db->update($query);
      if($result){
          $alert = "<span class = 'success'> Sửa danh mục sản phẩm thành công</span>";
          return $alert;
      }else{
          $alert = "<span class = 'error'> Không sửa được bạn ôi </span>";
          return $alert;
      }
    }
  }
  public function del_category($id){
    $query = "DELETE FROM tbl_category WHERE catid ='$id' ";
    $result = $this->db->delete($query);
    if($result){
      $alert = "<span class = 'success'> Xóa danh mục sản phẩm thành công</span>";
          return $alert;
      }else{
          $alert = "<span class = 'error'> Không Xóa được bạn ôi </span>";
          return $alert;
    }
    
  }
  public function getcatbyid($id){
    $query = "SELECT * FROM tbl_category WHERE catid ='$id' ";
    $result = $this->db->select($query);
    return $result;
  }
  

}
?>
