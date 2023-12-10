<?php
    error_reporting(1);
    include "Database.php";
    $db = new Database();

    if(isset($_SERVER['HTTP_ORIGIN'])){
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Acess-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
    }
    if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
        if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Acess-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']})");
        exit(0);
    }
    $postdata = file_get_contents("php://input");

    function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data; 
        unset($data);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    { 
        $data = json_decode($postdata);
        $order_id = $data->order_id;
        $customer_id = $data->customer_id;
        $order_date = $data->order_date;
        $total_amount = $data->total_amount;
        $shipping_address = $data->shipping_address;
        $product_id = $data->product_id;
        $aksi = $data->aksi;
        if ($aksi == 'tambah')
        {
            $data2 = array('order_id' => $order_id, 
                            'customer_id' => $customer_id,
                            'order_date' => $order_date, 
                            'total_amount' => $total_amount,
                            'shipping_address' => $shipping_address,
                            'product_id' => $product_id,
                        );
        $db->tambah_orders($data2); 
        } elseif ($aksi == 'ubah')
        {   $data2 = array('order_id' => $order_id,
                            'customer_id' => $customer_id,
                            'order_date' => $order_date, 
                            'total_amount' => $total_amount,
                            'shipping_address' => $shipping_address,
                            'product_id' => $product_id,
                        );
            $db->ubah_orders($data2);
        } elseif ($aksi == 'hapus')
        { $db->hapus_orders($order_id); 
        }

    unset($postdata, $data, $data2, $order_id, $customer_id, $order_date, $total_amount, $shipping_address, $product_id, $aksi, $db);
    }   elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {   if (($_GET['aksi'] == 'tampil') and (isset($_GET['order_id']))) 
        {
            $order_id = filter($_GET['order_id']);
            $data = $db->tampil_orders($order_id);
            echo json_encode($data);
        } else 
        {   $data = $db->tampil_semua_orders();
            echo json_encode($data);
        } 
        unset($postdata, $data, $order_id, $db);               
    }
?>
