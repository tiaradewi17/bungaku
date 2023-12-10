<?php
error_reporting(1);
include "client-album.php";

if($_POST['aksi'] == 'tambah'){
    $data = array("id_album"=>$_POST['id_album'],
                  "id_artis"=>$_POST['id_artis'],
                  "nama_album"=>$_POST['nama_album'],
                  "tanggal_rilis"=>$_POST['tanggal_rilis'],
                  "deskripsi"=>$_POST['deskripsi'],
                  "aksi"=>$_POST['aksi']);
    $abc -> tambah_album($data);
    header('location:album.php');              
} else if ($_POST['aksi']=='ubah'){
    $data = array("id_album"=>$_POST['id_album'],
                  "id_artis"=>$_POST['id_artis'],
                  "nama_album"=>$_POST['nama_album'],
                  "tanggal_rilis"=>$_POST['tanggal_rilis'],
                  "deskripsi"=>$_POST['deskripsi'],
                  "aksi"=>$_POST['aksi']);
    $abc -> ubah_album($data);
    header('location:album.php');               
} else if ($_GET['aksi']=='hapus'){
    $data = array("id_album"=>$_GET['id_album'],
                  "aksi"=>$_GET['aksi']);
    $abc -> hapus_album($data);         
    header('location:album.php');
}  
unset($abc,$data);
?>