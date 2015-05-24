<?php
include('../includes/phphooks.class.php');
$plugin_list = new phphooks();
$plugin_headers = $plugin_list->get_plugins_header();
?>
<h2>Addons</h2>
<table class="u-full-width">
	<thead>
		<tr>
			<th>Addon</th>
			<th>Descripción</th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th>Addon</th>
			<th>Descripción</th>
		</tr>
	</tfoot>

	<tbody>
<?php foreach ($plugin_headers as $plugin_header): ?>
		<tr>
			<td>
				<div><?php echo $plugin_header['Name']; ?></div>
				<div><?php echo '<a href="index.php?p=addons&action=desactivar&filename=' . $plugin_header ['filename'] . '" title="desactivar el addon">Desactivar</a>'; ?></div>
			</td>
			<td>
				<div><?php echo $plugin_header ['Description']; ?></div>
				<div>Versión <?php echo $plugin_header['Version']; ?> | por <a href="<?php echo $plugin_header ['AuthorURI']; ?>"	title="Web del autor"><?php echo $plugin_header ['Author'];	?></a></div>
			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>
