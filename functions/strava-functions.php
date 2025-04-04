<?php 
$access_token = '1832ffe41b567722a3b2f0c6d1cd38cf4cd78de9';

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
        echo "Error al obtener actividades. Código HTTP: " . $resposta['http_code'];
    };

}
?>