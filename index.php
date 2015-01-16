<?php
include('includes/config.inc.php');
switch($_GET['p']){
	case 'post':
		include($ruta."ver.php");
	break;
	default:
		include($ruta."index.php");
	break;
}
?>