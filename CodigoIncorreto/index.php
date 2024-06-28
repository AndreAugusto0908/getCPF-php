
<html>
		<!-- A tag <title> deve estar dentro da tag <head>. -->
	<title> MEU CEP </title>
	<body> 
		<!-- O atributo action do formulário está apontando para "idex.php", deveria ser "index.php",
		 para que o arquivo processe o formulário corretamente. -->
		<form action="idex.php" method="post">
		<label> Insira o CEP: </label>
		<input type="text" name="cep">
		<input type="submit" value="Enviar">

		<!-- A tag <form> não está fechada. --> 
	</body>
</html>

<?php

if(!empty($_POST['cep'])){
	
	$cep = $_POST['cep'];

	// Dentro da função get_address, você se refere a ($cp), que não foi definida anteriormente. O correto seria ($cep), que é o parâmetro recebido pela função.
	// A linha $address = (get_address($cp)); possui parênteses desnecessários.
	$address = (get_address($cp));

	
	echo "<br><br>CEP Informado: $cep<br>";

	// A variável deveria ser $address, não $addres.
	// A propriedade deveria ser 'logradouro', não 'logradoro'.
	echo "Rua: $addres->logradoro<br>";
	echo "Bairro: $address->bairro<br>";


	// A variável está errada e deveria ser $address.
	echo "Estado: $adress->uf<br>";
}

function get_address($cep){
	
	
	$cep = preg_replace("/[^0-9]/", "", $cep);
	// A URL está mal formada. Deveria ter uma barra (/) entre 'ws' e $cep, assim: "http://viacep.com.br/ws/$cep/xml/"
	$url = "http://viacep.com.br/ws$cep/xml/";

	$xml = simplexml_load_file($url);
	return $xml;
}

?>