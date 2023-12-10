<?php
    error_reporting(1);
    include "Database.php";
    $db = new Database();

    if(isset($_SERVER['HTTP_ORIGIN'])){
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Acess-Control-Allow-Credentials');
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
        $customer_id = $data->customer_id;
        $first_name = $data->first_name;
        $last_name = $data->last_name;
        $email = $data->email;
        $phone_number = $data->phone_number;
        $level_id = $data->level_id;
        $aksi = $data->aksi;
        if ($aksi == 'tambah')
        {
            $data2 = array('customer_id' => $customer_id, 
                            'first_name' => $first_name,
                            'last_name' => $last_name, 
                            'email' => $email,
                            'phone_number' => $phone_number,
                            'level_id' => $level_id
                        );
        $db->tambah_customers($data2); 
        } elseif ($aksi == 'ubah')
        {   $data2 = array('customer_id' => $customer_id,
                            'first_name' => $first_name,
                            'last_name' => $last_name, 
                            'email' => $email,
                            'phone_number' => $phone_number,
                            'level_id' => $level_id
                        );
            $db->ubah_customers($data2);
        } elseif ($aksi == 'hapus')
        { $db->hapus_customers($customer_id); 
        }

    unset($postdata, $data, $data2, $customer_id, $first_name, $last_name, $email, $phone_number, $level_id, $aksi, $db);
    }   elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {   if (($_GET['aksi'] == 'tampil') and (isset($_GET['customer_id']))) 
        {
            $customer_id = filter($_GET['customer_id']);
            $data = $db->tampil_customers($customer_id);
            echo json_encode($data);
        } else 
        {   $data = $db->tampil_semua_customers();
            echo json_encode($data);
        } 
        unset($postdata, $data, $customer_id, $db);               
    }
?>
