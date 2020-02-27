<?php

/* Mostrar la Empresa registrada */

try {
    include '../Connection.php';

    $result = $conn->prepare("SELECT * FROM Empresas;");
    $result->execute();
    $conn = null;

    header('Content-Type: application/json');
    echo json_encode($result->fetchAll(PDO::FETCH_OBJ));
} catch(Exception $e) {
    echo "getAllCitas: $e->getMessage()";
}