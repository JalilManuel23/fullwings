<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ""){
        header("Location: errores/iniciar_sesion.html");
        die();
	}    
	
	include("../config.php");

	$id = $_REQUEST['id'];

	$query = "SELECT * FROM imagenes WHERE no_imagen = '$id'";
	$resultado = $conexion->query($query);
	$row = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Full Wings | Cambiar Imagenes</title>
    <!-- Favicon -->
    <link rel="icon" href="../../favicon.ico">

    <!-- Script y links externos -->
    <?php include("../../html/scripts_links.php"); ?>

    <!-- Scripts Locales -->
    <script src="../js/../menu.js"></script>
    <script src="../../js/validar_contrasenia.js"></script>

    <!-- Normalize -->
    <link rel="stylesheet" href="../../css/normalize.css">

    <!-- Iconos Fontastic -->
    <link rel="stylesheet" href="../../css/styles.css">

    <?php
        include("../../php/tema.php");
        echo "<link rel='stylesheet' href='../../css/temas/tema" . $tema . ".css'>";
    ?>

    <!-- Hoja de Estilos -->
    <link rel="stylesheet" href="../../css/estilos_sistema.css">
</head>

<body>
    <header class="header-sis">
        <div class="contenedor-header">
            <label for="boton-menu"><img src="../../img/menu.png" alt=""></label>

            <a href="../../">
                <img src="../../img/fullwings.png" alt="">
            </a>
            <h1>Administración Full Wings</h1>
            <div class="usuario dropdown-tooggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="opciones">
                <?php
                    $usuario = $_SESSION['usuario'];
                    echo "<p class='user'>$usuario</p>";    
                ?>
                <p class="icon-user"></p>
            </div>
            <div class="dropdown-menu" aria-labelledby="opciones">
                <button class="dropdown-item"   data-toggle="modal" data-target="#editar-cuenta">Editar Cuenta</button>
                <button class="dropdown-item"  data-toggle="modal" data-target="#cerrar-sesion">Cerrar Sesión</button>
            </div>
        </div>
    </header>

    <!-- Modal Cerrar Sesión-->
    <div class="modal fade" id="cerrar-sesion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <?php include("../../html/ventanas_modales/cerrar_sesion.php"); ?>
    </div>

    <!-- Modal de editar cuenta -->
    <form action="../editar_usuario.php" method="post">
        <?php include("../../html/ventanas_modales/editar_cuenta.php"); ?>
    </form>

    <div class="main">
		<input type="checkbox" id="boton-menu">
        <?php 
            $opcion_seleccionada = 1;
            $ruta = "../../html/";
            include("../../html/ventanas_modales/menu.php")
        ?>

		<div class="contenido">
			<h2>Cambiar Imágen</h2>
			<div class="editar">
				<form  action="../proceso_modificar.php?id=<?php echo $row['no_imagen']; ?>" class="formulario-sis form-editar" method="post" enctype="multipart/form-data">
					<img src="../../img/<?php echo $row['imagen'] ?>" alt="imagen a editar" class="img_a_editar">

					<div >
						<label for="foto">Selecciona una imágen nueva</label>
						<input type="file" id="foto" name="foto">
					</div>
					<div >
						<label for="titulo">Editar título</label>
						<input type="text" id="titulo" class="form-control" name="titulo" value="<?php echo $row['titulo'];?>">
					</div>
					<div >
						<label for="texto">Editar Descripción</label>
						<input type="text" name="texto" class="form-control" id="texto" value="<?php echo $row['descripcion'];?>"></input>
					</div>
					<input type="submit" class="btn btn-primary" value="Guardar">
				</form>
			</div>	
		</div>
		</section>
	</div>
</body>
</html>