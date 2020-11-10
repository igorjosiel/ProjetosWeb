<?php
//print_r($_GET);exit;

$cep = $_GET['cep'];

echo gerarURL($cep);

/*print_r($cep);
print_r($logradouro);
print_r($bairro);
print_r($localidade);
print_r($uf);*/

function gerarURL($cep)
{
	$url = 'https://viacep.com.br/ws/'. $cep .'/json/';

	$json_file = file_get_contents($url);
	//$json_str = json_decode($json_file);

	/*$cep = $json_str->cep;
	$logradouro = $json_str->logradouro;
	$bairro = $json_str->bairro;
	$localidade = $json_str->localidade;
	$uf = $json_str->uf;*/

	/*$stringCep = 'cep='.$cep.'&logradouro='.$logradouro.'&bairro='.$bairro.'&localidade='.$localidade.'&uf='.$uf;*/

	print_r($json_file);

	//return $json_file;
}













/*$curl = curl_init();
$return = curl_setopt($curl, CURLOPT_URL, $url);
$data = curl_exec($curl);
$array = json_decode($data);

var_dump($return);

curl_close($curl);

foreach($data as $obj)
{

}*/
?>


