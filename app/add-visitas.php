<?php
require_once('models/queryClientesID.php');
include 'models/Empleado.php';
session_start();
$user = unserialize($_SESSION['user']);
$userID = $user->getID();
$userNombre = $user->getNombre();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="../img/tab-icon.png">
    <script src="https://kit.fontawesome.com/b09b9f2e11.js" crossorigin="anonymous"></script>
    <title>Visitas</title>
</head>

<body>
<?php include 'inc/header.php';?>

<main class="contenedor">
    <h2 id="page-titulo-left">Lista de Visitas</h2>

    <form action="models/submit-visitas.php" id="submitVisitas" enctype="multipart/form-data" method="POST">
        <div id='lista-visitas-contenedor'>
        
        <?php
        try {
            include 'models/Connection.php';
            $where = queryClientesID($_POST['checkClienteID']);

            $result = $conn->prepare("SELECT ID, Nombre FROM Empresas WHERE $where;");
            $result->execute();

            while($row = $result->fetch(PDO::FETCH_OBJ)) {
                echo "
                <div class='visit-card'>
                    <div class='visita-fecha'>
                        <input type='date' name='fecha-visita[]' required>
                    </div>

                    <div class='visita-hour'>
                        <input type='time' name='hora-visita[]' required>
                    </div>

                    <div class='visita-ID'>
                        <input type='number' name='clienteID[]' value='$row->ID' readonly>
                    </div>

                    <div class='visita-nombre'>
                        <p>$row->Nombre</p>
                    </div>

                    <div class='visita-responsable'>
                        <p>Responsable: </p>
                        <select name='responsableID[]' required>
                            <option value='$userID'>$userNombre</option>
                        </select>
                    </div>

                    <div class='visita-estado'>
                        <p>Estado: </p>
                        <select name='estado[]' required>
                            <option value='activo'>Activo</option>
                            <option value='inactivo'>inactivo</option>
                        </select>
                    </div>

                    <div class='visita-obj'>
                        <p>Objetivo: </p>
                        <input type='text' maxlength='32' name='objetivo[]' required>
                    </div>

                    <div class='visita-coment'>
                        <p>Comentarios: </p>
                        <input type='text' maxlength='650' name='comentarios[]'>
                    </div>

                    <div class='visita-cotiza'>
                        <p>Cotización:</p>
                        <input type='file' name='cotizacion[]' accept='.xls, .xlsx, .pdf'>
                    </div>
                </div>";
            }
            $conn = null;
            $result = null;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        ?>
        </div>

        <button type="submit" id="btnAddClientes">Agregar</button>
    </form>
</main>

</body>

</html>