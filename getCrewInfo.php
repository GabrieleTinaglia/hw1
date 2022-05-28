<?php 
$clientSecret = 'AQCbXhk8oBgGBP5-5mt8HoFa-2_7wSJ-mLOmUNDeb-wG4cXD-6b_-_SNJH_jBKBYDHwzWfrQs1G8_tmgtyG1oXMj7DxvlqJkxO0sUtW_XBTqCM0Cpasvkt7UOVv8zQdDCijqI_opBYrpZpC3qZn0JcIkzZsTEDTArMNhBR46vydv_6vrJsK6zRHCEvW4o-NjshAf8c-_cBllh4JLJbnqX2MxhlCAi28Hfm1QCC3NohpsKg';
$endPoint = 'https://api.instagram.com/oauth/access_token';
$secretCode = '4bea883f06458b7fa1abb81503e52bc3';
 $codeApp = '977020549630025';
 $redirectUrl = 'https://www.GabsRestaurant.it/';
 $endPointImg = 'https://graph.instagram.com/me/';
 $token;
 $user_id;
 $username;
 $dati = array("client_id" => $codeApp, "client_secret" => $secretCode, "grant_type"=>"authorization_code", "redirect_uri"=> $redirectUrl, "code"=>$clientSecret);
 $dati = http_build_query($dati);
 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, $endPoint);
 curl_setopt($curl, CURLOPT_POST, 1);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $dati);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 $result = curl_exec($curl);
 $token= json_decode($result)->access_token;
  curl_close($curl);

$curl2 = curl_init();
curl_setopt($curl2, CURLOPT_URL,
$endPointImg."media?fields=media_url,username&access_token=".$token);
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
$json = json_decode(curl_exec($curl2))->data;
curl_close($curl2);
    $content_array=[];
    $i=0;
    foreach($json as $content){
        $content_array[$i]['media_url']=$content->media_url;
        $content_array[$i]['username']=$content->username;
        $i++; 
    }
    echo json_encode($content_array);
?>