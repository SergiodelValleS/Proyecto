<?php
session_start();?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
#cajaPrincipal {
    /*padding-top: 48px;*/
    /*background: radial-gradient(circle, #FF9BE3, rgb(193, 58, 251));*/
    overflow: hidden;
    justify-content:center;
}
.escoger:hover{
    background-color:pink;
    cursor:pointer;
}
a{
    text-decoration: none !important;
}
a:link {
  //color: #0000FF !important;
}

/* visited link */
a:visited {
  //color: green !important;
}

/* mouse over link */
a:hover {
   color: #007bff !important; //azul por defecto de los a sin hover, así, al hacer hover, no cambia de color
}
.contenedorHeader{
  border: 2px solid black;
  display: flex;
  background: linear-gradient(to bottom, rgb(255, 255, 255), #FF9BE3);
  text-align: center;
  justify-content: center;
  align-items: center;
}
#pie_web{
    border-top:2px solid #000;
    border-bottom:2px solid #000;
    background: linear-gradient(to bottom, rgb(255, 255, 255), #FF9BE3);
}
*{
    box-sizing: border-box;font-family: 'Inter', sans-serif;
}
.pHeader{
  font-size:36px;
  justify-content: center; /* Alinea horizontalmente */
  align-items: center;   /* Alinea verticalmente */
  text-align: center;
  margin:auto;
}
body{
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    justify-content: space-between;
    background-color: #f4f4f4;
}
header{
    background-color:red;text-align:center;background: radial-gradient(circle, #FF9BE3, rgb(193, 58, 251));justify-content:center;display:flex;align-items:center;
    border-bottom:2px solid black;border-top:2px solid black;
}
h1{text-align:center;justify-content:center;margin-bottom:0 !important;}

</style>
</head>

<body>
<header><h1>Bienvenido a PROYECTODAW</h1></header>
<div class='container' id='cajaPrincipal'>
    <div class='row' style='justify-content: space-between;'>
    <?php
    include "comprobarConn.php";
   // $directorio = '.';
   // $excluidas = ['proyecto-chat', 'creaCarpetas'];

            $result=$conn->query("SELECT nombre FROM usuario WHERE jerarquia='escritor'");
            if($result->num_rows<10){$col=5;}else{if($result->num_rows<20){$col=3;}else{$col=2;}} //Si hay menos de 10, col=5, si entre 10 y 19 col=3, si más, col=2
            while($row=$result->fetch_assoc()){
            echo "<div class='col-$col escoger my-4' style='border:1px solid black;text-align:center;display:flex; align-items:center; justify-content:center;'><a href='{$row['nombre']}/index'>Ir a la página de {$row['nombre']}</a></div>";
            }
            $conn->close();?>
    </div>
</div>
  <?php include_once('miFooter.php');?>