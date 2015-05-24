<?php
$error = array();
if(isset($_POST['submit'])){
   $titulo = htmlentities($_POST['titulo'], ENT_QUOTES);
   $autor = htmlentities($_SESSION['user'], ENT_QUOTES);
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
<h2>Agregar entrada</h2>
<form>
  <div class="row">
    <div class="six columns">
      <label for="post_title">Titlo</label>
      <input name="titulo" class="u-full-width" type="text" id="post_title">
    </div>
    <div class="six columns">
      <label for="post_cat">Categoría</label>
      <select name="categoria" class="u-full-width" id="post_cat">
        <option value="Option 1">Categoría 1</option>
        <option value="Option 2">Categoría 2</option>
        <option value="Option 3">Categoría 3</option>
      </select>
    </div>
  </div>
  <label for="post_contenido">Contenido</label>
  <textarea name="contenido" class="u-full-width" id="post_contenido"></textarea>
  <button name="submit" class="button-primary">Registrar</button>
</form>
