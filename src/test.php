<?php

// $list =
//     Array
//     (
//         0 => '8.213.129.36:80',
//         1 => '8.213.128.171:80',
//         2 => '170.155.5.235:8080',
//     )
//     ;

    $url = $_SERVER["REQUEST_URI"];
    echo "asd";
    exit();

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_PROXY, "8.213.129.36:80");

    $content = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    curl_close($ch);

    echo $status;

    // for($i=0; $i < count($list) ;$i++)
    // {
    //     $ch = curl_init($url);

    //     curl_setopt($ch, CURLOPT_PROXY, $list[$i]);

    //     $content = curl_exec($ch);
    //     $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
    //     curl_close($ch);

    //     echo $status;
    // }

    exit();


    //1st step
//php server run:php -S 127.0.0.1:8080

//2nd step
// $_SERVER eita dia request pabo curl korar por

// $url = $_SERVER["REQUEST_URI"];
// echo $url;
// exit();


?>


