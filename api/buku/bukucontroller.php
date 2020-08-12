<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
include "BukuModel.php";

$buku = new BukuModel();
$mode = $_POST['mod'];

switch($mode){
    case 'get':
        $data   = $buku->get(); 
        echo json_encode($data);
    break;

    case 'getById':
        $data   = $buku->getByid($_POST['id']); 
        echo json_encode($data);
    break;
    case 'add':
        $sourcePath = $_FILES['gambar']['tmp_name'];       // Storing source path of the file in a variable
        $targetPath = "upload/".$_FILES['gambar']['name']; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath) ;    // Moving Uploaded file

        $buku->add($_POST, $targetPath); // ini nyimpan ke database
        echo json_encode($data);
    break;
}
