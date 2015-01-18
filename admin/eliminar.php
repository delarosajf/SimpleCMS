<?php
$id = (int) $_GET['id'];
$exit = false;
$error = array();
if(!isset($id)){
   header('location:../index.php');
}
$resultado = $mysqli->query("SELECT * FROM ".$mysql['prefijo']."crud WHERE id=".$id);
if($resultado->num_rows!=1){
   $error[] = 'La entrada seleccionada no existe.';
}
if(!$mysqli->query("DELETE FROM ".$mysql['prefijo']."crud WHERE id=".$id)){
   $error[] = "Hubo un problema al eliminar la entrada.";
}
if(empty($error)){
   echo 'Entrada eliminada correctamente. <a href="../index.php">Ir al inicio</a>';
}else{
   foreach($error as $err){
      echo $err."<br />";
   }
}
?>