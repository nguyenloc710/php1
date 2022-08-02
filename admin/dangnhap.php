<?php
    include_once "../classes/classes.php";
    include_once "../lib/session.php";
    session::checkLogin();
?>
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
    </script>
</head>
<body>
<?php
        $user = new users();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //lấy dữ liệu từ form
            $email = $_POST['txtName'];
            $pass = $_POST['txtPass'];
            $check_login = $user->login($email,$pass);
        }
    ?>
    <div class="header">
        <a href="index.php"><img src="./img/logo1.png" alt="" width="50px" height="50px"></a>
    </div>
    <div class="content">
        <form action="dangnhap.php" method="post">
            <h1>ĐĂNG NHẬP</h1>
            <input type="text" placeholder="Tên đăng nhập" name="txtName"><span></span><br>
            <input type="text" placeholder="Mật khẩu"name="txtPass" id="pass"><span></span><br> <br>
            <input type="submit" value="Xác Nhận"  onclick="validate()" class="gui"> <br>
        </form>
    </div>
</body>
</html>