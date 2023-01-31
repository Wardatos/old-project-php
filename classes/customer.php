<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class customer{
    private $db;
    private $fm;

    function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insertcustomer($cusdata, $id){
        $cusname = mysqli_real_escape_string($this->db->link, $cusdata['cusname']);
        $phone = mysqli_real_escape_string($this->db->link, $cusdata['phone']);
        $street = mysqli_real_escape_string($this->db->link, $cusdata['street']);
        $city = mysqli_real_escape_string($this->db->link, $cusdata['city']);
        $town = mysqli_real_escape_string($this->db->link, $cusdata['town']);
        $email = mysqli_real_escape_string($this->db->link, $cusdata['email']);
        $sid =  session_id();
        $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
        $getproduct = $this->db->select($query);
        if($getproduct){
            while($result = $getproduct->fetch_assoc()){
                $price = $result['price'];
                $productname = $result['productname'];
                $quantity = $result['quantity'];
                $query_cus = "INSERT INTO tbl_customer(cusname,phone,street,city,town,email,sid, price,productname,quantity) VALUES('$cusname','$phone','$street','$city','$town','$email','$sid','$price','$productname','$quantity')";
                $result_cus = $this->db->insert($query_cus);
                if($result_cus){
                    $alert ="Xác nhận thông tin thành công";
                    return $alert;
                }else{
                    $alert ="Không xác nhận được bạn êii!";
                    return $alert;
                }
            }  
        }
        }
    
    public function showbill(){
            $sid =  session_id();
            $query = "SELECT * FROM tbl_customer WHERE sid = '$sid'";
            $result = $this->db->select($query);
            return $result;
    }
    public function del_cus($cusid){
        $sid = session_id();
        $cusid = mysqli_real_escape_string($this->db->link, $cusid);
         $query = "DELETE FROM tbl_customer WHERE cusid ='$cusid' AND sid ='$sid'";
         $result = $this->db->delete($query);
            if($result){
                  header('Location:checkout.php');
              }else{
                $alert = "Không xóa được bạn ôi";
                  return $alert;
            }
    }
}
?>