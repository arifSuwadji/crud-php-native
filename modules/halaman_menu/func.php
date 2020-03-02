<?php
require_once 'config/conn.php';

function GetAll(){
  $dataFilter = array();
	array_push($dataFilter, 'nama_table');
	array_push($dataFilter, 'judul_menu');
	array_push($dataFilter, 'sub_judul_menu');
	array_push($dataFilter, 'url_menu');
	array_push($dataFilter, 'icon_menu');
	array_push($dataFilter, 'aktif_menu');
	$queryLimit = "SELECT * FROM pengaturan WHERE pengaturan_id=1";
  $resultLimit = mysqli_query(Connect(), $queryLimit);
  $exeLimit = mysqli_fetch_object($resultLimit);
  $limitQuery = $exeLimit ? $exeLimit->isi_pengaturan : 0;
  $query = "SELECT * FROM halaman_menu limit 0,$limitQuery";
  $array_search = array();
  foreach($dataFilter as $fieldName){
    if($_GET[$fieldName]){
      array_push($array_search, $fieldName .' like "%'.$_GET[$fieldName] .'%"');
    }
  }
  if(count($array_search) > 0){
    $query = "SELECT * FROM halaman_menu WHERE ". join(' AND ',$array_search)." limit 0,$limitQuery";
  }$exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('menu_id' => $data['menu_id'],
		'nama_table' => $data['nama_table'],
		'judul_menu' => $data['judul_menu'],
		'sub_judul_menu' => $data['sub_judul_menu'],
		'url_menu' => $data['url_menu'],
		'icon_menu' => $data['icon_menu'],
		'aktif_menu' => $data['aktif_menu'],
		
    );
  }
  return $datas;
}

function GetOne($id){
  $query = "SELECT * FROM  `halaman_menu` WHERE  `menu_id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('menu_id' => $data['menu_id'], 
		'nama_table' => $data['nama_table'], 
		'judul_menu' => $data['judul_menu'], 
		'sub_judul_menu' => $data['sub_judul_menu'], 
		'url_menu' => $data['url_menu'], 
		'icon_menu' => $data['icon_menu'], 
		'aktif_menu' => $data['aktif_menu'], 
		
    );
  }
return $datas;
}

function Insert(){
  $nama_table=$_POST['nama_table']; 
		$judul_menu=$_POST['judul_menu']; 
		$sub_judul_menu=$_POST['sub_judul_menu']; 
		$url_menu=$_POST['url_menu']; 
		$icon_menu=$_POST['icon_menu']; 
		$aktif_menu=$_POST['aktif_menu']; 
		
  $query = "INSERT INTO `halaman_menu` (`nama_table`,`judul_menu`,`sub_judul_menu`,`url_menu`,`icon_menu`,`aktif_menu`)
VALUES ('$nama_table','$judul_menu','$sub_judul_menu','$url_menu','$icon_menu','$aktif_menu')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    header("Location: http://localhost/nixsms-center20/halaman_menu");
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    header("Location: http://localhost/nixsms-center20/halaman_menu");
  }
}
function Update($id){
  $nama_table=$_POST['nama_table']; 
		$judul_menu=$_POST['judul_menu']; 
		$sub_judul_menu=$_POST['sub_judul_menu']; 
		$url_menu=$_POST['url_menu']; 
		$icon_menu=$_POST['icon_menu']; 
		$aktif_menu=$_POST['aktif_menu']; 
		
  $query = "UPDATE `halaman_menu` SET `nama_table` = '$nama_table',`judul_menu` = '$judul_menu',`sub_judul_menu` = '$sub_judul_menu',`url_menu` = '$url_menu',`icon_menu` = '$icon_menu',`aktif_menu` = '$aktif_menu' WHERE  `menu_id` =  '$id'";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    header("Location: http://localhost/nixsms-center20/halaman_menu");
  }
  else{
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    header("Location: http://localhost/nixsms-center20/halaman_menu");
  }
}
function Delete($id){
  $query = "DELETE FROM `halaman_menu` WHERE `menu_id` = '$id'";
  $exe = mysqli_query(Connect(),$query);
    if($exe){
      // kalau berhasil
      $_SESSION['message'] = " Data Sudah dihapus ";
      $_SESSION['mType'] = "success ";
      header("Location: http://localhost/nixsms-center20/halaman_menu");
    }
    else{
      $_SESSION['message'] = " Data Gagal dihapus ";
      $_SESSION['mType'] = "danger ";
      header("Location: http://localhost/nixsms-center20/halaman_menu");
    }
}


if(isset($_POST['insert'])){
  Insert();
}
else if(isset($_POST['update'])){
  Update($_POST['menu_id']);
}
else if(isset($_POST['delete'])){
  Delete($_POST['menu_id']);
}
?>
