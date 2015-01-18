<?php
include('../includes/config.inc.php');
include('template/header.inc.php');
$p = $_GET['p'];
if(in_array($p, array('agregar', 'editar', 'eliminar', 'login'))){
   include($p.'.php');
}
include('template/footer.inc.php');
?>