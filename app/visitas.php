<?php
require_once('models/getVisitas.php');
include 'models/Empleado.php';
session_start();
$user = unserialize($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/ver-visitas.css">
    <script src="https://kit.fontawesome.com/b09b9f2e11.js" crossorigin="anonymous"></script>
    <title>Visitas</title>
</head>

<body>
<?php include 'inc/header.php';?>

<main class="contenedor">
    <h2 id="page-titulo-left">Lista de Visitas</h2>

    <form action="models/update-visitas.php" id="submitVisitas" enctype="multipart/form-data" method="POST">
        <div id='lista-visitas-contenedor'>
        
        <?php
        getResultVisits('', $user->getID());
        ?>
        </div>

        <button type="submit" id="btnAddClientes">Actualizar</button>
    </form>
</main>

</body>

</html>