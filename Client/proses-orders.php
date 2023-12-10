<?php
error_reporting(1);
include "client-orders.php";

if($_POST['aksi'] == 'tambah'){
    $data = array("order_id"=>$_POST['order_id'],
                  "customer_id"=>$_POST['customer_id'],
                  "order_date"=>$_POST['order_date'],
                  "total_amount"=>$_POST['total_amount'],
                  "shipping_address"=>$_POST['shipping_address'],
                  "product_id"=>$_POST['product_id'],
                  "aksi"=>$_POST['aksi']);
    $abc -> tambah_orders($data);
    header('location:orders.php');              
} else if ($_POST['aksi']=='ubah'){
    $data = array("order_id"=>$_POST['order_id'],
                  "customer_id"=>$_POST['customer_id'],
                  "order_date"=>$_POST['order_date'],
                  "total_amount"=>$_POST['total_amount'],
                  "shipping_address"=>$_POST['shipping_address'],
                  "product_id"=>$_POST['product_id'],
                  "aksi"=>$_POST['aksi']);
    $abc -> ubah_orders($data);
    header('location:orders.php');               
} else if ($_GET['aksi']=='hapus'){
    $data = array("order_id"=>$_GET['order_id'],
                  "aksi"=>$_GET['aksi']);
    $abc -> hapus_orders($data);         
    header('location:orders.php');
}  
unset($abc,$data);
?>