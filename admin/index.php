<?php
include('../includes/config.inc.php');
include('template/header.inc.php');
$p = $_GET['p'];
if(!isset($_SESSION['user'])){
   header('location:login.php');
}else if($_SESSION['admin']!=1){
   header('location:../index.php');
}
if(isset($p)){
   if(in_array($p, array('agregar', 'ver', 'editar', 'eliminar', 'addons'))){
      include($p.'.php');
   }
}else{
?>
<h2>Inicio</h2>
Bienvenido a la administración
<?php
}
include('template/footer.inc.php');
?>
