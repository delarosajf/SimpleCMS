<?php
include('template/header.inc.php');
include('../includes/config.inc.php');
$id = (int) $_GET['id'];
$exit = false;
$error = array();

if(isset($_POST['submit'])){
   $titulo = htmlentities($_POST['titulo'], ENT_QUOTES);
   $autor = htmlentities($_POST['autor'], ENT_QUOTES);
   $contenido = htmlentities($_POST['contenido'], ENT_QUOTES);
   
   if(empty($titulo) || empty($autor) || empty($contenido)){
      $error[] = "Rellene todos los datos";
   }else{
      if(!$mysqli->query("UPDATE ".$mysql['prefijo']."crud SET titulo='".$titulo."', autor='".$autor."', contenido='".$contenido."' WHERE id=".$id)){
         $error[] = "Hubo un error al insertar la entrada";
      }
   }
   
   if(empty($error)){
      echo 'Editada correctamente. <a href="../index.php?p=post&id='.$id.'">Ver entrada</a>';
   }else{
      foreach($error as $err){
         echo $err."<br />";
      }
   }
}
if(!isset($id)){
   header('location:index.php');
}
$resultado = $mysqli->query("SELECT * FROM ".$mysql['prefijo']."crud WHERE id=".$id);
$entrada = $resultado->fetch_assoc();
if($resultado->num_rows!=1){
   echo 'La entrada seleccionada no existe.';
}else{
?>
<form action="" method="post">
   <label for="">Titulo: <input type="text" name="titulo" value="<?php echo $entrada['titulo']; ?>"></label>
   <label for="">Autor: <input type="text" name="autor" value="<?php echo $entrada['autor']; ?>"></label>
   <label for="">Contenido: <textarea name="contenido" id="" cols="80" rows="15"><?php echo $entrada['contenido']; ?></textarea></label>
   <button name="submit">Registrar</button>
</form>
<?php
}
include('template/footer.inc.php');
?>