<?php
try {
    include '../Connection.php';

    // Prepare
    $insert = $conn->prepare("INSERT INTO Contactos (Nombre, Apellido, Email, EmpresaID) VALUES (:nombre, :apellido, :email, :empresaid);");
    // Bind
    $insert->bindParam(':nombre', $_POST['nombre']);
    $insert->bindParam(':apellido', $_POST['apellido']);
    $insert->bindParam(':email', $_POST['email']);
    $insert->bindParam(':empresaid', $_POST['empresaid']);

    // Excecute
    $insert->execute();

    $conn = null;
    $insert = null;

    header('Location: ../../clientes.php');
} catch(Exception $e) {
    echo $e->getMessage();
}