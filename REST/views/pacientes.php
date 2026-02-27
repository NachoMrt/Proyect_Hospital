<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Pacientes</title>
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
        <h1>API-REST Pacientes</h1>
        <a href="index.php">Volver al index</a>
    </header>
    <main>
        <h2> Registrar Paciente </h2>
        <form id="formularioPost">
            <label>Nombre:</label><br>
            <input type="text" name="nombre" placeholder="Nombre completo" required><br>
            <label>DNI:</label><br>
            <input type="text" name="dni" placeholder="DNI" required><br>
            <label>Fecha Nacimiento:</label><br>
            <input type="text" name="fecha_nacimiento" placeholder="Fecha de nacimiento"><br>
            <label>Telefono:</label><br>
            <input type="text" name="telefono" placeholder="Teléfono"><br>
            <button type="submit"> Registrar </button>
        </form>

        <h2>Editar Paciente</h2>
        <form id="formUpdate">
            <input type="number" name="id_pacienteEdit" placeholder="ID Paciente a editar" required><br>
            <input type="text" name="nombreEdit" placeholder="Nombre completo"><br>
            <input type="text" name="dniEdit" placeholder="DNI"><br>
            <input type="text" name="fechaEdit" placeholder="Fecha Nacimiento"><br>
            <input type="text" name="telEdit" placeholder="Teléfono"><br>
            <button type="submit"> Actualizar </button>
        </form>

        <h2> Eliminar Paciente </h2>
        <input type="number" id="id_del" placeholder="ID paciente">
        <button onclick="eliminarPaciente()"> Eliminar </button>

        <h2>Lista de Pacientes</h2>
        <div id="container"></div>
    </main>

    <script>
        const API_URL = 'http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/REST/public/index.php/paciente';

        // Lógica POST
        document.getElementById("formularioPost").addEventListener("submit", function (e) {
            e.preventDefault();
            fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    nombre: this.nombre.value,
                    dni: this.dni.value,
                    fecha_nacimiento: this.fecha_nacimiento.value,
                    telefono: this.telefono.value
                })
            }).then(() => location.reload());
        });

        // Lógica para cargar datos en el Edit (Blur)
        document.getElementsByName("id_pacienteEdit")[0].addEventListener("blur", function () {
            if (this.value) {
                fetch(`${API_URL}/${this.value}`)
                    .then(res => res.json())
                    .then(data => {
                        document.getElementsByName("nombreEdit")[0].value = data.nombre;
                        document.getElementsByName("dniEdit")[0].value = data.dni;
                        document.getElementsByName("fechaEdit")[0].value = data.fecha_nacimiento;
                        document.getElementsByName("telEdit")[0].value = data.telefono;
                    });
            }
        });

        // Lógica PUT
        document.getElementById("formUpdate").addEventListener("submit", function (e) {
            e.preventDefault();
            const id = this.id_pacienteEdit.value;
            fetch(`${API_URL}/${id}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    nombre: this.nombreEdit.value,
                    dni: this.dniEdit.value,
                    fecha_nacimiento: this.fechaEdit.value,
                    telefono: this.telEdit.value
                })
            }).then(() => location.reload());
        });

        // Lógica DELETE
        function eliminarPaciente() {
            const id = document.getElementById("id_del").value;
            fetch(`${API_URL}/${id}`, { method: 'DELETE' })
                .then(() => { alert("Eliminado"); location.reload(); });
        }

        // Lógica GET
        fetch(API_URL)
            .then(res => res.json())
            .then(data => {
                const container = document.getElementById('container');
                data.forEach(p => {
                    container.innerHTML += `
                        <div class="card_cita">
                            <h2>ID: ${p.id_paciente} - ${p.nombre}</h2>
                            <p>DNI: ${p.dni}</p>
                            <p>Tel: ${p.telefono}</p>
                        </div>`;
                });
            });
    </script>
</body>

</html>