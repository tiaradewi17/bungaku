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
    public function tampil_semua_album(){
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

    public function tampil_album($id_album){
        $id_album = $this->filter($id_album);
        $client = curl_init($this->url."?aksi=tampil&id_album=".$id_album);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_album, $client, $response, $data);
    }
    
    public function tambah_album($data){
        $data = '{
            "id_album":"'.$data['id_album'].'",
            "id_artis":"'.$data['id_artis'].'",
            "nama_album":"'.$data['nama_album'].'",
            "tanggal_rilis":"'.$data['tanggal_rilis'].'",
            "deskripsi":"'.$data['deskripsi'].'",
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

    public function ubah_album($data){
        $data='{"id_album":"'.$data['id_album'].'",
            "id_artis":"'.$data['id_artis'].'",
            "nama_album":"'.$data['nama_album'].'",
            "tanggal_rilis":"'.$data['tanggal_rilis'].'",
            "deskripsi":"'.$data['deskripsi'].'",
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

    public function hapus_album($data){
        $id_album = $this->filter($data['id_album']);
        $data='{"id_album":"'.$id_album.'",
                "aksi":"'.$data['aksi'].'"
                }';
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_album,$data,$c,$response); 
    }
    public function __destruct(){
        unset($this->options,$this->api);
    }

}

$url = 'http://192.168.56.84/bungaku/server/server_customers.php';
$abc = new Client($url);
