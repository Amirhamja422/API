<?php

function checkReg($phone){
    $url = "https://webapi.staging.obhai.com/missed_ride_response";
    $param = [
        'phone_no' => $phone,
        'access_token'=> "a0d11bf2-3eb8-240f-8025-2831732d4f1b",
        'ivr_resp'=> 1
    ];


    // $header = array();
    // $header[] = 'Content-type: application/x-www-form-urlencoded';
    // $header[] = 'Authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpYXQiOjE2MTg4OTU1MjIsImp0aSI6IlRQSTVmdFFUeU5MR1ZLenFOZlVhYThyRURpdEJkRmpIS0ErUGVFMTFjMTg9IiwiaXNzIjoicHVsc2VzZXJ2aWNlc2JkLmNvbSIsImRhdGEiOnsidXNlcklkIjoiMjg4MTUiLCJ1c2VyTGV2ZWwiOjJ9fQ.wQ5AQR-fIGRZgt3CN9-W6v4PkvTIvNVP8HzCOiHHeKwcd8NT1R1Dxz_XpJH9jOa7CsDzCYBklEPRtQus11NiEQ';

    $params = http_build_query($param, '', '&');

    $crl = curl_init();
    curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_HEADER, 0);
    curl_setopt($crl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crl, CURLOPT_POST, 1);
    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $params);
    $response = curl_exec($crl);
    $data = json_decode($response);
    curl_close($crl);
    if($data->message =='Updated successfully.'){
    	return 'Sucess';
    }
}

// echo checkReg("01722147288");


//   eta postman e hit kortea hoi  https://webapi.staging.obhai.com/missed_ride_response
// body te 
//{
    // "access_token": "a0d11bf2-3eb8-240f-8025-2831732d4f1b",
    // "phone_no": "01722147288",
    // "ivr_resp": 1
//}

//ei json encode value detea hobea  
// then ekta response ashea 

//{
//     "flag": 1,
//     "data": {
//         "fieldCount": 0,
//         "affectedRows": 1,
//         "insertId": 0,
//         "serverStatus": 34,
//         "warningCount": 0,
//         "message": "(Rows matched: 1  Changed: 0  Warnings: 0",
//         "protocol41": true,
//         "changedRows": 0
//     },
//     "message": "Updated successfully."
// }

//ei rokom response ashbea