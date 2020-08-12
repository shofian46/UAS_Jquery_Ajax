<?php
include "../Database.php";

class BukuModel {
    private $koneksi;
    private $table;

    public function __construct(){
        $db = new Database();
        $this->table = 'buku';
        $this->koneksi = $db->connect();
    }

    public function getByid($id){
        $query = "SELECT * FROM ".$this->table." WHERE id='".$id."'";
        $res = mysqli_query($this->koneksi, $query);
        
        $data=[];
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
        }
        return $data;
    }
    

    public function get(){
        $query = "SELECT * FROM ".$this->table;
        $res = mysqli_query($this->koneksi, $query);
        
        $data=[];
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
        }
        return $data;
    }

    public function add($data,$gambar){
        $request= json_decode(json_encode($data));
        $query = "INSERT INTO buku (`judul`,`pengarang`,`gambar`) ";
        $query .= "VALUES ('".$request->judul."','".$request->pengarang."','".$gambar."')";
        
        $res = mysqli_query($this->koneksi, $query);
        return $res;
    }
}