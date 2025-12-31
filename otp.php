<?php


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.sms.ir/v1/send/verify',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
  "Mobile": "0935804614",
  "TemplateId": "10000",
  "Parameters": "{
  "Name": "code",
  "Value": "158465"
  }"
}',
        CURLOPT_HTTPHEADER => '{
        "X-API-KEY": "PN1TVeBeaAehFLJAKU4XdfpsFXsQguYfleO0bV4ceh6diTZid2hRXza3uSkBbDef"
        }',
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    print_r($response);

    header("location: https://api.sms.ir/v1/send/verify");
