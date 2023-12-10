<?php
error_reporting(1);
include "client-customers.php";

if($_POST['aksi'] == 'tambah'){
    $data = array("id_artis"=>$_POST['id_artis'],
                  "nama_artis"=>$_POST['nama_artis'],
                  "genre_lagu"=>$_POST['genre_lagu'],
                  "production"=>$_POST['production'],
                  "popularitas"=>$_POST['popularitas'],
                  "aksi"=>$_POST['aksi']);
    $abc -> tambah_artis($data);
    header('location:customers.php');              
} else if ($_POST['aksi']=='ubah'){
    $data = array("id_artis"=>$_POST['id_artis'],
                  "nama_artis"=>$_POST['nama_artis'],
                  "genre_lagu"=>$_POST['genre_lagu'],
                  "production"=>$_POST['production'],
                  "popularitas"=>$_POST['popularitas'],
                  "aksi"=>$_POST['aksi']);
    $abc -> ubah_artis($data);
    header('location:customers.php');               
} else if ($_GET['aksi']=='hapus'){
    $data = array("id_artis"=>$_GET['id_artis'],
                  "aksi"=>$_GET['aksi']);
    $abc -> hapus_artis($data);         
    header('location:customers.php');
}  
unset($abc,$data);
?>