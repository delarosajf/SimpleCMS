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
$ruta = 'includes/templates/default/';
function cortar($contenido, $ancho){
   if (strlen($contenido) > $ancho){
      $contenido = wordwrap($contenido, $ancho);
      $contenido = substr($contenido, 0, strpos($contenido, "\n"));
   }
   return $contenido;
}
?>