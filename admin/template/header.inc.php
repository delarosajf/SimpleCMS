<?php
  $menu = array(
    array(
      'titulo' => 'Inicio',
      'icono' =>  'fa-tachometer',
      'link' => 'index.php'
    ),
    array(
      'titulo' => 'Entradas',
      'icono' =>  'fa-list-alt',
      'link' => 'index.php?p=ver',
      'submenu' => array(
        'index.php?p=agregar' => 'Agregar',
        'index.php?p=ver' => 'Controlar',
      )
    ),
    array(
      'titulo' => 'Diseño',
      'icono' =>  'fa-paint-brush',
      'link' => '#'
    ),
    array(
      'titulo' => 'Addons',
      'icono' =>  'fa-puzzle-piece',
      'link' => 'index.php?p=addons'
    ),
    array(
      'titulo' => 'Ajustes',
      'icono' =>  'fa-cog',
      'link' => '#'
    )
  );
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
  <link rel="stylesheet" href="template/css/normalize.css">
  <link rel="stylesheet" href="template/css/skeleton.css">
  <link rel="stylesheet" href="template/css/font-awesome.min.css">
  <link rel="stylesheet" href="template/css/style.css">
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
</head>
<body>
  <div id="sidebar">
    <nav>
      <ul>
        <?php foreach($menu as $men): ?>
        <li><a<?php echo ($men['link']==@end(explode("/", $_SERVER[REQUEST_URI])) ? ' class="nav-active"' : '');?> href="<?php echo $men['link']; ?>"><i class="fa <?php echo $men['icono']; ?> fa-fw"></i><span> <?php echo $men['titulo']; ?></span></a>
          <?php if(isset($men['submenu'])): ?>
          <ul>
          <?php foreach($men['submenu'] as $url=>$title): ?>
            <li><a href="<?php echo $url ?>"><?php echo $title ?></a></li>
          <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
        <li><a href="#" class="colapsar"><i class="fa fa-fw fa-chevron-circle-left"></i> <span>Colapsar</span></a></li
      </ul>
    </nav>
  </div>
  <div class="container">
    <div class="row">
