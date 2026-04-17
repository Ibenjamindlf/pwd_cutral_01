<?php
include_once '../layouts/header.php';

// 1. CAPTURAMOS EL VALOR DE LA URL
// Verificamos si llegó 'Message' por GET. Si llegó, lo guardamos en $edad. Si no, asumimos 0.
$edad = isset($_GET['Message']) ? $_GET['Message'] : 0;
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">

            <?php 
            // 2. EVALUAMOS Y MOSTRAMOS EL DIV CORRESPONDIENTE
            if ($edad >= 18) { 
            ?>
                <div class="alert alert-success p-4" role="alert">
                    <h4 class="alert-heading">Es mayor de edad</h4>
                    <p class="mb-0">La edad recibida por la URL es: <strong><?php echo htmlspecialchars($edad); ?></strong></p>
                </div>
            <?php 
            } else { 
            ?>
                <div class="alert alert-danger p-4" role="alert">
                    <h4 class="alert-heading">Es menor de edad</h4>
                    <p class="mb-0">La edad recibida por la URL es: <strong><?php echo htmlspecialchars($edad); ?></strong></p>
                </div>
            <?php 
            } 
            ?>

            <div class="mt-4">
                <a href="ejercicio1.php" class="btn btn-primary">Volver al formulario</a>
            </div>

        </div>
    </div>
</div>

<?php
// Incluimos tu footer
include_once '../layouts/footer.php';
?>