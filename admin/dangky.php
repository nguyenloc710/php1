<?php include_once "../classes/classes.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dangky.css">
    <script>
        function validate(){
            var nodeI=document.getElementsByTagName("input");
            var info=document.getElementsByTagName("span");
            var user=document.getElementsByName("txtName");
            for(i=0;i<nodeI.length;i++){
                if(nodeI[0].value.length<6)
                    info[0].innerHTML="Nhập trên 6 kí tự"
                else
                    info[0].innerHTML="" 
                if(nodeI[i].value=="")
                    info[i].innerHTML="Nhập đủ dữ liệu"
                else
                    info[i].innerHTML=""
                  
            }
        }
        function kiemtra(){
            var so = document.getElementById("so")
            if(so.value==2){
                so.style.background="green"
            }else{
                so.innerHTML="Moi nhap lai"
            }
        }
        function domanhmk(){
            var mk = document.getElementById("pass")
            if(mk.value.length<3)
                mk.style.background="red"
            else if(mk.value.length<=6)
                mk.style.background="yellow"
            else
                mk.style.background="green"
        }
    </script>
</head>
<body>
<?php
    $user = new users();
    if(isset($_POST['sub'])){
        if(isset($_POST['txtName'])&&isset($_POST['txtEmail'])&&isset($_POST['txtPass'])){
            $ins_user= $user->insert_user($_POST['txtName'],$_POST['txtEmail'],$_POST['txtPass']);
        }
        if(isset($ins_user)){
            echo $ins_user;
            header("refresh:5,url=userlist.php");
        }
    }
    ?>
    <div class="header">
        <a href="index.php"><img src="./img/logo1.png" alt="" width="50px" height="50px"></a>
    </div>
    <div class="content">
        <form action="dangky.php" method="post">
            <h1>ĐĂNG KÝ</h1>
            <input type="text" placeholder="Tên đăng nhập" name="txtName"><span></span><br>
            <input type="text" placeholder="Mật khẩu" name="txtPass" id="pass" onkeyup="domanhmk()"><span></span><br>
            <!-- <input type="text" placeholder="Nhập lại mật khẩu"><span></span><br> -->
            <input type="text" placeholder="Mail(@gmail.com) "name="txtEmail"><span></span><br>
            <!-- <input type="text" placeholder="Số điện thoại"><span></span><br>
            <input type="text" placeholder="1+1 = " id="so" onkeyup="kiemtra()"><span></span><br>-->
            <input type="submit" value="Xác Nhận" name="sub" onclick="validate()" class="gui"> <br> 
            
        </form>
    </div>
</body>
</html>