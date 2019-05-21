
<?php
$url = "https://miagenciamt.com/api/public/api/search?origin=UIO&destination=GYE&departureDate=2019-05-21&arrivalDate=2019-05-23&numAdultos=1&numCnn=&numInf=&clase=Y";

$contextOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'CN_match'    => 'zendsoap.lan' // asumimos que este es un certificado valido
    )
);

$sslContext = stream_context_create($contextOptions);

$obj = file_get_contents($url, NULL, $sslContext);
$array2 = (json_decode($obj, true));

//echo "OJO";
//echo "<pre>";
//print_r($array2);
//echo "</pre>";
//impresion de todo el JSON

foreach ($array2 as $clave => $valor) {
    if ($clave == "result") {
        echo "<h1>$clave</h1>";
        if (is_array($valor)) {
            foreach ($valor as $clave2 => $valor2) {
                if ($clave2 == "OTA_AirLowFareSearchRS") {
                    echo "<h1>$clave2</h1>";
                }
                if (is_array($valor2)) {
                    foreach ($valor2 as $clave3 => $valor3) {
                        if ($clave3 == "PricedItineraries") {
                            echo "<h2>$clave3</h2>";
                        }
                        if (is_array($valor3)) {
                            foreach ($valor3 as $clave4 => $valor4) {
                                if ($clave4 == "PricedItinerary") {
                                    echo "<h2>$clave4</h2>";
                                }

                                if (is_array($valor4)) {
                                    foreach ($valor4 as $clave5 => $valor5) {
                                        //echo "<font color='#ff00ff'> ". $clave5." </font>";
                                        if ($clave5 == "0") {
                                            echo "clave del arreglo ";
                                            echo "<br>";
                                            echo "<h1> " .$clave5 . " </h1>";
                                            if (is_array($valor5)) {
                                                foreach ($valor5 as $clave6 => $valor6) {
                                                    echo "<br>";
                                                    echo "<font color='#FF5733'> " . $clave6 . " </font>";
                                                    echo "<pre>";
                                                    print_r($valor6);
                                                    echo "</pre>";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

?>