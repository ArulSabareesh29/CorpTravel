<?php
function callAPI($method, $url, $data)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }

            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }

            break;
        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }

    }

    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'APIKEY: 164de5-ac06c3',
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    // EXECUTE:
    $result = curl_exec($curl);
    if (!$result) {die("Connection Failure");}
    curl_close($curl);
    return $result;
}

$get_data = callAPI('GET', 'http://aviation-edge.com/v2/public/flights?key=164de5-ac06c3&limit=30000' . $user['geography']['speed'], false);
$response = json_decode($get_data, true);
$errors = $response['response']['errors'];
$data = $response['response']['data'][0];

// print_r($response);

// Multidimensional array
$responses = array(
    "geography" => array(
        "latitude" => "43.5033",
        "longitude" => " -79.1297",
    ),
    "speed" => array(
        "horizontal" => "833.4",
        "isGround" => "0",
    ),
);

// Printing all the keys and values one by one
$keys = array_keys($responses);
for ($i = 0; $i < count($responses); $i++) {
    echo $keys[$i] . "{<br>";
    foreach ($responses[$keys[$i]] as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }
    echo "}<br>";
}