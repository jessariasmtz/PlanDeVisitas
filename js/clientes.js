// Trae ID, Nombre, RUC y Tipo de Empresa
function getEmpresa() {
    const url = "../app/models/clientes/getEmpresa.php";

    fetch(url).then((res) => res.json())
        .then(response => {
            showEmpresaCard(response);
        }).catch(error => console.log(error));
}

// Crea los cards con la info de cada Empresa
function showEmpresaCard(empresa) {
    let listContainer = document.getElementById("lista-visitas-contenedor");

    for (let i in empresa) {
        // Contenedor del Card
        let cardContainer = document.createElement("div");
        cardContainer.className = "clientes-full-card";

        // Contenido del Card
        let cardContent = document.createElement("div");
        cardContent.className = 'clientes-card-content';

        // Info de la Empresa
        cardContent.innerHTML = `
            <div>
            <h3>${empresa[i].ID} - ${empresa[i].Nombre}</h3>
            <p>RUC: <input type='text'value='${empresa[i].RUC}' readonly><button onclick='edit()' type='button' id='edit'><i class="far fa-edit"></i></button></p>
            <p>Tipo: <input type='text'value='${empresa[i].Tipo}' readonly><button onclick='edit()' type='button' id='edit'><i class="far fa-edit"></i></button></p>
            </div>
        `;

        // Añade la info de Contacto
        const contactoContainer = document.createElement("div");
        let contacto = await verContacto(empresa[i].ID);
        if (contacto && contacto.length) {
            for (let x in contacto) {
                contactoContainer.innerHTML = `
                    <div>
                    <br><h4>Contacto</h4>
                    <p>Nombre: <input type='text'value='${contacto[x].Nombre} ${contacto[x].Apellido}' readonly><button onclick='edit()' type='button' id='edit'><i class="far fa-edit"></i></button></p>
                    <p>Correo: <input type='text'value='${contacto[x].Email}' readonly><button onclick='edit()' type='button' id='edit'><i class="far fa-edit"></i></button></p>
                    <p>Teléfono: <input type='text'value='${contacto[x].Telefono}' readonly><button onclick='edit()' type='button' id='edit'><i class="far fa-edit"></i></button></p>
                    </div>
                `;
            }
        } else
            contactoContainer.innerHTML = `
                <div>
                <br>No hay contactos asignados. <button type='button' onclick='addContactoBtn(${empresa[i].ID})'><i class='fas fa-plus-square'></i></button>
                </div>
            `;

        // Añade la info de las Sucursales
        const sucursalContainer = document.createElement("div");
        let sucursal = await verSucursal(empresa[i].ID);
        if (sucursal && sucursal.length) {
            for (let x in sucursal) {
                sucursalContainer.innerHTML = `
                    <div>
                    <br><h4>Sucursales</h4>
                    <p>Área: <input type='text'value='${sucursal[x].AreaUbicacion}' readonly><button onclick='edit()' type='button' id='edit'><i class="far fa-edit"></i></button></p>
                    <p>Dirección: <input type='text'value='${sucursal[x].Direccion}' readonly><button onclick='edit()' type='button' id='edit'><i class="far fa-edit"></i></button></p>
                    </div>
                `;
            }
        } else
            sucursalContainer.innerHTML = `
                <div>
                <br>No hay sucursales asignadas. <button type='button' onclick='addSucursalBtn(${empresa[i].ID})'><i class='fas fa-plus-square'></i></button>
                </div>
            `;

        cardContent.appendChild(contactoContainer);

        cardContent.appendChild(sucursalContainer);

        cardContainer.appendChild(cardContent);

        listContainer.appendChild(cardContainer);
    }
}

// Retorna la información de Contacto
async function verContacto(id) {
    const url = "../app/models/clientes/getContacto.php?empresaid=" + id;

    let response = await fetch(url);
    let contacto = await response.json();
    return contacto;
}

// Retorna la información de Sucursales
async function verSucursal(id) {
    const url = "../app/models/clientes/getSucursal.php?empresaid=" + id;

    let response = await fetch(url);
    let sucursal = await response.json();
    return sucursal;
}

// Añadir Contacto
function addContactoBtn(empresaid) {
    console.log(empresaid);

    const container = document.getElementById('lista-visitas-contenedor');
    container.innerHTML = `
        <div class="form-popup" id="myForm">
        <form action="../app/models/clientes/addContacto.php" method="post" class="form-container">
            <h1>Añadir Contacto</h1>

            <label for="nombre"><b>Nombre</b></label>
            <input type="text" placeholder="Ingrese el nombre" name="nombre" required>

            <label for="apellido"><b>Apellido</b></label>
            <input type="text" placeholder="Ingrese el apellido" name="apellido" required>

            <label for="email"><b>Correo</b></label>
            <input type="email" placeholder="Ingrese el correo" name="email" required>
            <input type="text" value="${empresaid}" name="empresaid" display="none">

            <button type="submit" class="btn">Añadir</button>
            <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
        </div>
    `;

    document.getElementById("myForm").style.display = "block";
}

// Añadir Sucursal
function addSucursalBtn(empresaid) {
    console.log(empresaid);
    const container = document.getElementById('lista-visitas-contenedor');
    container.innerHTML = `
        <div class="form-popup" id="myForm">
        <form action="../app/models/clientes/addSucursal.php" method="post" class="form-container">
            <h1>Añadir Sucursal</h1>

            <label for="area"><b>Área de Ubicación</b></label>
            <input type="text" placeholder="Ingrese el área de la ubicación" name="area" required>

            <label for="direccion"><b>Dirección</b></label>
            <input type="text" placeholder="Ingrese la dirección" name="direccion" required>
            <input type="text" value="${empresaid}" name="empresaid" display="none">

            <button type="submit" class="btn">Añadir</button>
            <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
        </div>
    `;

    document.getElementById("myForm").style.display = "block";
}

// Editar
function edit() {
    alert("La edición del contenido aún no está habilitada.");
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}