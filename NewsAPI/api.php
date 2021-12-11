<?php

    $apiKey = '7052ebabacae42f9817745f6415c9695';

    $topic = $_GET["q"];
    $url = "https://newsapi.org/v2/everything?q=".$topic."&apiKey=".$apiKey;
    $response = file_get_contents($url);
    $myJSON = json_encode($response);
    echo $myJSON;

?>