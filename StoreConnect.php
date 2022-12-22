<?php

    error_reporting(1);
    // // live
    // $serverName = "192.168.0.45";//serverName\instanceName
    // $userId = "sa";
    // $userPassword = "P@ssguard11";
    // $database = "TAJ_DynamicsAX";

    // UAT
    // $serverName = "MSDTESTSRV";
    // $serverName = "192.168.206.4";
    // $userId = "sa";
    // $userPassword = "123456";
    // $database = "RTDB";


    $connectionInfo = array("UID" => $userId,
                            "PWD" => $userPassword,
                            "Database"=> $database,
                            "TrustServerCertificate"=>True);
    $StoreConnect = sqlsrv_connect($serverName,$connectionInfo);
    if(!$StoreConnect){
        // print_r(sqlsrv_errors(), true);
        echo "<script>alert('Oops connection Problem')</script>";
    }

?>