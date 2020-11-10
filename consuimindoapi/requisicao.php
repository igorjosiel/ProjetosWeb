<?php
	$cep = $_GET['cep'];

	echo gerarURL($cep);

	function gerarURL($cep)
	{
		$url = 'https://viacep.com.br/ws/'. $cep .'/json/';
		$json_file = file_get_contents($url);

		return $json_file;
	}
?>


