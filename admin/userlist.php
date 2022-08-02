<?php include_once "../classes/classes.php"; ?>
<?php
    $users = new users();
    if(isset($_GET['delid'])){
        $del = $users->delete_user($_GET['delid']);
    }
    if(isset($del)){
        echo $del;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/asmphp.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        var arrayImg=[];
        arrayImg[0]="./img/banner1.jpg"
        arrayImg[1]="./img/banner2.jpg"
        arrayImg[2]="./img/banner3.png "
        arrayImg[3]="./img/banner4.jpg"
        arrayImg[4]="./img/banner5.jpg"
        var v = 0
        var time
        function previous(){
            if(v==0){
                v=arrayImg.length-1;
            }else{
                v--;
            }
            document.getElementById("anh").src=arrayImg[v];
        
            
        }
        function next() {
            if(v==arrayImg.length-1){
                v=0
            }else{
                v++
            }
            document.getElementById("anh").src=arrayImg[v];
        }
        function stop(){
            clearTimeout(time);     
        }
        function auto(){
            v++
            document.getElementById("anh").src=arrayImg[v];
            if(v==arrayImg.length-1)
            v = -1
            time=setTimeout(auto,1000)
        }
        window.onload=function(){
            time=setTimeout(auto,2000)
        }
        function frist(){
            document.getElementById("anh").src=arrayImg[0];
        }
        function last(){
            document.getElementById("anh").src=arrayImg[4];
        }
    </script>
</head>
<body>
<?php
    include_once "../lib/session.php";
    session::checkSession();
?>
<h3>
Hello, <?php echo $_SESSION['name'] ;?> | 
<?php
    if(isset($_GET['action']) && $_GET['action']=='logout'){
        session_destroy();
        header('Location:dangnhap.php');
    }
?>
<a href="?action=logout">Dang xuat</a>
<a href="userlist.php">Danh sách người dùng</a>
</h3>
    <div class="header">
        <div class="header-top">
            <div class="menu">
                <ul>
                    <li><a href="#">KIỂM TRA TÍCH ĐIỂM </a></li>
                    <li><a href="#">TIN TỨC </a></li>
                    <li><a href="#">LIÊN HỆ </a></li>
                    <li><a href="#">DIỄN ĐÀN</a></li>
                    <li><a href="index.php">TRANG CHU</a></li>
                </ul>
            </div>
            <div class="dangnhap">
                <button><a href="dangnhap.php">Đăng nhập</a></button>
                <button><a href="dangky.php">Đăng ký</a></button>
                <a href="donhang.php"><img src="./img/giohang1.png" alt="" width="50px" ></a>
            </div>
            
        </div>
        <div class="header-logo">
            <div class="logo">
                <a href="index.php"><img src="./img/logo1.png" alt="" width="100px" height="100px"></a>
            </div>
            <div class="loai">
                <ul>
                    <li><a href="#">SIÊU PHẨM</a></li>
                    <li><a href="#">HÀNG HIỆU</a></li>
                    <li><a href="#">ĐA SẮC</a></li>
                    <li><a href="#">HUYỀN THOẠI</a></li>
                    
                </ul>
                <div class="tim">
                    <button>search</button>
                <input type="text" placeholder="Tìm kiếm" >
                </div>
                
            </div>
        </div>
        <div class="banner">
            <img src="./img/banner1.jpg" alt="" id="anh" width="100%" height="400px">
            <div class="nut">
                <button class="but" onclick="frist()">Frist</button>
                <button class="but" onclick="previous()">Previous</button>
                <button class="but" onclick="stop()">Stop</button>
                <button class="but" onclick="auto()">Auto</button>
                <button class="but" onclick="next()">Next</button>
                <button class="but" onclick="last()">Last</button>
            </div>  
        </div>
    </div>
    <div class="content">
<h3><a href="dangky.php">Thêm người dùng</a></h3>
<table border="2" style="border-collapse: collapse; width: 700px;" >
        <caption>Danh sách người dùng</caption>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Xử lý</th>
        </tr>
        <?php
            $listusers = $users->show_users();
            if($listusers){
                while($row = $listusers ->fetch_assoc()){
        ?>
                <tr>
                    <td><?php echo $row['adminId']; ?></td>
                    <td><?php echo $row['adminName']; ?></td>
                    <td><?php echo $row['adminEmail']; ?></td>
                    <td>
                        <a href="useredit.php?editid=<?php echo $row['adminId'] ?>">Sửa</a>|
                        <a onclick="return confirm('Ban co muon xoa nguoi dung nay');" href="?delid=<?php echo $row['adminId'];?>">Xóa</a>
                    </td>
                </tr>
        <?php
                }
            }
        ?>
    </table>
    </div>
    
    <div class="fooder">
        <div class="tenshop">
            <p><h1>BEST</h1> </p>
            <img src="./img/logo2.png" alt="" width="100px" height="100px">
            <h3>BEST "SỰ LỰA CHỌN HOÀN HẢO"</h3>
        </div>
        <div class="lienhe">
            <div class="lh1">
                <h4>Hỗ trợ</h4> <br>
                <p>Mọi sự cố xin liên hệ : 0199999999 hoặc inbox ở fanpage <a href="#">facebook.com</a></p> <br>
                <h4>Chất lượng</h4> <br>
                <p>Đảm bảo tiêu chí ngon bổ rẻ</p><br>
            </div>
            <div class="lh2">
                <h4>FAQ</h4><br>
                <p><a href="#">>Chính sách đổi trả</a></p>
                <p><a href="#">>Chính sách bảo hành</a></p><br>
                <h4>CSKH</h4><br>
                <a href="#">Than phiền/Chăm sóc khách hàng</a><br>
            </div>
            <div class="lh3">
                <h4>Thông tin</h4><br>
                <p><a href="#">>Tuyển dụng</a></p>
                <p><a href="#">>Chính sách và quy định</a></p>
                <p><a href="#">>Cơ chế hoạt động</a></p><br>
            </div>
        </div>
    </div>
</body>
</html>
