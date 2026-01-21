<?php 

$host = '192.168.100.10';
$user = 'root';
$password = 'ifrn';
$dbname =  'controle_eventos'; 

$connect =  mysqli_connect($host, $user, $password, $dbname); 

if (!$connect) {
	die("Erro ao conectar ao banco de dados:" . mysqli_connect_error());
}
?>
