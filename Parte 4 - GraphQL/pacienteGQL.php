<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> CRUD MongoDB + PHP </title>
    <style>
        body {
            background-color: #d4e2fe;
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
            background-color: #6798fb;
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
            flex: 0 0 350px;
            position: sticky;
            top: 140px;
        }

        .list-container {
            flex: 1;
        }

        .btn-pacientes {
            background-color: #ff4b5d;
            color: #333;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: 1px solid #ccc;
        }

        main {
            background-color: #a1c0ff;
            margin: 0 auto;
            padding: 20px;
        }

        .card_cita {
            background-color: #d4e2fe;
            border: 1px solid #b6ceff;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        form {
            background-color: #d4e2fe;
            border: 1px solid #b6ceff;
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
        <h1>API-REST-GrahpQL Pacientes</h1>
        <a href="vistaQL.php" class="btn-pacientes">Ir a Citas</a>
    </header>
    <main>
        <div class="main-container">
            <div class="sidebar-forms">
                <h2>Agregar nuevo paciente</h2>
                <form id="formularioPost">

                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" placeholder="Nombre paciente"><br>

                    <label for="dni">DNI: </label>
                    <input type="text" name="dni" placeholder="DNI"><br>

                    <label for="fecha_nacimiento">Fecha de nacimiento: </label>
                    <input type="text" name="fecha_nacimiento" placeholder="Fecha de nacimiento"><br>

                    <label for="telefono">Telefeno: </label>
                    <input type="text" name="telefono" placeholder="Telefono"><br>

                    <button type="submit"> Crear </button><br>
                </form>
                <script>
                    document.getElementById("formularioPost").addEventListener("submit", function (e) {
                        e.preventDefault();

                        const URL = "http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php";
                        const nombre = this.nombre.value;
                        const dni = this.dni.value;
                        const fecha_nacimiento = this.fecha_nacimiento.value;
                        const telefono = this.telefono.value;

                        async function crearPaciente() {
                            const query = `
        mutation { agregarPaciente(nombre: \"${nombre}\", dni: \"${dni}\", fecha_nacimiento: \"${fecha_nacimiento}\", telefono: \"${telefono}\") {id_paciente nombre dni fecha_nacimiento telefono}}`;

                            const res = await fetch(URL, {
                                method: "POST",
                                headers: { "Content-Type": "application/json" },
                                body: JSON.stringify({ query })
                            });
                            const data = await res.json();
                            console.log(data);
                            if (data) {
                                alert(`Éxito: Paciente #${data.data.agregarPaciente.id_paciente} creado correctamente`);
                                ///Desactivar si se quiere ver el regreso de data
                                location.reload()
                            } else {
                                alert("Error: Paciente no creado");
                            }
                        }

                        crearPaciente();
                    });

                </script>


                <h2>Editar paciente</h2>
                <form id="formUpdate">

                    <label for="id_paciente_edit">ID paciente: </label>
                    <input type="int" name="id_paciente_edit" placeholder="ID paciente"><br>

                    <label for="nombre_edit">Nombre: </label>
                    <input type="text" name="nombre_edit" placeholder="Nombre paciente"><br>

                    <label for="dni_edit">DNI: </label>
                    <input type="text" name="dni_edit" placeholder="DNI"><br>

                    <label for="fecha_nacimiento_edit">Fecha de nacimiento: </label>
                    <input type="text" name="fecha_nacimiento_edit" placeholder="Fecha de nacimiento"><br>

                    <label for="telefono_edit">Telefeno: </label>
                    <input type="text" name="telefono_edit" placeholder="Telefono"><br>

                    <button type="submit"> Actualizar </button><br>
                </form>
                <script>
                    const inputIdPaciente = document.getElementsByName("id_paciente_edit")[0];

                    inputIdPaciente.addEventListener("blur", function () {
                        const id_paciente = this.value;
                        const query = `query {pacienteID(id_paciente: ${id_paciente}) {nombre, dni, fecha_nacimiento, telefono}}`;
                        if (id_paciente) {
                            fetch(`http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php`, {
                                method: 'POST',
                                headers: { "Content-Type": "application/json" },
                                body: JSON.stringify({ query })
                            })
                                .then(response => response.json())
                                .then(result => {
                                    //console.log(result);
                                    const empleado = result.data.pacienteID
                                    if (empleado) {
                                        document.getElementsByName("nombre_edit")[0].value = empleado.nombre;
                                        document.getElementsByName("dni_edit")[0].value = empleado.dni;
                                        document.getElementsByName("fecha_nacimiento_edit")[0].value = empleado.fecha_nacimiento;
                                        document.getElementsByName("telefono_edit")[0].value = empleado.telefono;
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
                        const id_paciente = parseInt(this.id_paciente_edit.value);
                        const nombre = this.nombre_edit.value;
                        const dni = this.dni_edit.value;
                        const fecha_nacimiento = this.fecha_nacimiento_edit.value;
                        const telefono = this.telefono_edit.value;

                        async function actualizarPaciente() {
                            const query = `
                        mutation {actualizarPaciente(id_paciente: ${id_paciente}, nombre: \"${nombre}\", dni: \"${dni}\", fecha_nacimiento: \"${fecha_nacimiento}\", telefono: \"${telefono}\") {id_paciente nombre dni fecha_nacimiento telefono}}`;

                            const res = await fetch(URL, {
                                method: "POST",
                                headers: { "Content-Type": "application/json" },
                                body: JSON.stringify({ query })
                            });
                            const data = await res.json();
                            console.log(data);
                            if (data) {
                                alert(`Éxito: Paciente #${id_paciente} editado correctamente`);
                                //Desactivar si se quiere ver el regreso de data
                                location.reload()
                            } else {
                                alert("Error: Paciente no editado");
                            }
                        }
                        actualizarPaciente();
                    });
                </script>


                <h2> Eliminar paciente </h2>

                <p style="color: red"><b>Si el paciente tiene una cita, no se puede eliminar, la tabla puede que no
                        tenga on
                        delete casacade, eliminar la cita primero y después el paciente</b></p>
                <input type="number" id="id_pacienteDelete" placeholder="ID paciente">
                <button onclick="eliminarPaciente()"> Eliminar </button>
                <script>
                    async function eliminarPaciente() {
                        const URL = "http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php";

                        const id_paciente = parseInt(document.getElementById("id_pacienteDelete").value);
                        const query = `mutation {eliminarPaciente(id_paciente: ${id_paciente})}`;

                        const res = await fetch(URL, {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ query })
                        });

                        const data = await res.json();
                        console.log(data);
                        if (data) {
                            alert(`Éxito: Paciente #${id_paciente} eliminado correctamente`);
                            //Desactivar si se quiere ver el regreso de data
                            location.reload()
                        } else {
                            alert("Error: Paciente no eliminado");
                        }
                    }
                </script>
            </div>
            <div class="list-container">
                <h2>Lista de citas</h2>
                <div id="containerPaciente"></div>
                <script>
                    const URL = "http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php";
                    async function obtenerPacientes() {
                        const query = `query {paciente {id_paciente nombre dni fecha_nacimiento telefono}}`;
                        const res = await fetch(URL, {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ query })
                        });
                        const response = await res.json();
                        const pacientes = response.data.paciente;
                        const divPacienteContainer = document.getElementById('containerPaciente');

                        pacientes.forEach(paciente => {

                            const cardCita = document.createElement("div");
                            cardCita.className = "card_cita";
                            cardCita.innerHTML = `
    <h2>ID PACIENTE: ${paciente.id_paciente}</h2>
    <p>Nombre: ${paciente.nombre}</p>
    <p>DNI: ${paciente.dni}</p>
    <p>Fecha de nacimiento: ${paciente.fecha_nacimiento}</p>
    <p>Telefono: ${paciente.telefono}</p>`;
                            divPacienteContainer.appendChild(cardCita);

                        });

                        // console.log(response);
                    }
                    obtenerPacientes();
                </script>
            </div>
        </div>
    </main>
</body>