<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])) {
    // $_FILES['archivo']['name']; Incluye la extensión de la imagen
    $target_dir = "imagenesUsuario/";
    $contenido_array=[];
    $archivoTmp=$_FILES["archivo"]["tmp_name"];
    $id_contenido=intval($_POST['id']);
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
        if (!@getimagesize($archivoTmp)) { //Comprobar si es una imagen, aunque el input solo permite imagen pero bueno por si acaso comprobémoslo. El @ es por si salta un error, que continúe el código
            $contenido_array['error']="El archivo no es una imagen";
            } 
        else {
         if(strlen(basename($_FILES["archivo"]["name"]))>35){
             $contenido_array['error']="El nombre del archivo debe tener menos de 36 caracteres y este archivo tiene ".strlen(basename($_FILES["archivo"]["name"])). "caracteres";}
         else{
                    if (move_uploaded_file($archivoTmp, $target_file)) { //Esto sobrescribirá el archivo en caso de que existiese
                        $contenido_array['src']=$target_file;
                        //echo "Archivo subido exitosamente: " . htmlspecialchars(basename($_FILES["archivo"]["name"]));
                        include "comprobarConn.php";
                        $stmt = $conn->prepare("UPDATE contenido SET texto = ? WHERE id_contenido = ?");
                        $stmt->bind_param("si", $target_file, $id_contenido); // "s" para texto, "i" para entero
                        $stmt->execute();
                        $stmt->close();
                        $conn->close();
                    } else {
                        //echo "Error al subir el archivo.";
                        $contenido_array['error']="Error al subir el archivo";
                    }
             }
        }
    } 
    else {$contenido_array['error']="La imagen pesa demasido, debe pesar menos de un megaByte";}
} else {
    $contenido_array['error']="No se recibió ningún archivo.";
}
echo json_encode($contenido_array);
?>