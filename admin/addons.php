<h2>Addons</h2>
<table class="u-full-width">
  <thead>
    <tr>
			<th></th>
      <th>Addon</th>
      <th>Descripción</th>
    </tr>
  </thead>
  <tbody>
<?php
$dir = '../includes/addons/';
	foreach(scandir($dir) as $directory):
		if($directory=='.' or $directory=='..' ):
			//. y ..
		else:
      $file_data = get_file_data($dir.$directory."/about.txt", array('Name' => 'Name','Author' => 'Author','Description' => 'Description','Version' => 'Version'));
    ?>
    <tr>
			<td><input type="checkbox" name="name" value=""></td>
      <td>
				<div><strong><?php echo $file_data['Name']; ?></strong></div>
				<div><a href="#">Activar</a></div>
			</td>
      <td>
				<div><?php echo $file_data['Description']; ?></div>
				<div>Versión <?php echo $file_data['Version']; ?></div>
			</td>
    </tr>
	<?php
		endif;
	endforeach;
	?>
</tbody>
</table>
