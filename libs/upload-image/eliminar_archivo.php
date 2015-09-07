<?php
if (isset($_POST['archivo'])) {
   $archivo = $_POST['archivo'];
   if (file_exists("../../img/uploads/$archivo")) {
      unlink("../../img/uploads/$archivo");
      echo 1;
   } else {
      echo 0;
   }
}
?>