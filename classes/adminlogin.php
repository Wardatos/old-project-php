<?php
$filepath = realpath(dirname(__FILE__));
    include ($filepath.'/../lib/session.php');
    Session::checkLogin();
    include ($filepath.'/../lib/database.php');
    include ($filepath.'/../helpers/format.php');
 ?>
<?php
    class adminlogin{
        private $db;
        private $fm;

        function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
    public function login_admin($admin_user , $admin_pass){
      $admin_user = $this -> fm -> validation($admin_user);  
      $admin_pass = $this -> fm -> validation($admin_pass); 

      $admin_user = mysqli_real_escape_string($this->db->link, $admin_user);
      $admin_pass = mysqli_real_escape_string($this->db->link, $admin_pass);

      if (empty($admin_user) || empty($admin_pass)){
        $alert = "Phải điền tài khoản hoặc mật khẩu";
        return $alert;
      } else{
        $query = "SELECT * FROM tbl_admin WHERE admin_user = '$admin_user' AND admin_pass = '$admin_pass' LIMIT 1";
        $result = $this->db->select($query);

        if($result != false){
            $value = $result->fetch_assoc();
            Session::set('adminlogin', true);
            Session::set('admin_id',$value['admin_id']);
            Session::set('admin_user',$value['admin_user']);
            Session::set('admin_pass',$value['admin_pass']);
            header('Location:home.php');
            
        }else{
            $alert = "Tài khoản hoặc mật khẩu không đúng";
            return $alert;
        }
      }
    }
    public function register($admin_user , $admin_pass){
      $admin_user = $this -> fm -> validation($admin_user);  
      $admin_pass = $this -> fm -> validation($admin_pass); 

      $admin_user = mysqli_real_escape_string($this->db->link, $admin_user);
      $admin_pass = mysqli_real_escape_string($this->db->link, $admin_pass);

      if (empty($admin_user) || empty($admin_pass)){
        $alert = "Phải điền tài khoản hoặc mật khẩu";
        return $alert;
      } else{
        $query = "INSERT INTO tbl_admin(admin_user, admin_pass) 
        VALUES('$admin_user', '$admin_pass')";
        $result = $this->db->insert($query);
        
    }
}
 }
 ?>