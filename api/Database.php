<?php
require('config_db.php');

class Database  {
    private $host = DB_HOST;
    private $user = DB_USERNAME;
    private $pass = DB_PASSWORD;
    private $db   = DB_NAME;
    private $myconn;

    public function connect() {
        $con = mysqli_connect($this->host, 
            $this->user, 
            $this->pass, 
            $this->db
        );

        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;
        }
        return $this->myconn;
    }

    public function close() {
        mysqli_close($this->myconn);
    }

    function autoNumber($id, $table){
        $query = 'SELECT MAX(RIGHT('.$id.', 4)) as max_id FROM '.$table.' ORDER BY '.$id;
        $result = mysqli_query($this->myconn, $query);

        $data = mysqli_fetch_array($result);
        $sort_num = (int) substr($data['max_id'], 1, 4);
        $sort_num++;
        $new_code = sprintf("%04s", $sort_num);
        return $new_code;
    }
}
