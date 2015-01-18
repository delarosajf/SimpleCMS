<?php
include('../includes/config.inc.php');
include('template/header.inc.php');
$p = $_GET['p'];
if(isset($p)){
   if(in_array($p, array('agregar', 'editar', 'eliminar', 'login'))){
      include($p.'.php');
   }
}else{
?>
Bienvenido a la administración
<ul>
   <li><a href="index.php?p=agregar">Agregar entrada</a></li>
   <li><a href="index.php?p=ver">Ver entradas</a></li>
   <li><a href="index.php?p=login&logout=1">Salir</a></li>
</ul>
<?php
}
include('template/footer.inc.php');
?>