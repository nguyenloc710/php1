<?php include_once "../classes/product_class.php"?>
<body>
<?php
    $product = new products();
    if(isset($_GET['delid'])){
        $del = $product->delete_product($_GET['delid']);
    }if(isset($del)){
        echo "co";
        echo $del;
    }
?>
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
<a href="userlist.php">Danh s??ch ng?????i d??ng</a>
</h3>
    <div class="header">
        <div class="header-top">
            <div class="menu">
                <ul>
                    <li><a href="#">KI???M TRA T??CH ??I???M </a></li>
                    <li><a href="#">TIN T???C </a></li>
                    <li><a href="#">LI??N H??? </a></li>
                    <li><a href="#">DI???N ????N</a></li>
                    <li><a href="index.php">TRANG CH???</a></li>
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
                <a href="index.php"><img src="./img/logo1.png" alt="" width="100px" height="100px"></a>
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
    <div class="content">
    <h1>Products</h1>
    <h3><a href="productadd.php">Th??m s???n ph???m</a></h3> 
    <form action="" method="post">
    <table border="1" style="border-collapse: collapse; width:800px;">
    <tr>
            <th>Id</th>
            <th>T??n s???n ph???m</th>
            <th>M?? t??? s???n ph???m</th>
            <th>Gi??</th>
            <th>H??nh ???nh s???n ph???m</th>
            <th>catID</th>
            <th>X??? l??</th>
        </tr>
        <?php 
        $listproduct = $product->show_product();
        if($listproduct){

            while($row = $listproduct->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['productId'] ?></td>
            <td><?php echo $row['productName'] ?></td>
            <td><?php echo $row['product_desc'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><img width="150px" src="./upload/<?php echo $row['image']?>" alt=""></td>
            <td></td>
            <td>
                <a href="productedit.php?editid=<?php echo $row['productId']?>">S???a</a>|
                <a onclick="return confirm('B???n c?? mu???n x??a s???n ph???m n??y');" href="?delid=<?php echo $row['productId'];?>">X??a</a>
            </td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
        
    </form>
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
