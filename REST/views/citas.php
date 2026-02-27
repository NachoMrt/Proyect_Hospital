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

        header {
            background-color: #ffafaf;
            margin: 0 auto;
            padding: 5px 20px;
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
        <h1>API-REST Citas</h1>
        <a href="index.php">Volver al index</a>
    </header>
    <main>
        <!-- POST -->
        <h2> Crear cita </h2>
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
                console.log(this.id_paciente.value, this.id_medico.value, this.motivo.value);
                fetch('http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/REST/public/index.php/cita', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_paciente: this.id_paciente.value,
                        id_medico: this.id_medico.value,
                        motivo: this.motivo.value
                    })
                }).then(() => { form.reset(); })
            });
        </script>

        <!-- UPDATE -->
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
                if (id_cita) {
                    fetch(`http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/REST/public/index.php/cita/${id_cita}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data) {
                                document.getElementsByName("id_pacienteEdit")[0].value = data.id_paciente;
                                document.getElementsByName("id_medicoEdit")[0].value = data.id_medico;
                                document.getElementsByName("motivoEdit")[0].value = data.motivo;
                            } else {
                                alert("No se encontró ninguna cita con ese ID");
                            }
                        })
                        .catch(error => console.error("Error al obtener datos:", error));
                }
            });

            document.getElementById("formUpdate").addEventListener("submit", function (e) {
                e.preventDefault();

                const id_cita = this.id_citaEdit.value;

                fetch(`http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/REST/public/index.php/cita/${id_cita}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_paciente: this.id_pacienteEdit.value,
                        id_medico: this.id_medicoEdit.value,
                        motivo: this.motivoEdit.value
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            console.log("Usuario actualizado:", data);
                            alert(`¡Cita #${id_cita} actualizada correctamente!`);
                            location.reload();
                        } else {
                            alert("No se pudo actualizar la cita. Inténtalo de nuevo.");
                        }

                    })
                    .catch(error => console.error("Error:", error));
            });
        </script>

        <!-- DELETE -->
        <h2> Eliminar cita </h2>
        <input type="number" id="id_cita" placeholder="ID cita">
        <button onclick="eliminarCita()"> Eliminar </button>
        <script>
            function eliminarCita() {

                const id = document.getElementById("id_cita").value;

                fetch(`http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/REST/public/index.php/cita/${id_cita}`, {
                    method: 'DELETE'
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Cita eliminada:", data);
                        alert("Cita eliminada correctamente");
                    })
                    .catch(error => console.error("Error:", error));
            }
        </script>



        <!-- GET -->
        <h2>Lista de citas</h2>
        <div id="container"></div>
        <script>
            fetch('http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/REST/public/index.php/cita')
                .then(response => response.json())
                .then(data => {
                    const divCitas = document.getElementById('container');
                    data.forEach(cita => {

                        const cardCita = document.createElement("div");
                        cardCita.className = "card_cita";
                        cardCita.innerHTML = `
    <h2>ID CITA: ${cita.id_cita}</h2>
    <p>Paciente: ${cita.id_paciente}</p>
    <p>Médico: ${cita.id_medico}</p>
    <p>Motivo: ${cita.motivo}</p>`;
                        divCitas.appendChild(cardCita);
                    });
                });
        </script>


    </main>
</body>