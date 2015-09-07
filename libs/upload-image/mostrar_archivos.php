<?php
$directorio_escaneado = scandir('../../img/uploads/');
$archivos = array();
foreach ($directorio_escaneado as $item) {
   if ($item != '.' and $item != '..') {
      $archivos[] = $item;
   }
}
echo json_encode($archivos);
?>