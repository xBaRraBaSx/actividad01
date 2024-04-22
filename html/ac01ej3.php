<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 1</title>
    <script>
	//verifica que el número ingresado sea un número y que este
	//sea positivo y menor que 30 o entrará en un Loop
        function validarNumero() {
            var texto = document.getElementById("texto").value;
		//La siguiente validación procura solo recibir números y que estos sean positivos y menores de 29 o entrará en buble infinito
            if (!/^\d+$/.test(texto) || parseInt(texto) <= 0 || parseInt(texto) > 29) {
                alert("Por favor, ingrese un número entero positivo.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <?php
	//devuelve un valor de verdad indicando si el número recibido es primo
    function esPrimo($numero) {
        if($numero < 2) {
            return false;
        }
        for($i = 2; $i <= sqrt($numero); $i++) {
            if($numero % $i === 0) {
                return false;
            }
        }
        return true;
    }

	//genera aleatóriamente números del 1 al 110 y los
	//valida si son primos para imprimirlos
    function imprimir($num){
        echo "Números primos generados aleatoriamente:<br>";
        $numeros_primos = array();
        $cantidad = 0;
        while ($cantidad < $num) {
            $random_number = rand(1, 110);
            if (esPrimo($random_number) && !in_array($random_number, $numeros_primos)) {
                $numeros_primos[] = $random_number;
                $cantidad++;
            }
        }
	//recorre el vector resultante para mostrar
        foreach ($numeros_primos as $primo) {
            echo $primo . "<br>";
        }
        echo '<a href="ac01ej3.php">Volver</a>';
    }

    if(isset($_POST['texto'])){
        $texto = $_POST['texto'];
        $num = intval($texto);
        imprimir($num);
    } else {
        echo '<form method="POST" action="" onsubmit="return validarNumero();">
        <label for="texto"> Introduce un número entero positivo</label>
        <input type="text" id="texto" name="texto">
        <button type="submit">ENVIAR</button>
    </form>';
    }
    ?>
</body>
</html>