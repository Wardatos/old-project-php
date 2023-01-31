<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class cart{
    private $db;
    private $fm;

    function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
public function addtocart($id,$quantity){
    $quantity = $this -> fm -> validation($quantity); 
    $quantity = mysqli_real_escape_string($this->db->link, $quantity);
    $id = mysqli_real_escape_string($this->db->link, $id);
    $sid =  session_id();
    $query = "SELECT * FROM tbl_product WHERE productid = '$id'";
    $result = $this->db->select($query)->fetch_assoc();
    $image = $result['image'];
    $price = $result['price'];
    $productname = $result['productname'];
    $check_cart = "SELECT * FROM tbl_cart WHERE productid = '$id' AND sid= '$sid'";
    $result_check = $this->db->select($check_cart);
    if($result_check){
        $msg = "Sản phẩm đã được thêm vào giỏ hàng rồi";
        return $msg;
    }else{
    $query_insert = "INSERT INTO tbl_cart(productid,quantity,sid,image,price,productname) VALUES('$id','$quantity','$sid','$image','$price','$productname')";
    $insert_cart = $this->db->insert($query_insert);
    if($insert_cart){
        header('location:maincart.php');
    }else{
       header('location:404.php');
    }
}
}
public function get_product_cart(){
    $sid =  session_id();
    $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
    $result = $this->db->select($query);
    return $result;
}
public function update_quantity_cart($cartid,$quantity){
    $quantity = mysqli_real_escape_string($this->db->link, $quantity);
    $cartid = mysqli_real_escape_string($this->db->link, $cartid);
    $query = "UPDATE tbl_cart SET
     quantity = '$quantity'
     WHERE cartid='$cartid'";
      $result = $this->db->update($query);
      if($result){
        $msg = "Giỏ hàng được cập nhập thành công!";
        return $msg ;   
      }else { $msg = "Giỏ hàng được cập nhập không thành công!";
        return $msg ;
    }
}
public function del_cart($cartid){
    $cartid = mysqli_real_escape_string($this->db->link, $cartid);
     $query = "DELETE FROM tbl_cart WHERE cartid ='$cartid' ";
     $result = $this->db->delete($query);
        if($result){
              header('Location:maincart.php');
          }else{
            $alert = "Không xóa được bạn ôi";
              return $alert;
        }
}
public function check_cart(){
    $sid =  session_id();
    $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
    $result = $this->db->select($query);
    return $result;
}
}
?>
