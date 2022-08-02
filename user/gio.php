<?php
session_start();
    $cart = (isset($_SESSION['cart']))?$_SESSION['cart'] :[];
    // echo "<pre>";
    // print_r($cart);
?>
<div class="content">
    <h1>Products</h1>
    <a href="index.php">Mua tiếp</a>
    <!-- <form action="" method="post"> -->
    <table border="1" style="border-collapse: collapse; width:800px;">
    <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả sản phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh sản phẩm</th>
            <th>So</th>
            <th>Xóa</th>
        </tr>
            <?php
                foreach ($cart as $key => $row):
            ?>
        <tr>
            <td><?php echo $key++ ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['desc'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><img width="150px" src="../admin/upload/<?php echo $row['img']?>" alt=""></td>
            <td>
            <form action="cart.php" >
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php $row['id'] ?>">
                <input type="text" value="<?php echo $row['quantity']?>"> 
                <button type="submit">Cap nhap</button>
            </form>
            </td>
            <td>
                <a onclick="return confirm('Bạn có muốn xóa sản phẩm này');"href="cart.php?id=<?php echo $row['id'] ?>&action=delete">Xóa</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
        
    <!-- </form> -->
    </div>