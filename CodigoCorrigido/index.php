
<html>
<head>
    <title>MEU CEP</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <form action="index.php" method="post">
            <label>Insira o CEP:</label>
            <input type="text" name="cep">
            <input type="submit" value="Enviar">
        </form>
	
	</body>
</html>

<?php

/**
 * Este bloco verifica se um CEP foi enviado via POST. Se sim, ele executa o processo
 * de busca de endereço e exibe os resultados.
 */
if(!empty($_POST['cep'])){
	
	$cep = $_POST['cep'];

	$busca = new BuscarCep();
	$address = $busca->get_address($cep);

	echo "<div class='result'>";
	echo "<br><br>CEP Informado: $cep<br>";
	echo "Rua: $address->logradouro<br>";
	echo "Bairro: $address->bairro<br>";
	echo "Estado: $address->uf<br>";
	echo "</div>";
}

class BuscarCep{
	
	function get_address($cep){
		$cep = preg_replace("/[^0-9]/", "", $cep);
		$url = "http://viacep.com.br/ws/$cep/xml/";
		$xml = simplexml_load_file($url);
		return $xml;
	}

}


?>