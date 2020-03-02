<?php
    require_once "config/conn.php";

    function menuByUrl($url){
        $query = "SELECT * FROM halaman_menu WHERE url_menu = '$url'";
        $result = mysqli_query(Connect(), $query);
        $objectOut = (object) array();
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_object($result);
            foreach($row as $key => $value){
                $objectOut->$key = $value;
            }
            return $objectOut;
        }
    }

    function menuByPeta($adminGrup, $aktifMenu){
        $query = "SELECT `pengguna_grup`, `halaman_menu`, `menu_id`, `judul_menu`, `sub_judul_menu`, `url_menu`, `icon_menu`, `aktif_menu`";
        if($aktifMenu == 'ya'){
            $query .= ", COUNT(1) AS hitungMenu";
            $query .= ", GROUP_CONCAT(CONCAT(`icon_menu`,'|',`url_menu`,'|',`sub_judul_menu`) SEPARATOR ';') AS tampilkanMenu";
            $query .= ", GROUP_CONCAT(icon_menu) AS tampilkanIcon";
            $query .= ", GROUP_CONCAT(url_menu) AS tampilkanUrl";
        }
        $query .= " FROM halaman_menu ";
        $query .= " INNER JOIN hak_akses_menu ON hak_akses_menu.halaman_menu = halaman_menu.menu_id";
        $query .= " WHERE pengguna_grup = $adminGrup AND aktif_menu = '$aktifMenu'";
        if($aktifMenu == 'ya'){
            $query .= " GROUP BY (`judul_menu`)";
        }
        $result = mysqli_query(Connect(), $query);
        if($aktifMenu == 'ya'){
            return $result;
        }else{
            $arrayData = array();
            $object = (object) array();
            $objectOut = (object) array();
            if(mysqli_num_rows($result) > 0){
                while($hal = mysqli_fetch_object($result)){
                    array_push($arrayData, [$hal->halaman_menu => $hal->pengguna_grup]);
                }
                foreach($arrayData as $key => $value){
                    foreach($value  as $key2 => $value2){
                        $object->$key2 = $value2;
                    }
                }
                foreach($object as $key => $value){
                    $objectOut->$key = $value;
                }
                return $objectOut;
            }
        }
    }
?>