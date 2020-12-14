<?php
// front controller

// session for all
session_start();


// dependencies
require_once "../config.php";
require_once "../model/connectDBModel.php";
require_once "../model/connectPDOModel.php";

// DB mysqli connection
$db = connectDBModel();
$dbPDO = connectPDOModel();

// connect mysqli error
if(!$db){
    // view  connect error
    include "../view/errorConnectView.php";
    // stop working
    exit();
}
// connect PDO error
if(is_string($dbPDO)){
    // view  connect error
    include "../view/errorConnectPDOView.php";
    // stop working
    exit();
}

// if we're connected
if(isset($_SESSION['identifiant'])&&$_SESSION['identifiant']==session_id()){

    // if we are admin
    if($_SESSION['idpermissions']==1){
        require_once "../controller/adminController.php";
        exit();
    }
    // if we are redactor
    if($_SESSION['idpermissions']==2){
        require_once "../controller/redacController.php";
        exit();
    }
    // if we are moderator
    if($_SESSION['idpermissions']==3){
        require_once "../controller/modoController.php";
        exit();
    }


}

// we aren't connected
require_once "../controller/publicController.php";
