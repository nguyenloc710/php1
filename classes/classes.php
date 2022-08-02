<?php include_once "../lib/database.php"?>
<?php
    class users{
        public $db;

        public function __construct()
        {
            $this->db = new database();
        }

        //Phương thức hiển thị bảng người dùng
        public function show_users(){
            $query = "Select * from tbl_users order by adminId desc";
            return $this->db->select($query);
        }
        public function login($email,$pass){
            $query = "Select *from tbl_users where adminEmail='$email' and adminPass = '$pass' limit 1";
            // var_dump($query);
            $result = $this->db->select($query);
            if($result){
                $row = $result->fetch_assoc();
                $_SESSION['isLogin']=true;
                $_SESSION['name']=$row['adminName'];
                header('Location:userlist.php');
            }else return "Sai email hoặc mật khẩu";
        }
        public function delete_user($id){
            $query = "DELETE from tbl_users where adminId='$id'";
            $result = $this->db->exec($query);
            if($result) return "xoa nguoi dung thanh cong";
            else return "xoa khong thanh cong";
        }
        public function update_user($name,$id){
            $query = "UPDATE tbl_users SET adminName='$name' where adminId='$id'";
            $result = $this->db->exec($query);
            if($result) return "Sửa người dùng thành công";
            else false;
        }
        public function insert_user($name,$email,$pass){
            $query ="INSERT INTO tbl_users (adminName,adminEmail,adminPass) VALUES ('$name','$email','$pass')";
            $result = $this->db->exec($query);
            if($result) return "Thêm người dùng thành công";
            else return "Thêm người dùng không thành công";
        }
        
    }
?>