<?php include_once "../lib/database.php" ?>
<?php
    class products{
        public $db;
        public function __construct()
        {
            $this->db = new database();
        }
        //Hien thi
        public function show_like($key){
            $query = "SELECT * from tbl_products where  productName like '%$key%'  ";
            return $this->db->exec($query);
        }
        public function show_arr($id){
            $query = "SELECT * from tbl_products where productId=$id";
            return $this->db->exec($query);
        }
        public function show_product(){
            $query = "Select * from tbl_products order by productId desc";
            return $this->db->select($query);
        }
        public function delete_product($id){
            $query = "DELETE FROM tbl_products where productId = '$id'";
            $result = $this->db->exec($query);
            if($result) return "Xóa thành công";
            else "Xóa không thành công";
        }
        public function update_product($name ,$desc,$price,$img,$id){
            $query = "UPDATE tbl_products SET productName='$name' , product_desc = '$desc' , price='$price' , image='$img' where productId='$id'";
            $result = $this->db->exec($query);
            if($result) return "UPDATE thành công";
            else "UPDATE không thành công";
        }
        public function insertproduct($name,$desc,$price,$img){
            $query = "INSERT INTO tbl_products (productName,product_desc,price,image) VALUES ('$name','$desc','$price','$img')";
            $result = $this->db->exec($query);
            if($result) return "Thêm sản phẩm thành công";
            else return "Thêm sản phẩm thất bại";
        }
    }
?>