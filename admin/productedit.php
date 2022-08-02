<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "../classes/product_class.php";
    ?>
    <?php
        if(isset($_GET['editid'])){
            $id = $_GET['editid'];
        }else header("Location:products.php");
        $product = new products();
        if(isset($_POST['sub'])){
            $edit = $product->update_product($_POST['name'],$_POST['desc'],$_POST['price'],$_POST['img'],$id);
        }
        if(isset($edit)){
            echo $edit;
            header("refresh:5,url=products.php");
        }
    ?>
    <h1>Sửa product</h1>
    <form action="" method="post">
        <p>
            Tên sản phẩm : <input type="text" name="name">;
        </p>
        <p>
            Mô tả sản phẩm : <input type="text" name="desc">;
        </p>
        <p>
            Giá : <input type="text" name="price">;
        </p>
        <p>
            Hình ảnh : <input type="file" name="img">;
        </p>
        <button type="submit" name="sub">Hoàn tất</button>
    </form>
</body>
</html>