<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

include "PengembalianModel.php";

$pengembalian = new PengembalianModel();
$mode = $_POST['mod'];

switch($mode){
    case 'add':
        $res =  $pengembalian->add($_POST);
        $out['status'] = $res;
        if($res)
            $out['messages'] = "Data Berhasil disimpan";
        else
            $out['messages'] = "Gagal Menyimpan Data";
            
        echo json_encode($out);
    break;

    case 'get':
        $data =  $pengembalian->get($_POST);
        echo json_encode($data);
    break;

    case 'poroses_bayar':
        $pengembalian->bayar_denda($_POST);
    break;
}
