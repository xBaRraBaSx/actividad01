<!DOCTYPE html>
<html>
<head>
    <title>Contador de letras y vocales</title>
</head>
<body>
    <h2>Contador de letras y vocales</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="frase">Ingresa una frase:</label>
        <input type="text" id="frase" name="frase">
        <button type="submit">Contar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $frase = $_POST["frase"];
	
	//contar volar "o"
        function contarLetraO($cadena) {
            return substr_count(strtolower($cadena), 'o');
        }

	//genera un array con cada vocal y su cantidad, además de un total general
        function contarVocales($cadena) {
            $vocales = ['a', 'e', 'i', 'o', 'u'];
            $resultado = [];
            $totalVocales = 0;
            foreach ($vocales as $vocal) {
                $contador = substr_count(strtolower($cadena), $vocal);
                if ($contador > 0) {
                    $resultado[$vocal] = $contador;
                    $totalVocales += $contador;
                }
            }
            $resultado['total'] = $totalVocales;
            return $resultado;
        }

        $contador_o = contarLetraO($frase);
        $vocales = contarVocales($frase);

        echo "<p>Cantidad de veces que aparece la letra 'o': $contador_o</p>";
	echo "<p>Total de vocales en la cadena: {$vocales['total']}</p>";        
	echo "<p>Vocales que aparecen:</p>";
        foreach ($vocales as $vocal => $contador) {
            if ($vocal != 'total') {
                echo "<p>$vocal: $contador</p>";
            }
        }
    }
    ?>
</body>
</html>
