<?php
include_once '../layouts/header.php'
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Ingreso de Datos</h3>
                <form action="../action/ejercicio4.php" method="post" id="datosPersonales" name="datosPersonales">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="apellidoAyuda">
                        <div id="apellidoAyuda" class="form-text">Por favor ingrese unicamente un apellido.</div>
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="edad" name="edad">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="avenida 112" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Por favor ingrese su direccion, primero con texto y luego con numeros, ejemplo "avenida 112"</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar datos</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- IMPORTANTE
Incluimos la etiqueta script para vincular nuestro validador -->
<script src="../assets/js/validadorForm.js"></script>

<?php
include_once '../layouts/footer.php'
?>