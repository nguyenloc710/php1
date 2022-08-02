<?php include_once "../classes/product_class.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $product = new products();
    
    if(isset($_POST['sub'])){
        
        if($_FILES['img']['error']>0){
            echo"Lỗi file";
        }
        else{
            $array_ext = array('jpg','png');
            $fileName = $_FILES['img']['name'];
            $fileSize = $_FILES['img']['size'];
            $fileExt = pathinfo($fileName,PATHINFO_EXTENSION);
            $fileTemp = $_FILES['img']['tmp_name'];
            if($fileSize>2000000){
                echo "File không được lớn hơn 2MB";
            }
            else if(!in_array($fileExt,$array_ext)){
                echo "Chỉ chấp nhận 2 loại ảnh JPG hoặc PNG";
            } 
            else{
                $urlUpload = "upload/".$fileName;
                move_uploaded_file($fileTemp,$urlUpload);
                echo "tải File thành công";
            }
        }
        $insert = $product->insertproduct($_POST['name'],$_POST['desc'],$_POST['price'],$fileName);
    }
    
    if(isset($insert)){
        echo $insert;
        header("refresh:2,url=products.php");
    }
?>
    <h1>Thêm sản phẩm</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>
            Tên sản phẩm : <input type="text" name="name">
        </p>
        <p>
            Mô tả sản phẩm : <input type="text" name="desc">
        </p>
        <p>
            Giá sản phẩm : <input type="text" name="price">
        </p>
        <p>
        Hình ảnh : <input type="file" name="img">
        </p>
        <button type="submit" name="sub">Hoàn tất</button>
    </form>
</body>
</html>