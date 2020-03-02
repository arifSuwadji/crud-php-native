
<?php
error_reporting(E_ALL & ~E_NOTICE);
define ("HOST","localhost");
define ("DB_USER","root");
define ("DB_PASSWORD","");
define ("DB_NAME","nixsms2020");

function Connect(){
    $connect = mysqli_connect(HOST, DB_USER, DB_PASSWORD,DB_NAME);
    if($connect){
        return $connect;
    } else {
      die('Connection failed: ' . mysqli_connect_error());
      return FALSE;
    }
}
?>
