<?php
    $server = "sql101.epizy.com";
    $username = "epiz_33005978";
    $password = "VJ4vSxuqSPJ";
    $db_name = "epiz_33005978_crud";

    $db = new mysqli($server,$username,$password,$db_name);

    if(!$db){ #jika $db gagal terbaca menggunakan 'die' untuk mematikan
        die("Database connection failed");
    }
?>