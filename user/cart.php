<?php
include_once "../classes/product_class.php";
if(session_id()==='')
session_start();

$product = new products();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    // $action = (isset($_GET['action']) ? $_GET['action'] : 'add');
    $quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
    // var_dump($action);
    // die();
    $listproduct = $product->show_arr($id);
    
    if($listproduct){
        $row = $listproduct->fetch_assoc();
    }
$item = [
    'id' =>  $row['productId'],
    'name' =>  $row['productName'],
    'desc' =>  $row['product_desc'],
    'price' =>  $row['price'],
    'img' =>  $row['image'],
    'quantity' =>1
];

    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity'] +=1;
    }
    else{
        $_SESSION['cart'][$id]= $item;
    }

// if($action=='update'){
//     $_SESSION['cart'][$id]['quantity'] = $quantity;
// }
if($_GET['action']=='delete'){
    unset($_SESSION['cart'][$id]);
}
header("location:gio.php");

?>
