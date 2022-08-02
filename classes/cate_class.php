<?php include_once "../lib/database.php"?>
<?php
    class cates{
        public $db;
        public function __construct()
        {
            $this->db = new database();
        }
        //Hiển thị bảng
        public function show_cates(){
            $query = "Select * from tbl_categories order by catId desc";
            return $this->db->select($query);
        }
        public function delete_cates($id){
            $query ="DELETE FROM tbl_categories where catId ='$id'";
            $result = $this->db->exec($query);
            if($result) return "Xoa danh muc thanh cong";
            else return "Xoa danh muc khon thanh cong";
        }
        public function update_cates($name,$id){
            $query = "UPDATE tbl_categories SET catName='$name' where catId='$id'";
            $result = $this->db->exec($query);
            if($result) return "Sửa danh muc dùng thành công";
            else false;
        }
        public function insert_cates($name){
            $query = "INSERT INTO tbl_categories (catName) VALUES ('$name')";
            $result = $this->db->exec($query);
            if($result) return "Thêm danh muc dùng thành công";
            else return "Thêm  danh muc không thành công";
        }
    }
?>