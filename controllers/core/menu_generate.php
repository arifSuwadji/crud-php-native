<?php
    require_once "config/conn.php";

function gen_menu($table, $menu_title, $menu_icon){
    $arrInfo = array("Data" => "", "Tambah" => "create", "Edit" => "edit", "Hapus" => "func");
    foreach($arrInfo as $key => $value) {
        $subReplace = str_replace("_", " ", $table);
        $sub_title = $key.' '.ucwords($subReplace);
        $url_menu = $table;
        $aktif_menu = 'ya';
        if($value){
            $url_menu .= "/".$value;
            $aktif_menu = 'tidak';
        }
        $query = "INSERT INTO `halaman_menu` (`nama_table`, `judul_menu`, `sub_judul_menu`, `url_menu`, `icon_menu`, `aktif_menu`)
                VALUES ('$table', '$menu_title', '$sub_title', '$url_menu', '$menu_icon', '$aktif_menu')";
        mysqli_query(Connect(),$query);
    }
    //delete data table hak_akses_menu grup id 1;
    $query = "DELETE FROM `hak_akses_menu` WHERE grup_id = 1";
    mysqli_query(Connect(), $query);

    //insert privileges
    $query = "INSERT INTO `hak_akses_menu` (`pengguna_grup`, `halaman_menu`) SELECT pengguna_grup.grup_id, halaman_menu.menu_id FROM `pengguna_grup`, `halaman_menu` WHERE pengguna_grup.grup_id=1";
    mysqli_query(Connect(), $query);
}

?>