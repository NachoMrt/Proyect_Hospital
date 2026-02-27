<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Médicos</title>
    <style>
        body {
            background-color: #e8f4fe;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            font-family: sans-serif;
        }

        header {
            background-color: #afdaff;
            padding: 5px 20px;
            border-radius: 10px;
            text-align: center;
        }

        main {
            background-color: #d2e9ff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .card_medico {
            background-color: #f6faff;
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 10px;
        }

        form {
            background-color: #f6faff;
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .btn-guardar {
            background-color: #4CAF50;
            color: white;
        }

        .btn-editar {
            background-color: #2196F3;
            color: white;
        }

        .btn-eliminar {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <h1>API-REST Médicos</h1>
        <a href="index.php">Volver al index</a>
        <main>

            <h2>Registrar Médico</h2>
            <form id="formPost">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre completo" required><br>

                <label for="especialidad">Especialidad:</label>
                <input type="text" id="especialidad" name="especialidad" placeholder="Ej. Cardiología" required><br>

                <label for="id_departamento">ID Dpto:</label>
                <input type="number" id="id_departamento" name="id_departamento" placeholder="ID Departamento"><br>

                <button type="submit" class="btn-guardar">Guardar Médico</button>
            </form>

            <h2>Editar Médico</h2>
            <form id="formUpdate">
                <label for="id_edit">ID a Editar:</label>
                <input type="number" id="id_edit" name="id_edit" placeholder="ID del médico" required><br>

                <label for="nombre_edit">Nuevo Nombre:</label>
                <input type="text" id="nombre_edit" name="nombre_edit"><br>

                <label for="espec_edit">Nueva Espec:</label>
                <input type="text" id="espec_edit" name="espec_edit"><br>

                <label for="dept_edit">Nuevo ID Dpto:</label>
                <input type="number" id="dept_edit" name="dept_edit"><br>

                <button type="submit" class="btn-editar">Actualizar Médico</button>
            </form>

            <h2>Eliminar Médico</h2>
            <form id="formDelete">
                <label for="id_del">ID a Eliminar:</label>
                <input type="number" id="id_del" name="id_del" placeholder="ID del médico" required><br>
                <button type="submit" class="btn-eliminar">Eliminar Médico</button>
            </form>

            <h2>Lista de Médicos</h2>
            <div id="container"></div>
        </main>

        <script>
            // AJUSTA ESTA URL A TU ENTORNO LOCAL
            const URL = 'http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/REST/public/index.php/medico';

            // Cargar Lista
            function cargarMedicos() {
                fetch(URL).then(r => r.json()).then(data => {
                    const cont = document.getElementById('container');
                    cont.innerHTML = '';
                    data.forEach(m => {
                        cont.innerHTML += `<div class="card_medico">
                        <h3>${m.nombre} (ID: ${m.id_medico})</h3>
                        <p><strong>Especialidad:</strong> ${m.especialidad}</p>
                        <p><strong>Departamento ID:</strong> ${m.id_departamento}</p>
                    </div>`;
                    });
                });
            }

            // Crear (POST)
            document.getElementById("formPost").addEventListener("submit", function (e) {
                e.preventDefault();
                fetch(URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        nombre: this.nombre.value,
                        especialidad: this.especialidad.value,
                        id_departamento: this.id_departamento.value
                    })
                }).then(() => { this.reset(); cargarMedicos(); });
            });

            // Autocompletar para editar (GET individual al perder foco)
            document.getElementById("id_edit").addEventListener("blur", function () {
                if (this.value) {
                    fetch(`${URL}/${this.value}`).then(r => r.json()).then(data => {
                        if (!data.mensaje) {
                            document.getElementById("nombre_edit").value = data.nombre;
                            document.getElementById("espec_edit").value = data.especialidad;
                            document.getElementById("dept_edit").value = data.id_departamento;
                        }
                    });
                }
            });

            // Actualizar (PUT)
            document.getElementById("formUpdate").addEventListener("submit", function (e) {
                e.preventDefault();
                const id = document.getElementById("id_edit").value;
                fetch(`${URL}/${id}`, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        nombre: document.getElementById("nombre_edit").value,
                        especialidad: document.getElementById("espec_edit").value,
                        id_departamento: document.getElementById("dept_edit").value
                    })
                }).then(() => { this.reset(); cargarMedicos(); });
            });

            // Eliminar (DELETE) - Añadido
            document.getElementById("formDelete").addEventListener("submit", function (e) {
                e.preventDefault();
                const id = document.getElementById("id_del").value;
                if (confirm('¿Estás seguro de eliminar este médico?')) {
                    fetch(`${URL}/${id}`, { method: 'DELETE' })
                        .then(() => { this.reset(); cargarMedicos(); });
                }
            });

            // Carga inicial
            cargarMedicos();
        </script>
</body>

</html>