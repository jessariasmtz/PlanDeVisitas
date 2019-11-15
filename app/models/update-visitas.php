<?php

try {
    include 'Connection.php';

    for($tupla = 0; $tupla < count($_POST['fecha-visita']); $tupla++) {
        // Prepare
        $update = $conn->prepare("UPDATE Visitas SET Comentarios = :comentario WHERE ID = :id;");

        // Bind
        if(!empty($_POST['comentarios']))
            $update->bindParam(':comentario', $_POST['comentarios'][$tupla]);
        else {
            $update->bindParam(':comentarios', 'null');
        }

        $update->bindParam(':id', $_POST['visitaID'][$tupla]);
        // Excecute
        $update->execute();
    }

    $conn = null;
    $update = null;

    header('Location: ../visitas-hoy.php');
} catch(Exception $e) {
    echo $e->getMessage();
}