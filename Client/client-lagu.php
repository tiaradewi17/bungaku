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
    public function tampil_semua_lagu(){
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

    public function tampil_lagu($id_lagu){
        $id_lagu = $this->filter($id_lagu);
        $client = curl_init($this->url."?aksi=tampil&id_lagu=".$id_lagu);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_lagu, $client, $response, $data);
    }
    public function tambah_lagu($data){
        $data = '{
            "id_lagu":"'.$data['id_lagu'].'",
            "id_artis":"'.$data['id_artis'].'",
            "id_album":"'.$data['id_album'].'",
            "nama_lagu":"'.$data['nama_lagu'].'",
            "tahun_rilis":"'.$data['tahun_rilis'].'",
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

    public function ubah_lagu($data){
        $data='{"id_lagu":"'.$data['id_lagu'].'",
            "id_artis":"'.$data['id_artis'].'",
            "id_album":"'.$data['id_album'].'",
            "nama_lagu":"'.$data['nama_lagu'].'",
            "tahun_rilis":"'.$data['tahun_rilis'].'",
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



    public function hapus_lagu($data){
        $id_lagu = $this->filter($data['id_lagu']);
        $data='{"id_lagu":"'.$id_lagu.'",
                "aksi":"'.$data['aksi'].'"
                }';
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_artis,$data,$c,$response); 
    }
    public function __destruct(){
        unset($this->options,$this->api);
    }

}

$url = 'http://192.168.31.158/musikku/server/server_lagu.php';
$abc = new Client($url);
