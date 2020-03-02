<?php
    ob_start();
    session_start();
    //load file config.php
    include('config/config.php');
    //unset($_SESSION['dataUser']);

    switch (ENVIRONMENT){
        case 'development':
            error_reporting(-1);
            ini_set('display_errors', 1);
        break;

        case 'testing':
        case 'production':
            ini_set('display_errors', 0);
            if (version_compare(PHP_VERSION, '7.0', '>='))
            {
                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
            }
            else
            {
                error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
            }
        break;

        default:
            header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
            echo 'The application environment is not set correctly.';
            exit(1); // EXIT_ERROR
    }

    $currentUrl = 'dashboard';
    $request = $_SERVER['REQUEST_URI'];
    $arrOriginal = explode('?', $request);
    $arrUrl = explode('/',$arrOriginal[0]);
    $pathPage = $arrUrl[PATH_NUMBER];
    if(count($arrUrl) > COUNT_PATH){
        for($i=COUNT_PATH; $i < count($arrUrl); $i++){
            $pathPage .= "/".$arrUrl[$i];
        }
    }
    if($pathPage) $currentUrl = $pathPage;
    define("CURRENT_URL", $currentUrl);

    $title = 'Dashboard';
    if($currentUrl){
        $titleWords = $arrUrl[PATH_NUMBER];
        if(count($arrUrl) > COUNT_PATH){
            for($i=COUNT_PATH; $i < count($arrUrl); $i++){
                $titleWords = $arrUrl[$i] .' '. $titleWords;
            }
        }
        if($titleWords){
            $title = str_replace('_', ' ', $titleWords);
            $title = ucwords($title);
        }
    }
    define("TITLE_PAGE", $title);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fileAction = "/modules/$pathPage/index.php";
        if($pathPage == 'createGenerator'){
            $fileAction = '/controllers/core/generate.php';
        }else if($pathPage == 'login'){
            $fileAction = '/controllers/login.php';
        }else if($pathPage){
            if(count($arrUrl) > COUNT_PATH){
                $fileAction = "/modules/$pathPage.php";
            }
        }
        switch($pathPage){
            case $pathPage:
                require __DIR__ . $fileAction;
                break;
            default :
                http_response_code(404);
                require __DIR__ . '/views/404.php';
                break;
        }
    }else if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $fileView = "/modules/$pathPage/index.php";
        if($pathPage == 'generator'){
            $fileView = '/views/core/index.php';
        }else if($pathPage){
            if(count($arrUrl) > COUNT_PATH){
                $fileView = "/modules/$pathPage.php";
            }
        }else{
            $fileView = "/views/dashboard.php";
        }
        if(!isset($_SESSION['dataUser'])){
            $fileView = "/views/login.php";
        }
        switch($pathPage){
            case 'logout' :
                unset($_SESSION['dataUser']);
                header("Location: ".BASE_URL);
            case 'dashboard':
                require __DIR__ . "/views/dashboard.php";
                break;
            case $pathPage:
                require __DIR__ . $fileView;
                break;
            default:
                http_response_code(404);
                require __DIR__ . '/views/404.php';
                break;
        }
    }else{
        echo 'METHOD NOT FOUND';
    }
?>