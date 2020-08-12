<?php 
include "Member.php";
$member = new Member();
$mode = $_POST['mode'];
$out = [];
switch($mode){
    case 'get':
        $data   = $member->get(); 
        echo json_encode($data);
    break;

    case 'delete':
        $id = (isset($_POST['id']))?$_POST['id']:0;
        $res = $member->delete($id);
        $out['status']=$res;
        json_encode($out);
    break;

    case 'add':
        $res = $member->add($_POST);
        
        $out['status'] = $res;
        if($res)
            $out['messages'] = "Data Berhasil disimpan";
        else
            $out['messages'] = "Gagal Menyimpan Data";
            
        echo json_encode($out);
    break;

    case 'update':
        $res = $member->update($_POST);

        $out['status'] = $res;
        if($res)
            $out['messages'] = "Data Berhasil Dirubah";
        else
            $out['messages'] = "Gagal Merubah Data";
            
        echo json_encode($out);
    break;

}

?>