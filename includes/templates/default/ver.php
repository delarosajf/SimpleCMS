<?php
include('header.inc.php');
$id = (int) $_GET['id'];
$exit = false;

if(!isset($id)){
   header('location:index.php');
}
$resultado = $mysqli->query("SELECT * FROM ".$mysql['prefijo']."crud WHERE id=".$id);
if($resultado->num_rows!=1){
   echo 'La entrada seleccionada no existe.';
}
$entrada = $resultado->fetch_assoc(); ?>
<div class="entrada">
   <h2><?php echo $entrada['titulo']; ?></h2>
   <small>Publicado el <?php echo date("d/m/Y \a \l\a\s h:ia", strtotime($entrada['fecha'])); ?> por <?php echo $entrada['autor']; ?></small>
   <p><?php echo nl2br($entrada['contenido']); ?></p>
   <p><a href="admin/index.php?p=editar&id=<?php echo $id; ?>">Editar</a> | <a href="admin/index.php?p=eliminar&id=<?php echo $id; ?>">Eliminar</a></p>
</div>
<?php
include('footer.inc.php');
?>