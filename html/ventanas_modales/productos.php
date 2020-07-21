<div class="modal fade" id="ver-producto-<?php echo $i ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><?php echo $fotos['titulo'] ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
				<?php
					$puntos = ($i <= 9) ? "../" : "";
					echo "<img class='d-block w-100' src='" . $puntos . "img/" . $fotos['imagen'] . "'>"; 
				?>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-success" data-dismiss="modal">Aceptar</a>
            </div>
        </div>
    </div>
</div>
