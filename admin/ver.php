<h2>Addons</h2>
<?php
$resultado = $mysqli->query("SELECT * FROM ".$mysql['prefijo']."crud");
if($resultado->num_rows==0): ?>
No hay entradas disponibles. <a href="index.php?p=agregar">Agregar una entrada</a>
<?php
else:
?>
<table class="u-full-width">
  <thead>
    <tr>
			<th></th>
      <th>Titulo</th>
      <th>Autor</th>
      <th>Categoría</th>
      <th>Fecha</th>
    </tr>
  </thead>
  <tbody>
<?php
  while($entrada = $resultado->fetch_assoc()):
?>
<tr>
    <td><input type="checkbox" name="name" value=""></td>
    <td>
      <div><?php echo $entrada['titulo']; ?></div>
      <div><a href="index.php?p=editar&id=<?php echo $entrada['id']; ?>">Editar</a> | <a href="index.php?p=eliminar&id=<?php echo $entrada['id']; ?>">Eliminar</a></div>
    </td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<?php
  endwhile;
endif;
?>
</tbody>
</table>
