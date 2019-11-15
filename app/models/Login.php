<?php
require_once('Empleado.php');

session_start();

try{
    $email = $_POST['mail'];
    $pass = $_POST['pass'];

    include 'Connection.php';

    $result = $conn->prepare("SELECT ID, Nombre, Email FROM Empleados WHERE Email = '$email' and Pass = '$pass';");
    $result->execute();

    if($row = $result->fetch(PDO::FETCH_OBJ)) {
        $user = new Empleado(
            $row->ID,
            $row->Nombre,
            $row->Email
        );
        
        $conn = null;
        $result = null;

        $_SESSION["user"] = serialize($user);
        header('Location: ../escoger-clientes.php');
    } else {
        header('Location: ../../index.php');
    }
} catch(Exception $e) {
    echo "Error!!" . $e->getMessage() . "<br>";
}
