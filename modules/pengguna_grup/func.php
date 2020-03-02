<?php
require_once 'config/conn.php';

function GetAll(){
  $dataFilter = array();
	array_push($dataFilter, 'nama_grup');
	$queryLimit = "SELECT * FROM pengaturan WHERE pengaturan_id=1";
  $resultLimit = mysqli_query(Connect(), $queryLimit);
  $exeLimit = mysqli_fetch_object($resultLimit);
  $limitQuery = $exeLimit ? $exeLimit->isi_pengaturan : 0;
  $query = "SELECT * FROM pengguna_grup limit 0,$limitQuery";
  $array_search = array();
  foreach($dataFilter as $fieldName){
    if($_GET[$fieldName]){
      array_push($array_search, $fieldName .' like "%'.$_GET[$fieldName] .'%"');
    }
  }
  if(count($array_search) > 0){
    $query = "SELECT * FROM pengguna_grup WHERE ". join(' AND ',$array_search)." limit 0,$limitQuery";
  }$exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('grup_id' => $data['grup_id'],
		'nama_grup' => $data['nama_grup'],
		
    );
  }
  return $datas;
}

function GetOne($id){
  $query = "SELECT * FROM  `pengguna_grup` WHERE  `grup_id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('grup_id' => $data['grup_id'], 
		'nama_grup' => $data['nama_grup'], 
		
    );
  }
return $datas;
}

function Insert(){
  $nama_grup=$_POST['nama_grup']; 
		
  $query = "INSERT INTO `pengguna_grup` (`nama_grup`)
VALUES ('$nama_grup')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    header("Location: http://localhost/nixsms-center20/pengguna_grup");
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    header("Location: http://localhost/nixsms-center20/pengguna_grup");
  }
}
function Update($id){
  $nama_grup=$_POST['nama_grup']; 
		
  $query = "UPDATE `pengguna_grup` SET `nama_grup` = '$nama_grup' WHERE  `grup_id` =  '$id'";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    header("Location: http://localhost/nixsms-center20/pengguna_grup");
  }
  else{
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    header("Location: http://localhost/nixsms-center20/pengguna_grup");
  }
}
function Delete($id){
  $query = "DELETE FROM `pengguna_grup` WHERE `grup_id` = '$id'";
  $exe = mysqli_query(Connect(),$query);
    if($exe){
      // kalau berhasil
      $_SESSION['message'] = " Data Sudah dihapus ";
      $_SESSION['mType'] = "success ";
      header("Location: http://localhost/nixsms-center20/pengguna_grup");
    }
    else{
      $_SESSION['message'] = " Data Gagal dihapus ";
      $_SESSION['mType'] = "danger ";
      header("Location: http://localhost/nixsms-center20/pengguna_grup");
    }
}


if(isset($_POST['insert'])){
  Insert();
}
else if(isset($_POST['update'])){
  Update($_POST['grup_id']);
}
else if(isset($_POST['delete'])){
  Delete($_POST['grup_id']);
}
?>
