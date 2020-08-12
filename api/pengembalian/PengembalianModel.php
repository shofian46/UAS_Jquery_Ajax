<?php
include "../Database.php";

class PengembalianModel {
    private $koneksi;
    private $table;
    private $db;

    public function __construct(){
        $this->db = new Database();
        $this->table = 'pengembalian';
        $this->koneksi = $this->db->connect();
    }

    public function add($data){
        $request= json_decode(json_encode($data));
        $idPengembalian = $this->db->autoNumber('id_pengembalian',$this->table);
        
        //insert ketable pengembalian
        $query_header = "INSERT INTO $this->table (`id_pengembalian`, `id_pinjam`, `nim`, `tgl_kembali`, `tgl_realisasi`,`denda`)";
        $query_header .=" VALUES ('".$idPengembalian."', '".$request->id_pinjam."', '".$request->nim."', '".$request->tgl_kembali."', '".$request->tgl_realisasi."',".$request->denda.")";
        $res = mysqli_query($this->koneksi, $query_header);

        //update table peminjaman header
        $update = mysqli_query($this->koneksi, "UPDATE peminjaman_header SET `status`='1' WHERE idpinjam='".$request->id_pinjam."'");
        return $res;
    }

    public function get($request){
        $column = [
            "id_pengembalian",
            'id_pinjam',
            'nim',
            'tgl_kembali',
            'tgl_realisasi',
            'denda'
        ];

        $query = "SELECT * FROM ".$this->table;

        if(isset($request['search']['value']))
            $query .= " where id_pengembalian LIKE('%".$request['search']['value']."%')";
            

        $orderBy = "id_pengembalian";
        if(isset($request['order'][0]['column']) &&  $request['order'][0]['column'] <= count($column))
            $orderBy = $column[$request['order'][0]['column']];

        if(isset($request['order'][0]['dir']))
            $query .= " Order by ".$orderBy." ".$request['order'][0]['dir'];

        $limit = isset($request['start'])?$request['start']:0;
        $limit .= ','.isset($request['length'])?$request['length']:10;
        
        $resLimit = mysqli_query($this->koneksi, $query." LIMIT ".$limit);

        $resData = mysqli_query($this->koneksi, $query);

        $data=[];
        while($row=mysqli_fetch_assoc($resLimit)){
            $data[]=$row;
        }

        return $res = [
            "draw"=> isset($request['draw'])?$request['draw']:0,
            "recordsTotal"=> mysqli_num_rows($resData),
            "recordsFiltered"=> mysqli_num_rows($resData),
            "data"=>$data
        ];
        
    }

    public function bayar_denda($data)
    {
        $query = 'UPDATE '.$this->table.' SET
             pelunasan='.$data['pelunasan'].' 
             where id_pengembalian="'.$data['id_pengembalian'].'"';

             mysqli_query($this->koneksi, $query);
    }

}

?>