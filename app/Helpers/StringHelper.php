<?php

if (!function_exists('limpiarString')) {
    function limpiarString($cadena) {
        $cadena = preg_replace('/[^a-zA-Z0-9\s]/u', '', $cadena);
        $cadena = str_replace(' ','-',trim($cadena));

        $vocalesConAcento = ['á', 'é', 'í', 'ó', 'ú','ü', 'Á', 'É', 'Í', 'Ó', 'Ú','Ü','Ñ'];
        $vocalesSinAcento = ['a', 'e', 'i', 'o', 'u','u', 'A', 'E', 'I', 'O', 'U','U','n'];

        $cadena = str_replace($vocalesConAcento, $vocalesSinAcento, $cadena);
        return $cadena;
    }
}

if(!function_exists('obtenerPalabrasLargas')){
    function obtenerPalabrasLargas($texto) {
        // Obtener un array de palabras
        $palabras = str_word_count($texto, 1);

        // Filtrar palabras de más de cuatro caracteres
        $palabrasLargas = array_filter($palabras, function($palabra) {
            return strlen($palabra) >= 4;
        });

        return implode(",",$palabrasLargas);
    }

}

if(!function_exists('arrayPluck')){
    function arrayPluck($array, $key) {
        $arr = array_column($array, $key);
        return array_values($arr);
    }
}
