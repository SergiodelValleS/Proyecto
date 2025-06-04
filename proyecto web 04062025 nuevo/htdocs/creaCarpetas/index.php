<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folderName = "Nueva carpeta";
    $fileName = "index.php";
    $fileContent = '<?php echo "se ha creado una nueva carpeta";?>';

    // Verificar si la carpeta ya existe, si no, crearla
    if (!file_exists($folderName)) {
        mkdir($folderName, 0777, true);
    }

    // Crear el archivo dentro de la carpeta
    if(!file_exists($folderName."/".$fileName)){
    file_put_contents($folderName . "/" . $fileName, $fileContent);echo "Carpeta y archivo creados con éxito.";}
    else {echo "Error. Ya existe.";}
    
    
}
?>

<form method="post">
    <button type="submit">Crear Carpeta</button>
</form>
<?php echo $directorio=__DIR__;$contenido = scandir(__DIR__);
//Ver todas las carpetas de los escritores
echo "<pre>";print_r($contenido);echo "</pre>";
echo "<select>";
foreach ($contenido as $elemento) {
    if ($elemento != '.' && $elemento != '..' && is_dir($directorio . DIRECTORY_SEPARATOR . $elemento)) {
        echo "<option value='{$elemento}'>$elemento</option>";
    }
}
echo "<select>";
?>


