<?php
require_once('models/queryClientesID.php');
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
    <script src="https://kit.fontawesome.com/b09b9f2e11.js" crossorigin="anonymous"></script>
    <title>Clientes</title>
</head>

<body>
<?php include 'inc/header.php';?>

<main class="contenedor">
    <h2 id="page-titulo-left">Información de Clientes</h2>

        <div id='lista-visitas-contenedor'>
        
        <?php
        include 'models/Connection.php';

        $result = $conn->prepare("SELECT Empresas.Nombre as 'Empresa', Empresas.Tipo, Contactos.Nombre, Contactos.Apellido, Contactos.Email, Sucursales.AreaUbicacion, Sucursales.Direccion
        FROM  Empresas INNER JOIN Contactos ON Empresas.ID = Contactos.EmpresaID 
        INNER JOIN Sucursales ON Empresas.ID = Sucursales.EmpresaID;");
        
        $result->execute();

        while($row = $result->fetch(PDO::FETCH_OBJ)) {
            echo "
            <div class='clientes-full-card'>
                <div>
                    <p><span>Empresa:</span> $row->Empresa</p>
                    <p><span>Tipo:</span> $row->Tipo</p>
                    <p><span>Área:</span> $row->AreaUbicacion</p>
                    <p><span>Dirección:</span> $row->Direccion</p>
                </div>

                <div>
                    <p><span>Contacto:</span> $row->Nombre $row->Apellido</p>
                    <p><span>Email:</span> $row->Email</p>
                </div>
            </div>";
        }
        $conn = null;
        $result = null;
        ?>
        </div>

        <!-- <button type="submit" id="btnAddClientes">Agregar</button> -->
    </form>
</main>

</body>

</html>