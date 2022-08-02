<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include_once "../classes/classes.php";
?>
<?php
    if(isset($_GET['editid'])){
        $id = $_GET['editid'];
    }else header("Location:userlist.php");
    $user = new users();
    if(isset($_POST['sub'])){
        $edit = $user->update_user($_POST['name'],$id);
    }
    if(isset($edit)){
        echo $edit;
        header("refresh:5,url=userlist.php");
    }

?>
    <h1>Sửa người dùng</h1>
    <form action="" method="post">
        <p>
            Họ tên người dùng : <input type="text" name="name">;
        </p>
        <button name="sub">Hoàn tất</button>
    </form>
</body>
</html>