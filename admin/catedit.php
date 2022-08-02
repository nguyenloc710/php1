<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "../classes/cate_class.php";
    ?>
    <?php
        if(isset($_GET['editid'])){
            $id = $_GET['editid'];
        }else header("Location:categories.php");
        $cate = new cates();
        if(isset($_POST['sub'])){
            $edit = $cate->update_cates($_POST['name'],$id);
        }
        if(isset($edit)){
            echo $edit;
            header("refresh:5,url=categories.php");
        }
    ?>
    <h1>Sửa thư mục</h1>
    <form action="" method="post">
        <p>
            Họ tên người dùng : <input type="text" name="name">
        </p>
        <button type="submit" name="sub">Hoàn tất</button>
    </form>
</body>
</html>