<?php
include 'models/Empleado.php';

session_start();

$user = unserialize($_SESSION["user"]);

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
    <title>Lista de Clientes</title>
</head>

<body>
<?php include 'inc/header.php';?>

<main class="contenedor">
    <h2 id="page-titulo-left">Planear Visita</h2>
    <p>Escoja los clientes a visitar: <?php echo $user->getNombre();?></p>
    
    <form action="add-visitas.php" id="addClientesForm" method="POST">
        <?php
        include 'models/Connection.php';

        $result = $conn->prepare("SELECT * FROM Empresas;");
        $result->execute();

        while($row = $result->fetch(PDO::FETCH_OBJ)) {
            echo "
            <div class='clientes-card'>
                <div class='clientes-check'>
                    <input type='checkbox' name='checkClienteID[]' value='$row->ID'>
                </div>
                <div class='clientes-ID'>
                    <p>$row->ID</p>
                </div>
                <div class='clientes-nombre'>
                    <p>$row->Nombre</p>
                </div>                
                <div class='clientes-ruc'>
                    <p>$row->RUC</p>
                </div>
                    <div class='clientes-tipo'>
                    <p>$row->Tipo</p>
                </div>
            </div>";
        }
        $conn = null;
        $result = null;
        ?>

        <button type="submit" id="btnAddClientes">Agregar a Visita</button>
    </form>
</main>

</body>

</html>