<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Hospital Regional - API REST Citas</title>
    <style>
        /* VARIABLES INSTITUCIONALES */
        :root {
            --bg-body: #f1f5f9;
            --bg-container: #ffffff;
            --header-bg: #ffffff;
            --text-main: #1e293b;
            --primary-blue: #007dc5;
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
            height: 60px;
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

        .btn-index { background-color: #64748b; color: white; }
        .theme-toggle { background-color: var(--bg-body); color: var(--text-main); border: 1px solid var(--border-color); }

        main {
            margin-top: 20px;
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 30px;
            padding: 10px;
        }

        .sidebar-forms {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        h2 {
            font-size: 1.1rem;
            color: var(--primary-blue);
            margin-top: 0;
            border-bottom: 2px solid var(--primary-blue);
            padding-bottom: 5px;
            text-transform: uppercase;
        }

        form, .card_cita, .delete-section {
            background-color: var(--bg-container);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            box-shadow: var(--shadow);
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

        button {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        button:hover { opacity: 0.9; }

        .btn-delete-action { background-color: #ef4444; margin-top: 10px; }

        .card_cita h2 { border-bottom: 1px solid var(--border-color); margin-bottom: 10px; }
        .card_cita p { font-size: 1rem; margin: 8px 0; }
    </style>
</head>

<body>
    <header>
        <div class="brand">
            <img src="https://www.vectorlogo.es/wp-content/uploads/2023/01/logo-vector-hospital-regional-universitario-de-malaga-vertical.jpg" 
                 alt="Logo Hospital" class="logo-hospital">
            <h1>API-REST Citas</h1>
        </div>
        <div class="nav-links">
            <button class="theme-toggle" id="modeBtn">🌓 Modo</button>
            <a href="index.php" class="btn-nav btn-index">Volver al Index</a>
        </div>
    </header>

    <main>
        <div class="sidebar-forms">
            <div>
                <h2>Crear cita</h2>
                <form id="formularioPost">
                    <label>ID Paciente:</label>
                    <input type="number" name="id_paciente" placeholder="ID paciente">
                    <label>ID Médico:</label>
                    <input type="number" name="id_medico" placeholder="ID médico">
                    <label>Motivo:</label>
                    <input type="text" name="motivo" placeholder="Motivo de la consulta">
                    <button type="submit">Crear Cita</button>
                </form>
            </div>

            <div>
                <h2>Editar cita</h2>
                <form id="formUpdate">
                    <label>ID cita (buscar):</label>
                    <input type="number" name="id_citaEdit" placeholder="ID cita" required>
                    <label>ID Paciente:</label>
                    <input type="number" name="id_pacienteEdit" placeholder="ID paciente" required>
                    <label>ID Médico:</label>
                    <input type="number" name="id_medicoEdit" placeholder="ID médico" required>
                    <label>Motivo:</label>
                    <input type="text" name="motivoEdit" placeholder="Motivo" required>
                    <button type="submit">Actualizar Cita</button>
                </form>
            </div>

            <div class="delete-section">
                <h2>Eliminar cita</h2>
                <label>ID de la cita:</label>
                <input type="number" id="id_cita" placeholder="ID cita">
                <button onclick="eliminarCita()" class="btn-delete-action">Eliminar Definitivamente</button>
            </div>
        </div>

        <div class="list-container">
            <h2>Lista de citas actuales</h2>
            <div id="container"></div>
        </div>
    </main>

    <script>
        // Lógica Modo Oscuro
        const modeBtn = document.getElementById('modeBtn');
        modeBtn.addEventListener('click', () => {
            const theme = document.documentElement.getAttribute('data-theme');
            document.documentElement.setAttribute('data-theme', theme === 'dark' ? 'light' : 'dark');
        });

        const API_URL = 'http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/REST/public/index.php/cita';

        // --- POST ---
        document.getElementById("formularioPost").addEventListener("submit", function (e) {
            e.preventDefault();
            fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    id_paciente: this.id_paciente.value,
                    id_medico: this.id_medico.value,
                    motivo: this.motivo.value
                })
            }).then(() => { 
                alert("Cita creada correctamente");
                location.reload(); 
            });
        });

        // --- UPDATE (Carga de datos) ---
        const inputIdCita = document.getElementsByName("id_citaEdit")[0];
        inputIdCita.addEventListener("blur", function () {
            const id_cita = this.value;
            if (id_cita) {
                fetch(`${API_URL}/${id_cita}`)
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

        // --- UPDATE (Envío) ---
        document.getElementById("formUpdate").addEventListener("submit", function (e) {
            e.preventDefault();
            const id_cita = this.id_citaEdit.value;
            fetch(`${API_URL}/${id_cita}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    id_paciente: this.id_pacienteEdit.value,
                    id_medico: this.id_medicoEdit.value,
                    motivo: this.motivoEdit.value
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data) {
                    alert(`¡Cita #${id_cita} actualizada!`);
                    location.reload();
                }
            });
        });

        // --- DELETE ---
        function eliminarCita() {
            const id = document.getElementById("id_cita").value;
            if(!id) return alert("Por favor, introduce un ID");

            if(confirm("¿Estás seguro de que deseas eliminar esta cita?")) {
                fetch(`${API_URL}/${id}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    alert("Cita eliminada correctamente");
                    location.reload();
                })
                .catch(error => console.error("Error:", error));
            }
        }

        // --- GET ---
        fetch(API_URL)
            .then(response => response.json())
            .then(data => {
                const divCitas = document.getElementById('container');
                data.forEach(cita => {
                    const cardCita = document.createElement("div");
                    cardCita.className = "card_cita";
                    cardCita.innerHTML = `
                        <h2>CITA #${cita.id_cita}</h2>
                        <p><strong>👤 ID Paciente:</strong> ${cita.id_paciente}</p>
                        <p><strong>⚕️ ID Médico:</strong> ${cita.id_medico}</p>
                        <p><strong>📝 Motivo:</strong> ${cita.motivo}</p>`;
                    divCitas.appendChild(cardCita);
                });
            });
    </script>
</body>
</html>