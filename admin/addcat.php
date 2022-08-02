<?php include_once "../classes/cate_class.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
</head>
<body>
<?php
    $cat = new cates();
    if(isset($_POST['sub'])){
        if(isset($_POST['name'])){
            $ins_cat = $cat->insert_cates($_POST['name']);
        }
        if(isset($ins_cat)){
            echo $ins_cat;
            header("refresh:5,url=categories.php");
        }
    }
?>
    <form action="addcat.php" method="post">
        <h1>Tạo thư mục mới</h1>
        <input type="text" placeholder="Tên thư mục" name="name">
        <button type="submit" name="sub">Xác nhận</button>
    </form>
</body>
</html>