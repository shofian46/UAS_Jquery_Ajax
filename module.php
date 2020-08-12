<?php 
    $app_js	    = "";
    $app_page   = "";
    $url 	    = isset($_GET['url'])?$_GET['url']:'';

    switch ($url){
        case "biodata":
            $app_page = "page/biodata/biodataIndex.php";
            $app_js = "page/biodata/biodataJs.php";
        break;

        case "buku":
            $app_page = "page/buku/bukuIndex.php";
            $app_js = "page/buku/bukuJs.php";
        break;

        case "peminjaman":
            $app_page = "page/peminjaman/peminjamanIndex.php";
            $app_js = "page/peminjaman/peminjamanJs.php";
        break;

        case "pengembalian":
            $app_page = "page/pengembalian/index.php";
            $app_js = "page/pengembalian/js.php";
        break;

        case "peminjaman_list":
            $app_page = "page/peminjaman/peminjaman_list.php";
            $app_js = "page/peminjaman/peminjaman_list_js.php";
        break;

        case "rpt_pinjam":
            $app_page = "page/report/rpt_pinjam_index.php";
            $app_js = "page/report/rpt_pinjam_js.php";
        break;

        default:
            echo "Welcome to my App";
        break;
    }

?>