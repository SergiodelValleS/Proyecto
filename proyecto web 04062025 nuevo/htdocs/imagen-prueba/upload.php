<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])) {
    $_FILES['archivo']['name']; //Incluye la extensión de la imagen
    $target_dir = "imagenes/";
    $contenido_array=[];
    $archivoTmp=$_FILES["archivo"]["tmp_name"];
    if (!file_exists($target_dir)) {
    // Crear la carpeta con permisos de escritura
        if (mkdir($target_dir, 0777, true)) {
           // echo "Carpeta '$target_dir' creada exitosamente con permisos 777.";}
    }
    }
    $_FILES["archivo"]["name"]=str_replace(" ", "-", $_FILES["archivo"]["name"]); //Quito espacios en blanco, sustituyo por -
    $target_file = $target_dir . basename($_FILES["archivo"]["name"]);

    if($_FILES["archivo"]["size"] < 1048576) //Que no ocupe más de 1 MB
    {
        if (!getimagesize($archivoTmp)) { //Comprobar si es una imagen, aunque el input solo permite imagen pero bueno
            $contenido_array['error']="El archivo no es una imagen";
            } else {
            if (move_uploaded_file($archivoTmp, $target_file)) {
                $contenido_array['src']=$target_dir.$_FILES["archivo"]["name"];
                //echo "Archivo subido exitosamente: " . htmlspecialchars(basename($_FILES["archivo"]["name"]));
            } else {
                //echo "Error al subir el archivo.";
                $contenido_array['error']="Error al subir el archivo";
            }
        }
    }
    else {$contenido_array['error']="La imagen pesa demasido, debe pesar menos de un megaByte";}
} else {
    $contenido_array['error']="No se recibió ningún archivo.";
}
echo json_encode($contenido_array);
/*
<?php if(isset($_SESSION['nombre'])) {echo "BIENVENIDO ".$_SESSION['nombre'];}
        else {echo "NO HAS INICIADO SESIÓN";}?>     
*/
?>