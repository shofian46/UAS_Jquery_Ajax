<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

include "peminjamanModel.php";

$peminjaman = new PeminjamanModel();
$mode = $_POST['mod'];

switch($mode){
    case 'add':
        $res =  $peminjaman->add($_POST);
        $out['status'] = $res;
        if($res)
            $out['messages'] = "Data Berhasil disimpan";
        else
            $out['messages'] = "Gagal Menyimpan Data";
            
        echo json_encode($out);
    break;
    case 'get':
        $data =  $peminjaman->get($_POST);
        echo json_encode($data);
    break;
}
