<?php
function cortar($contenido, $ancho){
   if (strlen($contenido) > $ancho){
      $contenido = wordwrap($contenido, $ancho);
      $contenido = substr($contenido, 0, strpos($contenido, "\n"));
   }
   return $contenido;
}
?>