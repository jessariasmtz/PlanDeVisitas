<?php
function getResultVisits($date, $id) {
    include 'Connection.php';

    $result = $conn->prepare("SELECT Visitas.ID, Visitas.Fecha, Visitas.Objetivo, Visitas.Comentarios, Visitas.Estado, Empleados.Nombre as 'Empleado', Empresas.Nombre, Visitas.Cotizacion FROM Visitas INNER JOIN Empleados ON Visitas.ResponsableID = Empleados.ID INNER JOIN Empresas ON Visitas.EmpresaID = Empresas.ID WHERE Visitas.Fecha LIKE '$date%'and Empleados.ID = '$id';");

    $result->execute();

    while($row = $result->fetch(PDO::FETCH_OBJ)) {
        echo "
        <div class='visit-card'>
            <div class='visita-fecha'>
                <input type='datetime' name='fecha-visita[]' value='$row->Fecha' readonly>
            </div>

            <div class='visita-ID'>
                <input type='number' name='visitaID[]' value='$row->ID' readonly>
            </div>

            <div class='visita-nombre'>
                <p>$row->Nombre</p>
            </div>

            <div class='visita-responsable'>
                <p>Responsable: $row->Empleado</p>
            </div>

            <div class='visita-estado'>
                <p>Estado: $row->Estado</p>
            </div>

            <div class='visita-obj'>
                <p>Objetivo: </p>
                <input type='text' maxlength='32' name='objetivo[]'  value='$row->Objetivo' readonly>
            </div>

            <div class='visita-coment'>
                <p>Comentarios: </p>
                <input type='text' maxlength='255' name='comentarios[]'  value='$row->Comentarios'>
            </div>

            <div class='visita-cotiza'>
                <p>Cotización:
                <a href='../cotizaciones/$row->Cotizacion'>$row->Cotizacion</a>
                </p>
            </div>
        </div>";
    }
    $conn = null;
    $result = null;
}