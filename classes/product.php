<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class product{
    private $db;
    private $fm;

    function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
public function insert_product($data,$files){


  $productname = mysqli_real_escape_string($this->db->link, $data['productname']);
  $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
  $category = mysqli_real_escape_string($this->db->link, $data['category']);
  $productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
  $price = mysqli_real_escape_string($this->db->link, $data['price']);
  $type = mysqli_real_escape_string($this->db->link, $data['type']);
  
 
    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;
  if ($productname=="" || $brand =="" || $category =="" || $productdesc =="" ||$price=="" || $type=="" || $file_name ==""){
    $alert = "Các trường không được rỗng ";
    return $alert;
  } else{
    move_uploaded_file($file_temp,$uploaded_image);
    $query = "INSERT INTO tbl_product(productname,brandid,catid,productdesc,price,type,image) VALUES('$productname','$brand','$category','$productdesc','$price','$type','$unique_image')";
    $result = $this->db->insert($query);
    if($result){
        $alert = "<span class = 'success'> Thêm sản phẩm thành công</span>";
        return $alert;
    }else{
        $alert = "<span class = 'success'> Không thêm được bạn ôi </span>";
        return $alert;
    }
  }
}
  public function show_product(){
    $query = "SELECT tbl_product.*, tbl_category.catname as catname, tbl_brand.brandname as brandname
    FROM tbl_product INNER JOIN tbl_category on tbl_category.catid = tbl_product.catid INNER JOIN tbl_brand on tbl_brand.brandid = tbl_product.brandid
     ORDER BY tbl_product.productid desc";
    $result = $this->db->select($query);  
    return $result;
  }
  public function update_product($data,$file,$id){
  $productname = mysqli_real_escape_string($this->db->link, $data['productname']);
  $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
  $category = mysqli_real_escape_string($this->db->link, $data['category']);
  $productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
  $price = mysqli_real_escape_string($this->db->link, $data['price']);
  $type = mysqli_real_escape_string($this->db->link, $data['type']);
  
 
    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;
    if ($productname=="" || $brand =="" || $category =="" || $productdesc =="" ||$price=="" || $type=="" ){
      $alert = "Các trường không được rỗng ";
      return $alert;
    } else{ 
      if(!empty($file_name)){
      if($file_size > 2048){
      $alert = "<span class='success'> Kích cỡ hình ảnh nên bé hơn 2MB</span>";
      return $alert;
    }
    elseif(in_array($file_ext,$permited) === false)
    {
      $alert= "<span class='error'> Bạn chỉ có thể upload: -".implode(',',$permited)."</span>";
      return $alert;
    }
    $query = "UPDATE tbl_product SET
     productname = '$productname' ,
     catid = '$category' ,
     brandid = '$brand' ,
     image = '$unique_image', 
     type = '$type' ,
     price = '$price', 
     productdesc = '$productdesc' 
     WHERE productid='$id'";
  }else{
    $query = "UPDATE tbl_product SET
     productname = '$productname' ,
     catid = '$category' ,
     brandid = '$brand' ,
     type = '$type' ,
     price = '$price' ,
     productdesc = '$productdesc' 
     WHERE productid='$id'";
  }
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
  public function del_product($id){
    $query = "DELETE FROM tbl_product WHERE productid ='$id' ";
    $result = $this->db->delete($query);
    if($result){
      $alert = "<span class = 'success'> Xóa sản phẩm thành công</span>";
          return $alert;
      }else{
          $alert = "<span class = 'error'> Không Xóa được bạn ôi </span>";
          return $alert;
    }
    
  }
  public function getproductbyid($id){
    $query = "SELECT * FROM tbl_product WHERE productid ='$id' ";
    $result = $this->db->select($query);
    return $result;
  }
  public function getproduct_feathered(){
    $query = "SELECT * FROM tbl_product  WHERE type ='0' ORDER BY RAND() ";
    $result = $this->db->select($query);
    return $result;
  }
  public function getproduct_slider(){
    $query = "SELECT * FROM tbl_product ORDER BY RAND() LIMIT 5 ";
    $result = $this->db->select($query);
    return $result;
  }
  public function get_details($id){
    $query = "SELECT tbl_product.*, tbl_category.catname as catname, tbl_brand.brandname as brandname
    FROM tbl_product INNER JOIN tbl_category on tbl_category.catid = tbl_product.catid INNER JOIN tbl_brand on tbl_brand.brandid = tbl_product.brandid
     WHERE tbl_product.productid = '$id' ";
    $result = $this->db->select($query);  
    return $result;
  }
  public function getproduct_random(){
    $query = "SELECT * FROM tbl_product ORDER BY RAND() LIMIT 2 ";
    $result = $this->db->select($query);
    return $result;
  }
  public function getproduct_branddell(){
    $query = "SELECT * FROM tbl_product  WHERE brandid ='7' ORDER BY RAND() ";
    $result = $this->db->select($query);
    return $result;
  }
  public function getproduct_brandmsi(){
    $query = "SELECT * FROM tbl_product  WHERE brandid ='6' ORDER BY RAND() ";
    $result = $this->db->select($query);
    return $result;
  }
  public function getproduct_brandasus(){
    $query = "SELECT * FROM tbl_product  WHERE brandid ='8' ORDER BY RAND() ";
    $result = $this->db->select($query);
    return $result;
  }
  public function getproduct_brandhp(){
    $query = "SELECT * FROM tbl_product  WHERE brandid ='9' ORDER BY RAND() ";
    $result = $this->db->select($query);
    return $result;
  }
  public function getproduct_brandacer(){
    $query = "SELECT * FROM tbl_product  WHERE brandid ='10' ORDER BY RAND() ";
    $result = $this->db->select($query);
    return $result;
  }
}

?>
