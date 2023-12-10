<?php
error_reporting(1);
include "Database.php";
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}
$postdata = file_get_contents("php://input");

function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $product_id = $data->product_id;
    $product_name = $data->product_name;
    $category = $data->category;
    $price = $data->price;
    $stock_quantity = $data->stock_quantity;
    $aksi = $data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'category' => $category,
            'price' => $price,
            'stock_quantity' => $stock_quantity,
        );
        $abc->tambah_products($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'category' => $category,
            'price' => $price,
            'stock_quantity' => $stock_quantity,
        );
        $abc->ubah_products($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_products($product_id);
    }

    unset($postdata, $data, $data2, $product_id, $product_name, $category, $price, $stock_quantity, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'retrieve') && (isset($_GET['product_id']))) {
        $product_id = filter($_GET['product_id']);
        $data = $abc->tampil_products($product_id);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_products();
        echo json_encode($data);
    }
    unset($postdata, $data, $product_id, $abc);
}
