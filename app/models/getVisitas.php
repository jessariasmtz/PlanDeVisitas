<?php
function getVisitsByID($date, $id) {
    include 'Connection.php';

    $result = $conn->prepare("SELECT Visitas.ID, Visitas.Fecha, Visitas.Objetivo, Visitas.Comentarios, Visitas.Estado, Empleados.Nombre as 'Empleado', Empresas.Nombre as 'Empresa', Visitas.Cotizacion, Contactos.Nombre as 'ContactoNombre', Contactos.Apellido as 'ContactoApellido', Contactos.Email, Sucursales.AreaUbicacion, Sucursales.Direccion FROM Visitas INNER JOIN Empleados ON Visitas.ResponsableID = Empleados.ID INNER JOIN Empresas ON Visitas.EmpresaID = Empresas.ID LEFT JOIN Contactos ON Empresas.ID = Contactos.EmpresaID LEFT JOIN Sucursales ON Empresas.ID = Sucursales.EmpresaID WHERE Visitas.Fecha LIKE '$date%'and Empleados.ID = '$id';");

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
                <p>$row->Empresa</p>
            </div>

            <div class='visita-contacto'>
                <p>$row->ContactoNombre $row->ContactoApellido - $row->Email</p>
            </div>

            <div class='visita-direccion'>
                <p>$row->AreaUbicacion - $row->Direccion</p>
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
                <input type='text' maxlength='650' name='comentarios[]'  value='$row->Comentarios'>
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

function getAllVisits($date, $id) {
    include 'Connection.php';

    $result = $conn->prepare("SELECT Visitas.ID, Visitas.Fecha, Visitas.Objetivo, Visitas.Comentarios, Visitas.Estado, Empleados.Nombre as 'Empleado', Empresas.Nombre, Visitas.Cotizacion FROM Visitas INNER JOIN Empleados ON Visitas.ResponsableID = Empleados.ID INNER JOIN Empresas ON Visitas.EmpresaID = Empresas.ID WHERE Visitas.Fecha LIKE '$date%';");

    $result->execute();
    $conn = null;

    return $result->fetch(PDO::FETCH_OBJ);
}
