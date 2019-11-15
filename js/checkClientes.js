const frmAddClienteVisita = document.querySelector('#addClientesForm');
frmAddClienteVisita.addEventListener('submit', addClienteVisita);

function addClienteVisita(e) {
    e.preventDefault();

    const clientesId = document.querySelectorAll('input[type=checkbox]:checked');
    var clientesChecked = [];

    for (var i = 0; i < clientesId.length; i++) {
        clientesChecked.push(clientesId[i].value);
    }

    try {
        let response = await fetch('visitas.php', {
            methor: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(clientesChecked)
        });
        const json = await response.json();
        console.log('Success:', JSON.stringify(json));
    } catch (error) {
        console.error(error);
    }

    window.location.href = "visitas.php";
}