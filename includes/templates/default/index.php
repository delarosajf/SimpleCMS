<?php
include('header.inc.php');
$resultado = $mysqli->query("SELECT * FROM ".$mysql['prefijo']."crud");
if($resultado->num_rows>0):
   while($entrada = $resultado->fetch_assoc()): ?>
   <div class="entrada">
      <h2><a href="index.php?p=post&id=<?php echo $entrada['id']; ?>"><?php echo $entrada['titulo']; ?></a></h2>
      <small>Publicado el <?php echo date("d/m/Y \a \l\a\s h:ia", strtotime($entrada['fecha'])); ?> por <?php echo $entrada['autor']; ?></small>
      <p><?php echo htmlentities(cortar($entrada['contenido'], 300)); ?></p>
   </div>
   <?php
   endwhile;
else:
?>
No hay entradas disponibles.
<?php endif; ?>
<a href="admin/agregar.php">Agregar entrada</a>
<?php include('footer.inc.php'); ?>