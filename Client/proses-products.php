<?php
error_reporting(1);
include "client-products.php";

if($_POST['aksi'] == 'tambah'){
    $data = array("product_id"=>$_POST['product_id'],
                  "product_name"=>$_POST['product_name'],
                  "category"=>$_POST['category'],
                  "price"=>$_POST['price'],
                  "stock_quantity"=>$_POST['stock_quantity'],
                  "aksi"=>$_POST['aksi']);
    $abc -> tambah_products($data);
    header('location:products.php');              
} else if ($_POST['aksi']=='ubah'){
    $data = array("product_id"=>$_POST['product_id'],
                  "product_name"=>$_POST['product_name'],
                  "category"=>$_POST['category'],
                  "price"=>$_POST['price'],
                  "stock_quantity"=>$_POST['stock_quantity'],
                  "aksi"=>$_POST['aksi']);
    $abc -> ubah_products($data);
    header('location:products.php');               
} else if ($_GET['aksi']=='hapus'){
    $data = array("product_id"=>$_GET['product_id'],
                  "aksi"=>$_GET['aksi']);
    $abc -> hapus_products($data);         
    header('location:products.php');
}  
unset($abc,$data);
?>