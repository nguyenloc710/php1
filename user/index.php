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
</h3>
    <div class="header">
        <div class="header-top">
            <div class="menu">
                <ul>
                    <li><a href="#">KIỂM TRA TÍCH ĐIỂM </a></li>
                    <li><a href="#">TIN TỨC </a></li>
                    <li><a href="#">LIÊN HỆ </a></li>
                    <li><a href="#">DIỄN ĐÀN</a></li>
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
                <a href="asm.php"><img src="./img/logo1.png" alt="" width="100px" height="100px"></a>
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
    <!-- <div class="content">
        <div class="product">
            <div class="tenloai">
                <h3>TRANG PHỤC MỚI</h3>
            </div>
            <div class="product-zed">
                <div class="p1">
                    <img src="./img/zed-hoi-tu-than.jpg" alt="" width="400px" height="450px">
                    <span><h4>ZED HỘI TỬ THẦN</h4></span> <br>
                    <button>Mua hàng</button>
                </div>
                <div class="p1">
                    <img src="./img/zed2.jpg" alt=""width="400px" height="450px">
                    <span><h4>ZED SIÊU PHẨM</h4></span> <br>
                    <button>Mua hàng</button>
                </div>
                <div class="p1">
                    <img src="./img/zed1.jpg" alt=""width="400px" height="450px">
                    <span><h4>ZED QUÁN QUÂN</h4></span> <br>
                    <button>Mua hàng</button>
                </div>
               
            </div>
            <div class="product-zed">
                <div class="p1">
                    <img src="./img/pr1.jpg" alt="" width="400px" height="450px">
                    <span><h4>LEBLANC</h4></span> <br>
                    <button>Mua hàng</button>
                </div>
                <div class="p1">
                    <img src="./img/pr2.jpg" alt=""width="400px" height="450px">
                    <span><h4>NIDALEE</h4></span> <br>
                    <button>Mua hàng</button>
                </div>
                <div class="p1">
                    <img src="./img/pr3.jpg" alt=""width="400px" height="450px">
                    <span><h4>ARHI</h4></span> <br>
                    <button>Mua hàng</button>
                </div>
        </div>
    </div> -->
    <?php
    include_once "../classes/product_class.php";
    ?>
    <?php
        $product = new products();

        if(isset($_GET['search'])){
            $resulr = $product->show_like($_GET['search']);
        }
        
        if(isset($_GET['all'])){
            $resulr = $product->show_product();
        }
    ?>
    <div class="content">
    <table>
        <tr>
            <td>
            <form action="" method="GET">
            <input type="text" name="search" placeholder="Nhap san phan can tim" value="">
            <button type="submit">Tim</button>
            <button type="submit" name="all">Tat ca</button>
        </form>
            </td>
        </tr>    
    </table>
    <table border="2" width="700px">
            <th>Id</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả sản phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh sản phẩm</th>
            <th>catID</th>
            <?php
            if(isset($resulr)){
                while($row = $resulr->fetch_assoc()){
            ?>
            <tr>
            <td><?php echo $row['productId'] ?></td>
            <td><?php echo $row['productName'] ?></td>
            <td><?php echo $row['product_desc'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><img width="150px" src="../admin/upload/<?php echo $row['image']?>" alt=""></td>
            <td><a href="cart.php?id=<?php echo $row['productId'] ?>">Them vao gio</a></td>
            </tr>
            <?php
                }}
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