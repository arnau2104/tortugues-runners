<?php

$tokens_json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/tortugues-runners-web/json/token.json'),true);
$expires_at = (int)$tokens_json['expires_at'];

if(time() >= $expires_at) {
    $access_token =  refreshToken();
} else {
    $access_token = $tokens_json['access_token'];
}
// $access_token = '1832ffe41b567722a3b2f0c6d1cd38cf4cd78de9';

function solicitudCurl($url) {

    global $access_token; //definim la variable com a global per poder utlitzar-le per tot

    // Iniciar cURL
    $ch = curl_init();

    //solicitud cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // true = resposta s'almacena a variable false = imprimeix resposta directa, sense necesitat de echo
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $access_token",
        "Content-Type: application/json"
    ]);

        // Executar la solicitud y obtenir la resposta
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
        // Tancar conexión cURL
        curl_close($ch);
        
         // Retornar els dos valors
    return [
        'http_code' => $http_code,
        'response' => $response
    ];

        
}

function agafarActivitats() {

    // Token d'acces a Strava

    //url de la consulta
    $url = 'https://www.strava.com/api/v3/athlete/activities';
    
    $resposta = solicitudCurl($url);

    // Verificar si la resposta ha sigut exitosa 
    if ($resposta['http_code'] == 200) {
        $consulta = json_decode($resposta['response'], true);
        
       return $consulta;
    } else {
        echo "Error al obtener actividades. Código HTTP: " . $resposta['http_code'];
    }

}

function agafarActivitatPerId($id){

    $url = "https://www.strava.com/api/v3/activities/$id";

    $resposta = solicitudCurl($url);


    if ($resposta['http_code'] == 200) {
        $consulta = json_decode($resposta['response'], true);
        
       return $consulta;
    } else {
        echo "Error al obtener la actividad $id . Código HTTP: " . $resposta['http_code'];
    };

}

// funcio per refrescar el token d'acces ja que caduca cada 6 hores
function refreshToken() {
    global $tokens_json;
     
    $client_id = '154235';
    $client_secret = 'dfb8c506071dddfe09ff8eaeac496f9464c45c58';
    $refresh_token = $tokens_json['refresh_token'];

    $url = 'https://www.strava.com/oauth/token';

    $data = [
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'grant_type' => 'refresh_token',
        'refresh_token' => $refresh_token
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context  = stream_context_create($options);

     // Usar cURL en lugar de file_get_contents
     $ch = curl_init();

     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
 
     $response = curl_exec($ch);

    if ($response === FALSE) {
        die('Error al hacer el refresh token');
    }
    
    $response = json_decode($response, true);
    
    // Guardam els nous tokens al fitxer tokens.json
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/tortugues-runners-web/json/token.json', json_encode([
        'token_type' => $response['token_type'],
        'access_token' => $response['access_token'],
        'expires_at' => time() + $response['expires_at'],
        'expires_in' => $response['expires_in'],
        'refresh_token' => $response['refresh_token']
       
    ], JSON_PRETTY_PRINT));
    
    echo "Tokens actualizados correctamente.";

    return $response['access_token'];


}

?>