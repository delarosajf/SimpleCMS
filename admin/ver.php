<table>
<?php
$resultado = $mysqli->query("SELECT * FROM ".$mysql['prefijo']."crud");
if($resultado->num_rows==0): ?>
No hay entradas disponibles. <a href="index.php?p=agregar">Agregar una entrada</a>
<?php
else:
while($entrada = $resultado->fetch_assoc()):
?>
<tr>
   <td><?php echo $entrada['titulo']; ?></td>
   <td><a href="index.php?p=editar&id=<?php echo $entrada['id']; ?>">Editar</a></td>
   <td><a href="index.php?p=eliminar&id=<?php echo $entrada['id']; ?>">Eliminar</a></td>
</tr>
<?php
endwhile;
endif;
?>
</table>