<?php
try {
    include '../Connection.php';

    // Prepare
    $insert = $conn->prepare("INSERT INTO Sucursales (AreaUbicacion, Direccion, EmpresaID) VALUES (:area, :direccion, :empresaid);");
    // Bind
    $insert->bindParam(':area', $_POST['area']);
    $insert->bindParam(':direccion', $_POST['direccion']);
    $insert->bindParam(':empresaid', $_POST['empresaid']);

    // Excecute
    $insert->execute();

    $conn = null;
    $insert = null;

    header('Location: ../../clientes.php');
} catch(Exception $e) {
    echo $e->getMessage();
}