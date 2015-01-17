<?php
include('template/header.inc.php');
include('../includes/config.inc.php');
$error = array();

if(isset($_POST['submit'])){
   $titulo = htmlentities($_POST['titulo'], ENT_QUOTES);
   $autor = htmlentities($_POST['autor'], ENT_QUOTES);
   $contenido = htmlentities($_POST['contenido'], ENT_QUOTES);

   if(empty($titulo) || empty($autor) || empty($contenido)){
      $error[] = "Rellene todos los datos";
   }else{
      if(!$mysqli->query("INSERT INTO ".$mysql['prefijo']."crud (titulo, autor, contenido, fecha) VALUES ('".$titulo."', '".$autor."', '".$contenido."', NOW())")){
         $error[] = "Hubo un error al insertar la entrada";
      }
   }

   if(empty($error)){
      echo 'Agregada correctamente <a href="../index.php?p=post&id='.$mysqli->insert_id.'">Ver entrada</a>';
   }else{
      foreach($error as $err){
         echo $err."<br />";
      }
   }
}
?>
<form action="" method="post">
   <label for="titulo">Titulo: <input type="text" id="titulo" name="titulo"></label>
   <label for="autor">Autor: <input type="text" id="autor" name="autor"></label>
   <label for="contenido">Contenido: <textarea id="contenido" name="contenido" cols="80" rows="15"></textarea></label>
   <button name="submit">Registrar</button>
</form>
<?php
include('template/footer.inc.php');
?>