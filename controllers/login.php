<?php
    require_once "config/conn.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $validation_error = array();
    if(empty($username)){
        $validation_error['username'] = "Username belum diisi";
    }
    if(empty($password)){
        $validation_error['password'] = 'Password belum diisi';
    }
    $_SESSION['VALIDATION_ERROR'] = $validation_error;

    if($_SESSION['VALIDATION_ERROR']){
        $nextUrl = BASE_URL ;
        header("Location: $nextUrl");
    }else{
        $dataLogin = array();
        $query = "SELECT * FROM `pengguna` WHERE username = '$username' AND password = sha1('$password')";
        $result = mysqli_query(Connect(), $query);
        $objectOut = (object) array();
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_object($result);
            foreach($row as $key => $value){
                $objectOut->$key = $value;
                $dataLogin[$key] = $value;
            }
        }
        $_SESSION['dataUser'] = $dataLogin;
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $nextUrl = BASE_URL . $_POST['currentUrl'];
        header("Location: $nextUrl");
    }
?>