<?php
$mysql = array(
   "host" => "localhost", /* generalmente es localhost */
   "usuario" => "root", /* generalmente es root */
   "pass" => "", /* Contraseña */
   "bd" => "tfw", /* Base de datos */
   "prefijo" => "cms_"  /* prefijo de nuestras tablas */
);
$mysqli = new mysqli($mysql['host'], $mysql['usuario'], $mysql['pass'], $mysql['bd']);
if($mysqli->connect_error) {
	die('Error conectando a la base de datos');
}
$mysqli->query("SET NAMES 'utf8'");

$stmt = $mysqli->query('SELECT * FROM '.$mysql['prefijo'].'config');
$get = $stmt->fetch_assoc();

$ruta = 'includes/templates/'.$get['plantilla'].'/';
session_start();
include('functions.inc.php');
?>