<?php
error_reporting(1);
class Client{
    private $url;

    public function __construct($url){
        $this->url=$url;
        unset($url);
    }
    public function filter($data){
        $data = preg_replace('/[^a-zA-Z0-9]/','',$data);
        return $data;
        unset($data);
    }
    public function tampil_semua_orders(){
        $client = curl_init($this->url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data
        return $data;
        // menghapus variabel dari memory
        unset($data, $client, $response);
    }

    public function tampil_orders($order_id){
        $order_id = $this->filter($order_id);
        $client = curl_init($this->url."?aksi=tampil&order_id=".$order_id);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($order_id, $client, $response, $data);
    }
    public function tambah_orders($data){
        $data = '{
            "order_id":"'.$data['order_id'].'",
            "customer_id":"'.$data['customer_id'].'",
            "order_date":"'.$data['order_date'].'",
            "total_amount":"'.$data['total_amount'].'",
            "shipping_address":"'.$data['shipping_address'].'",
            "product_id":"'.$data['product_id'].'",
            "aksi":"'.$data['aksi'].'"
        }';   
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_orders($data){
        $data='{"order_id":"'.$data['order_id'].'",
            "customer_id":"'.$data['customer_id'].'",
            "order_date":"'.$data['order_date'].'",
            "total_amount":"'.$data['total_amount'].'",
            "shipping_address":"'.$data['shipping_address'].'",
            "product_id":"'.$data['product_id'].'",
            "aksi":"'.$data['aksi'].'"                
               }';
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data,$c,$response); 
    }



    public function hapus_orders($data){
        $order_id = $this->filter($data['order_id']);
        $data='{"order_id":"'.$order_id.'",
                "aksi":"'.$data['aksi'].'"
                }';
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($c);
        curl_close($c);
        unset($customer_id,$data,$c,$response); 
    }
    public function __destruct(){
        unset($this->options,$this->api);
    }

}

$url = 'http://192.168.56.84/bungaku/server/server_orders.php';
$abc = new Client($url);
