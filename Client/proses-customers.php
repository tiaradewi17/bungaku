<?php
error_reporting(1);
include "client-customers.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "customer_id" => $_POST['customer_id'],
        "first_name" => $_POST['first_name'],
        "last_name" => $_POST['last_name'],
        "email" => $_POST['email'],
        "phone_number" => $_POST['phone_number'],
        "level_id" => $_POST['level_id'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_customers($data);
    header('location:customers.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "customer_id" => $_POST['customer_id'],
        "first_name" => $_POST['first_name'],
        "last_name" => $_POST['last_name'],
        "email" => $_POST['email'],
        "phone_number" => $_POST['phone_number'],
        "level_id" => $_POST['level_id'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_customers($data);
    header('location:customers.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "customer_id" => $_GET['customer_id'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_customers($data);
    header('location:customers.php');
}
unset($abc, $data);
