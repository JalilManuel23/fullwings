<section class="menu-sis">
    <nav>
        <ul>
        <?php
            echo "<li class='icon-picture-streamline-1'"; if($opcion_seleccionada == 1){ echo "id='seleccionado-sis'";} echo "><a href='" . $ruta ."cambiar_imagen.php'>Gestionar Imágenes</a></li>";
            echo "<li class='icon-paint-brush'"; if($opcion_seleccionada == 2){ echo "id='seleccionado-sis'";} echo "><a href='" . $ruta ."apariencia.php'>Apariencia</a></li>";
            echo "<li class='icon-shopping-cart'"; if($opcion_seleccionada == 3){ echo "id='seleccionado-sis'";} echo "><a href='" . $ruta ."pedidos.php'>Gestionar Ventas</a></li>";
            echo "<li class='icon-users'"; if($opcion_seleccionada == 4){ echo "id='seleccionado-sis'";} echo "><a href='" . $ruta ."empleados.php'>Gestionar Empleados</a></li>";
            if($_SESSION['privilegio'] == 'admin'){
                echo "<li class='icon-users'"; if($opcion_seleccionada == 6){ echo "id='seleccionado-sis'";} echo "><a href='" . $ruta ."usuarios.php'>Gestionar Usuarios</a></li>";
                echo "<li class='icon-chart-bar'"; if($opcion_seleccionada == 5){ echo "id='seleccionado-sis'";} echo "><a href='" . $ruta ."estadisticas.php'>Estadísticas</a></li>";
            }
            echo "<li class='icon-envelope'"; if($opcion_seleccionada == 7){ echo "id='seleccionado-sis'";} echo "><a href='" . $ruta ."mensajes.php'>Mensajes</a></li>";
        ?>
        </ul>
    </nav>
</section>