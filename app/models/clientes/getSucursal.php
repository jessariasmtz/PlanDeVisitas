<?php

/* Mostrar los contactos de la Empresa seleccionada */

try {
    include '../Connection.php';

    $empresaId = $_GET['empresaid'];

    $result = $conn->prepare("SELECT * FROM Sucursales where EmpresaID = $empresaId;");
    $result->execute();
    $conn = null;

    exit(json_encode($result->fetchAll(PDO::FETCH_ASSOC)));
} catch(Exception $e) {
    echo "getAllCitas: $e->getMessage()";
}