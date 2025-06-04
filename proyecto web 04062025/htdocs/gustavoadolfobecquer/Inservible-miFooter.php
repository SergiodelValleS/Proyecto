<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<footer id="pie_web">
    <div class="lineas_footer">
    </div>
    <div class="ancho_web">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-xl-7 text-center text-md-center text-lg-center text-xl-left">
            
        <?php if(isset($_SESSION['nombre'])) {echo "<p class='pHeader'>BIENVENIDO ".$_SESSION['nombre']."</p>";}
        else {echo "<p><a href='https://proyectodaw.free.nf/login.php/'>Pulsa aquí para iniciar sesión</a></p>";}   ?>     
        </div>
    </div>
    <div class="lineas_footer">
    </div>
</footer>