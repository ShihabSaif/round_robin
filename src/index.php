<?php

    $list = Array (0 => '8.213.129.36:80', 1 => '8.213.128.171:80', 2 => '170.155.5.235:8080');

    $url = $_SERVER["REQUEST_URI"];
    //$url = "http://httpbin.org/ip";
    // echo $url;
    // exit();

    $counter = 0;

    for($i=0; $i < count($list) ;$i++)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_PROXY, $list[$i]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); //timeout in seconds

        $content = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        echo "status code is : " . $status;
        
        curl_close($ch);

        if($status != 200)
        {
            echo "\n" . $error . "\n";
        }

        if($status == "200")
        {
            echo "\n" . $content . "\n";
            $counter = $counter + 1;
            break;
        }
    }

    if($counter == 0)
    {
        echo "No proxy available right now. Request cannot be processed";
    }

    exit();


    //1st step
    //php server run:php -S 127.0.0.1:8080

    //2nd step
    // $_SERVER eita dia request pabo curl korar por
    // header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");
    // header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    // header("Access-Control-Max-Age: 3600");
    // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    // $url = $_SERVER["REQUEST_URI"];
    // echo $url;
    // exit();

    
    /**
     * read response from php curl response
     * support browser or postman request
     * load balancing on proxy
     * exception handling for php curl  
    */

