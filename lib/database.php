<?php include_once "../config/congif.php"?>
<?php
    class database{
        public $host = DB_HOST;
        public $user = DB_USER;
        public $pass = DB_PASS;
        public $dbname = DB_NAME;

        public $link;
        public $error;
        public function __construct()
        {
            $this->connectBD();
        }
        //PHương thức kết nối cơ sở dữ liệu
        public function connectBD(){
            $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
            mysqli_set_charset($this->link,'UTF8');
            if(!$this->link){
                $this->error = "Lỗi kết nối:" .$this->link->connect_error;
                return false;
            }
        }
        //PHương thức dùng để Select dữ liệu
        public function select($query){
            $result = $this->link->query($query);
            if($result->num_rows > 0) {echo "OK";return $result;}
            else return false;
        }
        //Phương thức dùng để Isert , Update , Dalete dữ liệu
        public function exec($query){
            $result = $this->link->query($query);
            if($result) 
                return $result;
            else false;
        }
    }
?>