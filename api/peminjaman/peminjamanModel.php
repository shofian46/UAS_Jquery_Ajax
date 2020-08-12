<?php
include "../Database.php";

class PeminjamanModel {
    private $koneksi;
    private $table;
    private $db;

    public function __construct(){
        $this->db = new Database();
        $this->table = 'peminjaman_header';
        $this->tbl_member='member';
        $this->koneksi = $this->db->connect();
    }

    public function add($data){
        $request= json_decode(json_encode($data));
        $idPinjam = $this->db->autoNumber('idpinjam',$this->table);
        
        //insert ketable header
        $query_header = "INSERT INTO $this->table (`idpinjam`, `idpeminjam`, `tglPinjam`, `tglKembali`, `status`)";
        $query_header .=" VALUES ('".$idPinjam."', '".$request->peminjam."', '".$request->tglpinjam."', '".$request->tglkembali."', '0')";
        $res = mysqli_query($this->koneksi, $query_header);

        //insert ketable detail
        $query_detail = "INSERT INTO `peminjaman_detail` (`idpinjam`, `idbuku`, `qty`) VALUES ";
        foreach($request->detail as $row){
            $query_detail .=" ('".$idPinjam."', '".$row->id."', '".$row->jml."'), ";
        }
        $res = mysqli_query($this->koneksi, rtrim($query_detail, ", "));

        return $res;
    }

    public function get($request){
        $column = [
            "peminjaman_header.idpinjam",
            'member.nim',
            'member.nama',
            'peminjaman_header.tglPinjam',
            'peminjaman_header.tglKembali'
        ];

        $query = "SELECT ".$this->table.".*, ".$this->tbl_member.".nama, ".$this->tbl_member.".nim FROM ";
        $query .= "peminjaman_header ";
        $query .="INNER JOIN member on member.nim = peminjaman_header.idpeminjam ";
        
        $query .= "where status='0' ";

        if(isset($request['filter_date_start']) && isset($request['filter_date_end'])){
            $query .= " AND peminjaman_header.tglPinjam BETWEEN '".$request['filter_date_start']."' AND '".$request['filter_date_end']."'";
        }

        if(isset($request['search']['value']))
            $query .= " AND peminjaman_header.idpinjam LIKE('%".$request['search']['value']."%')";
            

        $orderBy = "peminjaman_header.idpinjam";
        if(isset($request['order'][0]['column']) &&  $request['order'][0]['column'] <= count($column))
            $orderBy = $column[$request['order'][0]['column']];

        if(isset($request['order'][0]['dir']))
            $query .= " Order by ".$orderBy." ".$request['order'][0]['dir'];

        $res = mysqli_query($this->koneksi, $query);

        $data=[];
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
        }

        return $res = [
            "draw"=> isset($request['draw'])?$request['draw']:0,
            "recordsTotal"=> count($data),
            "recordsFiltered"=> count($data),
            "data"=>$data
        ];
        
    }

}