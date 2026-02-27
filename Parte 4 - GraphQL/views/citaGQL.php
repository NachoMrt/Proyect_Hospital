<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> CRUD MongoDB + PHP </title>
    <style>
        body {
            background-color: #fee8e8;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* header {
            background-color: #ffafaf;
            margin: 0 auto;
            padding: 5px 20px;
        } */

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f8b4ba;
            padding: 10px 20px;
            position: sticky;
            top: 0;
        }


        .main-container {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            padding: 20px;
        }

        .sidebar-forms {
            flex: 0 0 300px;
            position: sticky;
            top: 140px;
        }

        .list-container {
            flex: 1;
        }

        .btn-pacientes {
            background-color: #6085ff;
            color: #333;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: 1px solid #ccc;
        }

        main {
            background-color: #ffd2d2;
            margin: 0 auto;
            padding: 20px;
        }

        .card_cita {
            background-color: #fff6f6;
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        form {
            background-color: #fff6f6;
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .card_cita p {
            font-size: 20px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            font-size: 20px;
        }

        .btn-edit {
            background-color: #2890ff;
        }

        .btn-delete {
            background-color: #ff4b5d;
        }

        .btn-new {
            background-color: #3d53fa;
        }
    </style>
</head>

<body>
    <header>
        <h1>API-REST-GrahpQL Citas</h1>
        <a href="pacienteGQL.php" class="btn-pacientes">Ir a Pacientes</a>
          <a href="index.php">Volver al index</a>
    </header>
    <main>
        <div class="main-container">
            <div class="sidebar-forms">

                <h2>Crear cita</h2>
                <form id="formularioPost">

                    <label for="id_paciente">ID Paciente: </label>
                    <input type="number" name="id_paciente" placeholder="ID paciente"><br>

                    <label for="id_medico">ID Médico: </label>
                    <input type="number" name="id_medico" placeholder="ID medico"><br>

                    <label for="medico">Motivo: </label>
                    <input type="text" name="motivo" placeholder="Motivo"><br>

                    <button type="submit"> Crear </button><br>
                </form>
                <script>
                    document.getElementById("formularioPost").addEventListener("submit", function (e) {
                        e.preventDefault();
                        const URL = "http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php";
                        const id_paciente = parseInt(this.id_paciente.value);
                        const id_medico = parseInt(this.id_medico.value);
                        const motivo = this.motivo.value;

                        async function crearCitas() {
                            const query = `
        mutation { agregarCita(id_paciente: ${id_paciente}, id_medico: ${id_medico}, motivo: \"${motivo}\") {id_cita id_paciente id_medico motivo}}`;

                            const res = await fetch(URL, {
                                method: "POST",
                                headers: { "Content-Type": "application/json" },
                                body: JSON.stringify({ query })
                            });
                            const data = await res.json();
                            console.log(data);
                            if (data) {
                                alert(`Éxito: Cita #${data.data.agregarCita.id_cita} creada correctamente`);
                                ///Desactivar si se quiere ver el regreso de data
                                location.reload()
                            } else {
                                alert("Error: Cita no creada");
                            }

                        }

                        crearCitas();
                    });

                </script>


                <h2>Editar cita</h2>
                <form id="formUpdate">
                    <label for="id_citaEdit">ID cita: </label>
                    <input type="number" name="id_citaEdit" placeholder="ID cita" required><br>

                    <label for="id_pacienteEdit">ID Paciente: </label>
                    <input type="number" name="id_pacienteEdit" placeholder="ID paciente" required><br>

                    <label for="id_medicoEdit">ID Médico: </label>
                    <input type="number" name="id_medicoEdit" placeholder="ID medico" required><br>

                    <label for="motivoEdit">Motivo: </label>
                    <input type="text" name="motivoEdit" placeholder="Motivo" required><br>

                    <button type="submit"> Actualizar </button><br>
                </form>
                <script>
                    const inputIdCita = document.getElementsByName("id_citaEdit")[0];

                    inputIdCita.addEventListener("blur", function () {
                        const id_cita = this.value;
                        const query = `query {citaID(id_cita: ${id_cita}) {id_paciente id_medico motivo}}`;
                        if (id_cita) {
                            fetch(`http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php`, {
                                method: 'POST',
                                headers: { "Content-Type": "application/json" },
                                body: JSON.stringify({ query })
                            })
                                .then(response => response.json())
                                .then(result => {
                                    //console.log(result);
                                    const cita = result.data.citaID
                                    if (cita) {
                                        document.getElementsByName("id_pacienteEdit")[0].value = cita.id_paciente;
                                        document.getElementsByName("id_medicoEdit")[0].value = cita.id_medico;
                                        document.getElementsByName("motivoEdit")[0].value = cita.motivo;
                                    } else {
                                        alert("No se encontró ninguna cita con ese ID");
                                    }
                                })
                                .catch(error => console.error("Error al obtener datos:", error));
                        }
                    });

                    document.getElementById("formUpdate").addEventListener("submit", function (e) {
                        e.preventDefault();
                        const URL = "http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php";
                        const id_cita = parseInt(this.id_citaEdit.value)
                        const id_paciente = parseInt(this.id_pacienteEdit.value);
                        const id_medico = parseInt(this.id_medicoEdit.value);
                        const motivo = this.motivoEdit.value;

                        async function actualizarCita() {
                            const query = `
        mutation { actualizarCita(id_cita: ${id_cita}, id_paciente: ${id_paciente}, id_medico: ${id_medico}, motivo: \"${motivo}\") {id_cita id_paciente id_medico motivo}}`;

                            const res = await fetch(URL, {
                                method: "POST",
                                headers: { "Content-Type": "application/json" },
                                body: JSON.stringify({ query })
                            });
                            const data = await res.json();
                            console.log(data);
                            if (data) {
                                alert(`Éxito: Cita #${id_cita} editada correctamente`);
                                //Desactivar si se quiere ver el regreso de data
                                location.reload()
                            } else {
                                alert("Error: Cita no editada");
                            }
                        }
                        actualizarCita();
                    });
                </script>

                <h2> Eliminar cita </h2>
                <input type="number" id="id_citaDelete" placeholder="ID cita">
                <button onclick="eliminarCita()"> Eliminar </button>
                <script>
                    async function eliminarCita() {
                        const URL = "http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php";

                        const id_cita = parseInt(document.getElementById("id_citaDelete").value);
                        const query = `mutation { eliminarCita(id_cita: ${id_cita})}`;

                        const res = await fetch(URL, {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ query })
                        });

                        const data = await res.json();
                        console.log(data);
                        if (data) {
                            alert(`Éxito: Cita #${id_cita} eliminada correctamente`);
                            //Desactivar si se quiere ver el regreso de data
                            location.reload()
                        } else {
                            alert("Error: Cita no eliminada");
                        }
                    }
                </script>

            </div>
            <div class="list-container">
                <h2>Lista de citas</h2>
                <div id="container"></div>
                <script>
                    const URL = "http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php";
                    async function obtenerCitas() {
                        const query = `query {cita {id_cita id_paciente id_medico motivo
                                        paciente {nombre} medico {nombre}}}`;
                        const res = await fetch(URL, {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ query })
                        });
                        const response = await res.json();
                        const citas = response.data.cita;
                        const divCitaContainer = document.getElementById('container');

                        citas.forEach(cita => {

                            const cardCita = document.createElement("div");
                            cardCita.className = "card_cita";
                            cardCita.innerHTML = `
                    <h2>ID CITA: ${cita.id_cita}</h2>
                    <p>Paciente: #${cita.id_paciente} | ${cita.paciente.nombre}</p>
                    <p>Médico: #${cita.id_medico} | ${cita.medico.nombre}</p>
                    <p>Motivo: ${cita.motivo}</p>`;
                            divCitaContainer.appendChild(cardCita);

                        });

                        //console.log(response);
                    }
                    obtenerCitas();
                </script>
            </div>
        </div>
    </main>
</body>