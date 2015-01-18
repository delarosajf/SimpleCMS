<?php
$id = (int) $_GET['id'];
$exit = false;
$error = array();
if(!isset($id)){
   header('location:../index.php');
}
$resultado = $mysqli->query("SELECT * FROM ".$mysql['prefijo']."crud WHERE id=".$id);
if($resultado->num_rows!=1){
   echo 'La entrada seleccionada no existe.';
}

if(isset($_POST['si'])){
   if(!$mysqli->query("DELETE FROM ".$mysql['prefijo']."crud WHERE id=".$id)){
      echo "Hubo un problema al eliminar la entrada.";
   }else{
      echo 'Entrada eliminada correctamente. <a href="../index.php">Ir al inicio</a>';
   }
}else{ ?>
<form action="" method="post">
   <div>¿Seguro que desea eliminar la entrada?</div>
   <button name="si">Si</button> <button type="button" onclick="history.back(1)">No</button>
</form>
<?php } ?>