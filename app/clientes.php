<?php
// require_once('models/queryClientesID.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/ver-visitas.css">
    <link rel="stylesheet" href="../styles/clienteAddForm.css">
    <link rel="icon" href="../img/tab-icon.png">
    <script src="https://kit.fontawesome.com/b09b9f2e11.js" crossorigin="anonymous"></script>
    <title>Clientes</title>
</head>

<body onload="getEmpresa()">
<?php include 'inc/header.php';?>

<main class="contenedor">
    <h2 id="page-titulo-left">Información de Clientes</h2>

        <div id='lista-visitas-contenedor'>
        
        </div>
</main>

<script src="../js/clientes.js"></script>
</body>

</html>