<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://ip-api.com/json/?fields=12120063",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0',
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: 18203000-a84b-7528-44c2-48845eb1ce80",
        // "x-api-key: 4d522c601d5d4350875a531a68076192"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} 
// else {
//     echo $response;
// }
$ip = json_decode($response);
