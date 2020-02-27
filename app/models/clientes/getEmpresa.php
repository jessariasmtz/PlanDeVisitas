<?php

/* Mostrar Empresa */

try {
    include '../Connection.php';

    $result = $conn->prepare("SELECT * FROM Empresas;");
    $result->execute();
    $conn = null;

    exit(json_encode($result->fetchAll(PDO::FETCH_ASSOC)));
} catch(Exception $e) {
    echo "Error: $e->getMessage()";
}