<?php

try {
    $folder = "cotizaciones";
    
    include 'Connection.php';

    for($tupla = 0; $tupla < count($_POST['fecha-visita']); $tupla++) {
        if (is_uploaded_file($_FILES['cotizacion']['tmp_name'][$tupla])) {  
            if (move_uploaded_file($_FILES['cotizacion']['tmp_name'][$tupla], "../../" .$folder."/".$_FILES['cotizacion']['name'][$tupla])) {
                $cotizacionName = $_FILES['cotizacion']['name'][$tupla];
            } else {
                echo "File not moved to destination folder. Check permissions";
            }
        } else {
            echo "File is not uploaded.";
        }

        // Prepare
        $insert = $conn->prepare("INSERT INTO Visitas (Fecha, EmpresaID, Objetivo, Comentarios, Cotizacion, Estado, ResponsableID) VALUES (:fecha, :empresaID, :objetivo, :comentarios, :cotizacion, :estado, :responsableID);");

        // Bind
        $datetime = $_POST['fecha-visita'][$tupla] . ' ' . $_POST['hora-visita'][$tupla] . ':00';
        $insert->bindParam(':fecha', $datetime);

        $insert->bindParam(':empresaID', $_POST['clienteID'][$tupla]);
        $insert->bindParam(':objetivo', $_POST['objetivo'][$tupla]);

        if(!empty($_POST['comentarios']))
            $insert->bindParam(':comentarios', $_POST['comentarios'][$tupla]);
        else {
            $insert->bindParam(':comentarios', 'null');
        }

        $insert->bindParam(':cotizacion', $_FILES['cotizacion']['name'][$tupla]);
        
        $insert->bindParam(':estado', $_POST['estado'][$tupla]);
        $insert->bindParam(':responsableID', $_POST['responsableID'][$tupla]);

        // Excecute
        $insert->execute();
    }

    $conn = null;
    $insert = null;

    header('Location: ../visitas-hoy.php');
} catch(Exception $e) {
    echo $e->getMessage();
}