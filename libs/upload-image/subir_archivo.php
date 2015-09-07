<?php
	if (isset($_FILES['archivo'])) {
		$nombre=$_FILES['archivo']['name'];
		if (!file_exists("../../img/uploads/$nombre")) {
			$extencion=$_FILES['archivo']['type'];
			$tamano=$_FILES['archivo']['size'];
			if ($tamano<1048576 and ($extencion="image/pjpg" or $extencion="image/png" or $extencion="image/gif")) {
				$tmp=$_FILES['archivo']['tmp_name'];
			   	$resp =move_uploaded_file($tmp, "../../img/uploads/$nombre");
			   	echo $resp;//devuelve true o false
			}else{
				echo 2;//devuelve 3, para enviar mensaje de error en extencion y tamaño   1mb
			}
		}else{
			echo 3;//devuelve 3, para enviar mensaje de archivo existente
		}
	}else{
		echo 4;//devuelve 4, no se ha seleccionado archivo 
	}
	
?>