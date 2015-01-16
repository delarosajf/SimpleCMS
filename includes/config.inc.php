<?php
$mysql = array(
   "host" => "localhost",
   "usuario" => "root",
   "pass" => "",
   "bd" => "tfw",
   "prefijo" => "cms_"
);
$mysqli = new mysqli($mysql['host'], $mysql['usuario'], $mysql['pass'], $mysql['bd']);
if($mysqli->connect_error) {
	die('Error conectando a la base de datos');
}
$mysqli->query("SET NAMES 'utf8'");

$stmt = $mysqli->query('SELECT * FROM '.$mysql['prefijo'].'config');
$get = $stmt->fetch_assoc();

$ruta = 'includes/templates/'.$get['plantilla'].'/';
include('functions.inc.php');
?>