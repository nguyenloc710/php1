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
                    <li><a href="#">KI???M TRA T??CH ??I???M </a></li>
                    <li><a href="#">TIN T???C </a></li>
                    <li><a href="#">LI??N H??? </a></li>
                    <li><a href="#">DI???N ????N</a></li>
                </ul>
            </div>
            <div class="dangnhap">
                <button><a href="dangnhap.php">????ng nh???p</a></button>
                <button><a href="dangky.php">????ng k??</a></button>
                <a href="donhang.php"><img src="./img/giohang1.png" alt="" width="50px" ></a>
            </div>
            
        </div>
        <div class="header-logo">
            <div class="logo">
                <a href="asm.php"><img src="./img/logo1.png" alt="" width="100px" height="100px"></a>
            </div>
            <div class="loai">
                <ul>
                    <li><a href="#">SI??U PH???M</a></li>
                    <li><a href="#">H??NG HI???U</a></li>
                    <li><a href="#">??A S???C</a></li>
                    <li><a href="#">HUY???N THO???I</a></li>
                </ul>
                <div class="tim">
                    <button>search</button>
                <input type="text" placeholder="T??m ki???m" >
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
                <h3>TRANG PH???C M???I</h3>
            </div>
            <div class="product-zed">
                <div class="p1">
                    <img src="./img/zed-hoi-tu-than.jpg" alt="" width="400px" height="450px">
                    <span><h4>ZED H???I T??? TH???N</h4></span> <br>
                    <button>Mua h??ng</button>
                </div>
                <div class="p1">
                    <img src="./img/zed2.jpg" alt=""width="400px" height="450px">
                    <span><h4>ZED SI??U PH???M</h4></span> <br>
                    <button>Mua h??ng</button>
                </div>
                <div class="p1">
                    <img src="./img/zed1.jpg" alt=""width="400px" height="450px">
                    <span><h4>ZED QU??N QU??N</h4></span> <br>
                    <button>Mua h??ng</button>
                </div>
               
            </div>
            <div class="product-zed">
                <div class="p1">
                    <img src="./img/pr1.jpg" alt="" width="400px" height="450px">
                    <span><h4>LEBLANC</h4></span> <br>
                    <button>Mua h??ng</button>
                </div>
                <div class="p1">
                    <img src="./img/pr2.jpg" alt=""width="400px" height="450px">
                    <span><h4>NIDALEE</h4></span> <br>
                    <button>Mua h??ng</button>
                </div>
                <div class="p1">
                    <img src="./img/pr3.jpg" alt=""width="400px" height="450px">
                    <span><h4>ARHI</h4></span> <br>
                    <button>Mua h??ng</button>
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
            <th>T??n s???n ph???m</th>
            <th>M?? t??? s???n ph???m</th>
            <th>Gi??</th>
            <th>H??nh ???nh s???n ph???m</th>
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
            <h3>BEST "S??? L???A CH???N HO??N H???O"</h3>
        </div>
        <div class="lienhe">
            <div class="lh1">
                <h4>H??? tr???</h4> <br>
                <p>M???i s??? c??? xin li??n h??? : 0199999999 ho???c inbox ??? fanpage <a href="#">facebook.com</a></p> <br>
                <h4>Ch???t l?????ng</h4> <br>
                <p>?????m b???o ti??u ch?? ngon b??? r???</p><br>
            </div>
            <div class="lh2">
                <h4>FAQ</h4><br>
                <p><a href="#">>Ch??nh s??ch ?????i tr???</a></p>
                <p><a href="#">>Ch??nh s??ch b???o h??nh</a></p><br>
                <h4>CSKH</h4><br>
                <a href="#">Than phi???n/Ch??m s??c kh??ch h??ng</a><br>
            </div>
            <div class="lh3">
                <h4>Th??ng tin</h4><br>
                <p><a href="#">>Tuy???n d???ng</a></p>
                <p><a href="#">>Ch??nh s??ch v?? quy ?????nh</a></p>
                <p><a href="#">>C?? ch??? ho???t ?????ng</a></p><br>
            </div>
        </div>
    </div>
</body>
</html>