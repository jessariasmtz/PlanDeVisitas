<?php

/* Mostrar la Empresa registrada */

try {
    include '../Connection.php';

    $result = $conn->prepare("SELECT * FROM Empresas;");
    $result->execute();
    // $conn = null;

    var_dump(json_encode($result->fetchAll(PDO::FETCH_OBJ)));
    exit(json_encode($result->fetchAll(PDO::FETCH_OBJ)));
} catch(Exception $e) {
    echo "getAllCitas: $e->getMessage()";
}