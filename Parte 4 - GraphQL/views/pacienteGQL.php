<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Hospital Regional - Gestión de Pacientes</title>
    <style>
        /* VARIABLES INSTITUCIONALES */
        :root {
            --bg-body: #f1f5f9;
            --bg-container: #ffffff;
            --header-bg: #ffffff;
            --text-main: #1e293b;
            --primary-blue: #007dc5;
            --accent-blue: #0ea5e9;
            --border-color: #cbd5e1;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] {
            --bg-body: #0f172a;
            --bg-container: #1e293b;
            --header-bg: #1e293b;
            --text-main: #f8fafc;
            --primary-blue: #38bdf8;
            --border-color: #334155;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            width: 95%;
            max-width: 1400px;
            margin: 0 auto;
            font-family: 'Segoe UI', system-ui, sans-serif;
            transition: all 0.3s ease;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--header-bg);
            padding: 10px 30px;
            position: sticky;
            top: 0;
            border-bottom: 4px solid var(--primary-blue);
            box-shadow: var(--shadow);
            z-index: 1000;
            border-radius: 0 0 10px 10px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo-hospital {
            height: 70px;
            width: auto;
        }

        [data-theme="dark"] .logo-hospital {
            filter: brightness(0.9) contrast(1.1);
            background: white;
            padding: 5px;
            border-radius: 5px;
        }

        h1 {
            font-size: 1.2rem;
            color: var(--primary-blue);
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            gap: 15px;
        }

        .btn-nav, .theme-toggle {
            padding: 8px 18px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 0.9rem;
            cursor: pointer;
            border: none;
            transition: 0.2s;
        }

        .btn-citas { background-color: #007dc5; color: white; }
        .btn-index { background-color: #64748b; color: white; }
        .theme-toggle { background-color: #f1f5f9; color: #333; border: 1px solid #ccc; }

        main { margin-top: 20px; padding: 10px; }

        .main-container {
            display: flex;
            align-items: flex-start;
            gap: 30px;
        }

        .sidebar-forms {
            flex: 0 0 350px;
            position: sticky;
            top: 120px;
        }

        .list-container { flex: 1; }

        form, .card_cita {
            background-color: var(--bg-container);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
        }

        h2 {
            font-size: 1.1rem;
            color: var(--primary-blue);
            margin-top: 0;
            border-bottom: 2px solid var(--bg-body);
            padding-bottom: 8px;
        }

        label { display: block; margin-top: 10px; font-weight: 600; font-size: 0.85rem; }

        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background-color: var(--bg-body);
            color: var(--text-main);
            box-sizing: border-box;
        }

        button[type="submit"], button[onclick] {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .warning-text {
            color: #ef4444;
            font-size: 0.85rem;
            margin: 10px 0;
            line-height: 1.4;
        }

        .card_cita h2 { border-bottom-color: var(--primary-blue); }
        .card_cita p { font-size: 1rem; margin: 8px 0; }
    </style>
</head>

<body>
    <header>
        <div class="brand">
            <img src="https://www.vectorlogo.es/wp-content/uploads/2023/01/logo-vector-hospital-regional-universitario-de-malaga-vertical.jpg" 
                 alt="Logo Hospital" class="logo-hospital">
            <h1>Gestión de Pacientes</h1>
        </div>
        <div class="nav-links">
            <button class="theme-toggle" id="modeBtn">🌓 Modo</button>
            <a href="citaGQL.php" class="btn-nav btn-citas">Ir a Citas</a>
            <a href="index.php" class="btn-nav btn-index">Volver al Index</a>
        </div>
    </header>

    <main>
        <div class="main-container">
            <div class="sidebar-forms">
                <h2>Agregar nuevo paciente</h2>
                <form id="formularioPost">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="Nombre completo" required>
                    <label>DNI:</label>
                    <input type="text" name="dni" placeholder="DNI" required>
                    <label>Fecha de nacimiento:</label>
                    <input type="text" name="fecha_nacimiento" placeholder="DD/MM/AAAA" required>
                    <label>Teléfono:</label>
                    <input type="text" name="telefono" placeholder="Número de contacto" required>
                    <button type="submit"> Crear Paciente </button>
                </form>

                <h2>Editar paciente</h2>
                <form id="formUpdate">
                    <label>ID paciente:</label>
                    <input type="number" name="id_paciente_edit" placeholder="ID a buscar" required>
                    <label>Nombre:</label>
                    <input type="text" name="nombre_edit" placeholder="Nombre">
                    <label>DNI:</label>
                    <input type="text" name="dni_edit" placeholder="DNI">
                    <label>Fecha de nacimiento:</label>
                    <input type="text" name="fecha_nacimiento_edit" placeholder="Fecha">
                    <label>Teléfono:</label>
                    <input type="text" name="telefono_edit" placeholder="Teléfono">
                    <button type="submit"> Actualizar Datos </button>
                </form>

                <h2> Eliminar paciente </h2>
                <div style="background: var(--bg-container); padding: 20px; border-radius: 12px; border: 1px solid var(--border-color);">
                    <p class="warning-text">⚠️ <b>Restricción:</b> Si el paciente tiene una cita activa, debe eliminar la cita primero para evitar errores de integridad.</p>
                    <input type="number" id="id_pacienteDelete" placeholder="ID paciente">
                    <button onclick="eliminarPaciente()" style="background-color: #ef4444;"> Eliminar Paciente </button>
                </div>
            </div>

            <div class="list-container">
                <h2>Listado de Pacientes Registrados</h2>
                <div id="containerPaciente"></div>
            </div>
        </div>
    </main>

    <script>
        // Lógica Modo Oscuro
        const modeBtn = document.getElementById('modeBtn');
        modeBtn.addEventListener('click', () => {
            const theme = document.documentElement.getAttribute('data-theme');
            document.documentElement.setAttribute('data-theme', theme === 'dark' ? 'light' : 'dark');
        });

        const URL = "http://localhost/Certificado/git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php";

        // Agregar Paciente
        document.getElementById("formularioPost").addEventListener("submit", function (e) {
            e.preventDefault();
            const nombre = this.nombre.value;
            const dni = this.dni.value;
            const fecha_nacimiento = this.fecha_nacimiento.value;
            const telefono = this.telefono.value;

            async function crearPaciente() {
                const query = `mutation { agregarPaciente(nombre: \"${nombre}\", dni: \"${dni}\", fecha_nacimiento: \"${fecha_nacimiento}\", telefono: \"${telefono}\") {id_paciente}}`;
                const res = await fetch(URL, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ query })
                });
                const data = await res.json();
                if (data.data) {
                    alert(`Éxito: Paciente #${data.data.agregarPaciente.id_paciente} creado`);
                    location.reload();
                }
            }
            crearPaciente();
        });

        // Autocompletar para editar
        const inputIdPaciente = document.getElementsByName("id_paciente_edit")[0];
        inputIdPaciente.addEventListener("blur", function () {
            const id_paciente = this.value;
            const query = `query {pacienteID(id_paciente: ${id_paciente}) {nombre, dni, fecha_nacimiento, telefono}}`;
            if (id_paciente) {
                fetch(URL, {
                    method: 'POST',
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ query })
                })
                .then(response => response.json())
                .then(result => {
                    const p = result.data.pacienteID;
                    if (p) {
                        document.getElementsByName("nombre_edit")[0].value = p.nombre;
                        document.getElementsByName("dni_edit")[0].value = p.dni;
                        document.getElementsByName("fecha_nacimiento_edit")[0].value = p.fecha_nacimiento;
                        document.getElementsByName("telefono_edit")[0].value = p.telefono;
                    }
                });
            }
        });

        // Actualizar Paciente
        document.getElementById("formUpdate").addEventListener("submit", function (e) {
            e.preventDefault();
            const id_paciente = parseInt(this.id_paciente_edit.value);
            const nombre = this.nombre_edit.value;
            const dni = this.dni_edit.value;
            const fecha_nacimiento = this.fecha_nacimiento_edit.value;
            const telefono = this.telefono_edit.value;

            async function actualizarPaciente() {
                const query = `mutation {actualizarPaciente(id_paciente: ${id_paciente}, nombre: \"${nombre}\", dni: \"${dni}\", fecha_nacimiento: \"${fecha_nacimiento}\", telefono: \"${telefono}\") {id_paciente}}`;
                const res = await fetch(URL, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ query })
                });
                const data = await res.json();
                if (data.data) {
                    alert(`Éxito: Paciente #${id_paciente} actualizado`);
                    location.reload();
                }
            }
            actualizarPaciente();
        });

        // Eliminar Paciente
        async function eliminarPaciente() {
            const id_paciente = parseInt(document.getElementById("id_pacienteDelete").value);
            if(!id_paciente) return alert("Ingresa un ID");
            const query = `mutation {eliminarPaciente(id_paciente: ${id_paciente})}`;
            const res = await fetch(URL, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ query })
            });
            const data = await res.json();
            if (data.data) {
                alert(`Paciente #${id_paciente} eliminado`);
                location.reload();
            }
        }

        // Listar Pacientes
        async function obtenerPacientes() {
            const query = `query {paciente {id_paciente nombre dni fecha_nacimiento telefono}}`;
            const res = await fetch(URL, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ query })
            });
            const response = await res.json();
            const pacientes = response.data.paciente;
            const divContainer = document.getElementById('containerPaciente');

            pacientes.forEach(p => {
                const card = document.createElement("div");
                card.className = "card_cita";
                card.innerHTML = `
                    <h2>PACIENTE #${p.id_paciente}</h2>
                    <p><strong>👤 Nombre:</strong> ${p.nombre}</p>
                    <p><strong>🆔 DNI:</strong> ${p.dni}</p>
                    <p><strong>🎂 Fecha Nac.:</strong> ${p.fecha_nacimiento}</p>
                    <p><strong>📞 Teléfono:</strong> ${p.telefono}</p>`;
                divContainer.appendChild(card);
            });
        }
        obtenerPacientes();
    </script>
</body>
</html>