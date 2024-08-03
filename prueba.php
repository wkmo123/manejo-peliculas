<?php
//Configuración del algoritmo de encriptación
//Debes cambiar esta cadena, debe ser larga y unica
//nadie mas debe conocerla
$clave  = 'd67e9968-a547-4a80-8866-0abd2b25d2c2';
//Metodo de encriptación
$method = 'aes-256-cbc';
// Puedes generar una diferente usando la funcion $getIV()
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
/*
 Encripta el contenido de la variable, enviada como parametro.
  */
$encriptar = function ($valor) use ($method, $clave, $iv) {
    return openssl_encrypt($valor, $method, $clave, false, $iv);
};
/*
 Desencripta el texto recibido
 */


$desencriptar = function ($valor) use ($method, $clave, $iv) {
    $encrypted_data = base64_decode($valor);
    return openssl_decrypt($valor, $method, $clave, false, $iv);
};
/*
 Genera un valor para IV
 */
$getIV = function () use ($method) {
    return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
};


// Valor encriptado que deseas desencriptar
$valorEncriptado = "aa2a9c7ff6ce4d73f5f2270d90b164ed";

// Llama a la función de desencriptar con la clave y el valor encriptado
$valorDesencriptado = $desencriptar($valorEncriptado);

if ($valorDesencriptado !== false) {
    echo "Valor Desencriptado: " . $valorDesencriptado;
} else {
    echo "Error al desencriptar el valor.";
}
