<?php
	include("../config.php");

	if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){
		$check = @getimagesize($_FILES['foto']['tmp_name']);

		if($check !== false){
			$carpeta_destino = '../../img/';
			$archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
			move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

			$titulo = $_POST['titulo'];
			$imagen = $_FILES['foto']['name'];
			$texto = $_POST['texto'];

			$statement = $conexion->query("INSERT INTO imagenes (titulo, imagen, descripcion) VALUES ('$titulo', '$imagen', '$texto')");
		}
	}else{
		$error = "El archivo no es una imagen o es muy pesado";
	}

	include("subir.view.php");
?>