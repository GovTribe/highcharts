<?php
    $ch = curl_init();
    $method = "POST";
    $url = "search.govtribe.com/project/_search";
    $username = 'superuser';
    $password = 'Str33g4ng';
     
    $query = file_get_contents('php://input');
     
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_PORT, 9200);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
     
    $result = curl_exec($ch);
    curl_close($ch);

    header("content-type: application/json");
    echo $result;
?>