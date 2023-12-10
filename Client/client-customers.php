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
    public function tampil_semua_customers(){
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

    public function tampil_customers($customer_id){
        $customer_id = $this->filter($customer_id);
        $client = curl_init($this->url."?aksi=tampil&customer_id=".$customer_id);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($customer_id, $client, $response, $data);
    }
    
    public function tambah_customers($data){
        $data = '{
            "customer_id":"'.$data['customer_id'].'",
            "first_name":"'.$data['first_name'].'",
            "last_name":"'.$data['last_name'].'",
            "email":"'.$data['email'].'",
            "phone_number":"'.$data['phone_number'].'",
            "level_id":"'.$data['level_id'].'",
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

    public function ubah_customers($data){
        $data='{"customer_id":"'.$data['customer_id'].'",
            "first_name":"'.$data['first_name'].'",
            "last_name":"'.$data['last_name'].'",
            "email":"'.$data['email'].'",
            "phone_number":"'.$data['phone_number'].'",
            "level_id":"'.$data['level_id'].'",
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

    public function hapus_customers($data){
        $customer_id = $this->filter($data['customer_id']);
        $data='{"customer_id":"'.$customer_id.'",
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

$url = 'http://192.168.56.84/bungaku/server/server_customers.php';
$abc = new Client($url);
