<?php
$nombres = array("juan", "maría", "pedro", "luis", "ana", "carlos", "laura", "david", "sofía", "elena");

$apellidos = array("garcía", "martínez", "lópez", "gonzález", "rodríguez", "fernández", "pérez", "martín", "sánchez", "ruiz");

//Función que devolverá un array con los nombres generados randómicamente
function generarnombres($n_elementos){
    global $nombres;
    global $apellidos;
    $nombrescompletos = array();
    for ($i = 0; $i < $n_elementos; $i++) {
        $nombre = ucfirst($nombres[array_rand($nombres)]);
        $apellido = ucfirst($apellidos[array_rand($apellidos)]);
        $nombrescompletos[$i] = $nombre[0] . substr($nombre, 1) . " " . $apellido[0] . substr($apellido, 1);
    }
    return $nombrescompletos;
}

//imprimir el array con salto te línea
function imprimir($nombrescompletos){
	foreach ($nombrescompletos as $nombre_completo) {
    	echo $nombre_completo . "<br>";}}

echo "<h1>Lista de Nombres Aleatorios</h1> <br>";
imprimir(generarnombres(15));
?>