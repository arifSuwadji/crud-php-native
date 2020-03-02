<?php
require_once 'config/conn.php';

function GetAll(){
  $dataFilter = array();
	array_push($dataFilter, 'pengguna_grup');
	array_push($dataFilter, 'nama_pengguna');
	array_push($dataFilter, 'username');
	array_push($dataFilter, 'email');
	array_push($dataFilter, 'password');
	array_push($dataFilter, 'tanggal_daftar');
	array_push($dataFilter, 'tanggal_kunjungan_akhir');
	$queryLimit = "SELECT * FROM pengaturan WHERE pengaturan_id=1";
  $resultLimit = mysqli_query(Connect(), $queryLimit);
  $exeLimit = mysqli_fetch_object($resultLimit);
  $limitQuery = $exeLimit ? $exeLimit->isi_pengaturan : 0;
  $query = "SELECT * FROM pengguna INNER JOIN pengguna_grup ON pengguna_grup.grup_id = pengguna.pengguna_grup limit 0,$limitQuery";
  $array_search = array();
  foreach($dataFilter as $fieldName){
    if($_GET[$fieldName]){
      array_push($array_search, $fieldName .' like "%'.$_GET[$fieldName] .'%"');
    }
  }
  if(count($array_search) > 0){
    $query = "SELECT * FROM pengguna INNER JOIN pengguna_grup ON pengguna_grup.grup_id = pengguna.pengguna_grup WHERE ". join(' AND ',$array_search)." limit 0,$limitQuery";
  }$exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('pengguna_id' => $data['pengguna_id'],
    'pengguna_grup' => $data['pengguna_grup'],
    'nama_grup' => $data['nama_grup'],
		'nama_pengguna' => $data['nama_pengguna'],
		'username' => $data['username'],
		'email' => $data['email'],
		'password' => $data['password'],
		'tanggal_daftar' => $data['tanggal_daftar'],
		'tanggal_kunjungan_akhir' => $data['tanggal_kunjungan_akhir'],
		
    );
  }
  return $datas;
}

function getPenggunaGrup(){
  $query = "SELECT * FROM `pengguna_grup`";
  $result = mysqli_query(Connect(), $query);
  
  $datas = array();
  while($data = mysqli_fetch_array($result)){
    $datas[] = array('grup_id' => $data['grup_id'], 'nama_grup' => $data['nama_grup']);
  }
  return $datas;
}

function GetOne($id){
  $query = "SELECT * FROM  `pengguna` WHERE  `pengguna_id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('pengguna_id' => $data['pengguna_id'], 
		'pengguna_grup' => $data['pengguna_grup'], 
		'nama_pengguna' => $data['nama_pengguna'], 
		'username' => $data['username'], 
		'email' => $data['email'], 
		'password' => $data['password'], 
		'tanggal_daftar' => $data['tanggal_daftar'], 
		'tanggal_kunjungan_akhir' => $data['tanggal_kunjungan_akhir'], 
		
    );
  }
return $datas;
}

function Insert(){
  $pengguna_grup=$_POST['pengguna_grup']; 
		$nama_pengguna=$_POST['nama_pengguna']; 
		$username=$_POST['username']; 
		$email=$_POST['email']; 
		$password=sha1($_POST['password']); 
		$tanggal_daftar= date('Y-m-d H:i:s'); 
		
  $query = "INSERT INTO `pengguna` (`pengguna_grup`,`nama_pengguna`,`username`,`email`,`password`,`tanggal_daftar`)
VALUES ('$pengguna_grup','$nama_pengguna','$username','$email','$password','$tanggal_daftar')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    header("Location: http://localhost/nixsms-center20/pengguna");
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    header("Location: http://localhost/nixsms-center20/pengguna");
  }
}
function Update($id){
  $pengguna_grup=$_POST['pengguna_grup']; 
		$nama_pengguna=$_POST['nama_pengguna']; 
		$username=$_POST['username']; 
		$email=$_POST['email']; 
		$password=sha1($_POST['password']); 
		
  $query = "UPDATE `pengguna` SET `pengguna_grup` = '$pengguna_grup',`nama_pengguna` = '$nama_pengguna',`username` = '$username',`email` = '$email',`password` = '$password' WHERE  `pengguna_id` =  '$id'";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    header("Location: http://localhost/nixsms-center20/pengguna");
  }
  else{
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    header("Location: http://localhost/nixsms-center20/pengguna");
  }
}
function Delete($id){
  $query = "DELETE FROM `pengguna` WHERE `pengguna_id` = '$id'";
  $exe = mysqli_query(Connect(),$query);
    if($exe){
      // kalau berhasil
      $_SESSION['message'] = " Data Sudah dihapus ";
      $_SESSION['mType'] = "success ";
      header("Location: http://localhost/nixsms-center20/pengguna");
    }
    else{
      $_SESSION['message'] = " Data Gagal dihapus ";
      $_SESSION['mType'] = "danger ";
      header("Location: http://localhost/nixsms-center20/pengguna");
    }
}


if(isset($_POST['insert'])){
  Insert();
}
else if(isset($_POST['update'])){
  Update($_POST['pengguna_id']);
}
else if(isset($_POST['delete'])){
  Delete($_POST['pengguna_id']);
}
?>
