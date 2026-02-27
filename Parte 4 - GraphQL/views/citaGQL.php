<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Hospital Regional Universitario de Málaga - Gestión de Citas</title>
    <style>
        /* VARIABLES INSTITUCIONALES */
        :root {
            --bg-body: #f1f5f9;
            --bg-container: #ffffff;
            --header-bg: #ffffff;
            --text-main: #1e293b;
            --primary-blue: #007dc5; /* Azul oficial del Hospital */
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
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            transition: all 0.3s ease;
        }

        /* HEADER CON LOGO OFICIAL */
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
            height: 70px; /* Ajuste para el logo vertical solicitado */
            width: auto;
        }

        [data-theme="dark"] .logo-hospital {
            filter: brightness(0.9) contrast(1.1);
            background: white; /* Pequeño fondo para que el logo no se pierda en modo oscuro */
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
            align-items: center;
        }

        /* BOTONES */
        .btn-pacientes, .btn-index, .theme-toggle {
            padding: 8px 18px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 0.9rem;
            cursor: pointer;
            border: none;
            transition: 0.2s;
        }

        .btn-pacientes { background-color: var(--primary-blue); color: white; }
        .btn-index { background-color: #64748b; color: white; }
        .theme-toggle { background-color: #f1f5f9; color: #333; border: 1px solid #ccc; }

        [data-theme="dark"] .theme-toggle { background-color: #334155; color: white; border: none; }

        /* CONTENEDOR PRINCIPAL */
        main {
            margin-top: 20px;
            padding: 10px;
        }

        .main-container {
            display: flex;
            align-items: flex-start;
            gap: 30px;
        }

        .sidebar-forms {
            flex: 0 0 320px;
            position: sticky;
            top: 120px;
        }

        .list-container {
            flex: 1;
        }

        /* FORMULARIOS Y TARJETAS */
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

        label {
            display: block;
            margin-top: 10px;
            font-weight: 600;
            font-size: 0.9rem;
        }

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

        button[onclick] { background-color: #ef4444; } /* Botón eliminar en rojo */

        .card_cita p {
            font-size: 1.1rem;
            margin: 8px 0;
        }

        .card_cita h2 {
            border-bottom-color: var(--primary-blue);
        }
    </style>
</head>

<body>
    <header>
        <div class="brand">
            <img src="https://www.vectorlogo.es/wp-content/uploads/2023/01/logo-vector-hospital-regional-universitario-de-malaga-vertical.jpg" 
                 alt="Logo Hospital Regional de Málaga" class="logo-hospital">
            <h1>API-REST-GraphQL Citas</h1>
        </div>
        <div class="nav-links">
            <button class="theme-toggle" id="modeBtn">🌓 Modo</button>
            <a href="pacienteGQL.php" class="btn-pacientes">Gestión Pacientes</a>
            <a href="index.php" class="btn-index">Volver al Index</a>
        </div>
    </header>

    <main>
        <div class="main-container">
            <div class="sidebar-forms">

                <h2>Crear cita</h2>
                <form id="formularioPost">
                    <label for="id_paciente">ID Paciente: </label>
                    <input type="number" name="id_paciente" placeholder="ID paciente" required>

                    <label for="id_medico">ID Médico: </label>
                    <input type="number" name="id_medico" placeholder="ID medico" required>

                    <label for="medico">Motivo: </label>
                    <input type="text" name="motivo" placeholder="Motivo de la consulta" required>

                    <button type="submit"> Crear Cita </button>
                </form>

                <h2>Editar cita</h2>
                <form id="formUpdate">
                    <label for="id_citaEdit">ID cita a editar: </label>
                    <input type="number" name="id_citaEdit" placeholder="ID cita" required>

                    <label for="id_pacienteEdit">Nuevo ID Paciente: </label>
                    <input type="number" name="id_pacienteEdit" placeholder="ID paciente" required>

                    <label for="id_medicoEdit">Nuevo ID Médico: </label>
                    <input type="number" name="id_medicoEdit" placeholder="ID medico" required>

                    <label for="motivoEdit">Nuevo Motivo: </label>
                    <input type="text" name="motivoEdit" placeholder="Motivo" required>

                    <button type="submit"> Actualizar Datos </button>
                </form>

                <h2> Eliminar cita </h2>
                <div style="background: var(--bg-container); padding: 15px; border-radius: 12px; border: 1px solid var(--border-color);">
                    <label>ID de Cita a borrar:</label>
                    <input type="number" id="id_citaDelete" placeholder="ID cita">
                    <button onclick="eliminarCita()"> Eliminar Definitivamente </button>
                </div>

            </div>

            <div class="list-container">
                <h2>Citas Programadas</h2>
                <div id="container"></div>
            </div>
        </div>
    </main>

    <script>
        // --- LÓGICA MODO OSCURO ---
        const modeBtn = document.getElementById('modeBtn');
        modeBtn.addEventListener('click', () => {
            const theme = document.documentElement.getAttribute('data-theme');
            if (theme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'light');
            } else {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        });

        const URL = "http://localhost/Certificado/git/Hospital/Proyect_Hospital/Parte 4 - GraphQL/GraphQL/index.php";

        // --- CREAR CITA ---
        document.getElementById("formularioPost").addEventListener("submit", function (e) {
            e.preventDefault();
            const id_paciente = parseInt(this.id_paciente.value);
            const id_medico = parseInt(this.id_medico.value);
            const motivo = this.motivo.value;

            async function crearCitas() {
                const query = `mutation { agregarCita(id_paciente: ${id_paciente}, id_medico: ${id_medico}, motivo: \"${motivo}\") {id_cita}}`;
                const res = await fetch(URL, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ query })
                });
                const data = await res.json();
                if (data.data) {
                    alert(`Éxito: Cita #${data.data.agregarCita.id_cita} creada correctamente`);
                    location.reload();
                }
            }
            crearCitas();
        });

        // --- EDITAR CITA (AUTOCOMPLETAR) ---
        const inputIdCita = document.getElementsByName("id_citaEdit")[0];
        inputIdCita.addEventListener("blur", function () {
            const id_cita = this.value;
            const query = `query {citaID(id_cita: ${id_cita}) {id_paciente id_medico motivo}}`;
            if (id_cita) {
                fetch(URL, {
                    method: 'POST',
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ query })
                })
                .then(response => response.json())
                .then(result => {
                    const cita = result.data.citaID;
                    if (cita) {
                        document.getElementsByName("id_pacienteEdit")[0].value = cita.id_paciente;
                        document.getElementsByName("id_medicoEdit")[0].value = cita.id_medico;
                        document.getElementsByName("motivoEdit")[0].value = cita.motivo;
                    }
                });
            }
        });

        // --- ACTUALIZAR CITA ---
        document.getElementById("formUpdate").addEventListener("submit", function (e) {
            e.preventDefault();
            const id_cita = parseInt(this.id_citaEdit.value);
            const id_paciente = parseInt(this.id_pacienteEdit.value);
            const id_medico = parseInt(this.id_medicoEdit.value);
            const motivo = this.motivoEdit.value;

            async function actualizarCita() {
                const query = `mutation { actualizarCita(id_cita: ${id_cita}, id_paciente: ${id_paciente}, id_medico: ${id_medico}, motivo: \"${motivo}\") {id_cita}}`;
                const res = await fetch(URL, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ query })
                });
                const data = await res.json();
                if (data.data) {
                    alert(`Éxito: Cita #${id_cita} editada correctamente`);
                    location.reload();
                }
            }
            actualizarCita();
        });

        // --- ELIMINAR CITA ---
        async function eliminarCita() {
            const id_cita = parseInt(document.getElementById("id_citaDelete").value);
            if(!id_cita) return alert("Ingresa un ID");
            const query = `mutation { eliminarCita(id_cita: ${id_cita})}`;
            const res = await fetch(URL, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ query })
            });
            const data = await res.json();
            if (data.data) {
                alert(`Éxito: Cita #${id_cita} eliminada`);
                location.reload();
            }
        }

        // --- OBTENER LISTADO ---
        async function obtenerCitas() {
            const query = `query {cita {id_cita id_paciente id_medico motivo paciente {nombre} medico {nombre}}}`;
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
                    <h2>CITA #${cita.id_cita}</h2>
                    <p><strong>👤 Paciente:</strong> #${cita.id_paciente} | ${cita.paciente.nombre}</p>
                    <p><strong>🩺 Médico:</strong> #${cita.id_medico} | ${cita.medico.nombre}</p>
                    <p><strong>📝 Motivo:</strong> ${cita.motivo}</p>`;
                divCitaContainer.appendChild(cardCita);
            });
        }
        obtenerCitas();
    </script>
</body>
</html>