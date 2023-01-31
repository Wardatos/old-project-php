<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class brand{
    private $db;
    private $fm;

    function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
public function insert_brand($brandname){
  $brandname = $this -> fm -> validation($brandname);   

  $brandname = mysqli_real_escape_string($this->db->link, $brandname);

  if (empty($brandname)){
    $alert = "Điền tên danh mục pls ? :)) ";
    return $alert;
  } else{
    $query = "INSERT INTO tbl_brand(brandname) VALUES('$brandname')";
    $result = $this->db->insert($query);
    if($result){
        $alert = "<span class = 'success'> Thêm thương hiệu sản phẩm thành công</span>";
        return $alert;
    }else{
        $alert = "<span class = 'success'> Không thêm được bạn ôi </span>";
        return $alert;
    }
  }
}
  public function show_brand(){
    $query = "SELECT * FROM tbl_brand order by brandid desc";
    $result = $this->db->select($query);
    return $result;
  }
  public function update_brand($brandname,$brandid){
    $brandname = $this -> fm -> validation($brandname);   
    $brandname = mysqli_real_escape_string($this->db->link, $brandname);
    $brandid = mysqli_real_escape_string($this->db->link, $brandid);
    if (empty($brandname)){
      $alert = "Điền tên thương hiệu pls ? :)) ";
      return $alert;
    } else{
      $query = "UPDATE tbl_brand SET brandname = '$brandname' WHERE brandid = '$brandid'";
      $result = $this->db->update($query);
      if($result){
          $alert = "<span class = 'success'> Sửa thương hiệu sản phẩm thành công</span>";
          return $alert;
      }else{
          $alert = "<span class = 'error'> Không sửa được bạn ôi </span>";
          return $alert;
      }
    }
  }
  public function del_brand($brandid){
    $query = "DELETE FROM tbl_brand WHERE brandid ='$brandid' ";
    $result = $this->db->delete($query);
    if($result){
      $alert = "<span class = 'success'> Xóa danh mục sản phẩm thành công</span>";
          return $alert;
      }else{
          $alert = "<span class = 'error'> Không Xóa được bạn ôi </span>";
          return $alert;
    }
    
  }
  public function getbrandbyid($brandid){
    $query = "SELECT * FROM tbl_brand WHERE brandid ='$brandid' ";
    $result = $this->db->select($query);
    return $result;
  }
  

}
?>
