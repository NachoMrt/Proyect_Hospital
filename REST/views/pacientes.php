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

        form, .card_paciente {
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

        .btn-delete-action { background-color: #ef4444; margin-top: 10px; }

        .card_paciente h2 { 
            font-size: 1.1rem;
            color: var(--primary-blue); 
            margin-top: 0;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 5px;
        }
        .card_paciente p { font-size: 1rem; margin: 8px 0; }
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
            <a href="index.php" class="btn-nav btn-index">Volver al Index</a>
        </div>
    </header>

    <main>
        <div class="sidebar-forms">
            <div>
                <h2>Registrar Paciente</h2>
                <form id="formularioPost">
                    <label>Nombre Completo:</label>
                    <input type="text" name="nombre" placeholder="Ej. Juan Pérez" required>
                    <label>DNI:</label>
                    <input type="text" name="dni" placeholder="12345678X" required>
                    <label>Fecha Nacimiento:</label>
                    <input type="text" name="fecha_nacimiento" placeholder="YYYY-MM-DD">
                    <label>Teléfono:</label>
                    <input type="text" name="telefono" placeholder="+34 600 000 000">
                    <button type="submit">Registrar Paciente</button>
                </form>
            </div>

            <div>
                <h2>Editar Paciente</h2>
                <form id="formUpdate">
                    <label>ID a Editar:</label>
                    <input type="number" name="id_pacienteEdit" placeholder="Ingrese ID" required>
                    <label>Nombre:</label>
                    <input type="text" name="nombreEdit">
                    <label>DNI:</label>
                    <input type="text" name="dniEdit">
                    <label>Fecha Nac.:</label>
                    <input type="text" name="fechaEdit">
                    <label>Teléfono:</label>
                    <input type="text" name="telEdit">
                    <button type="submit">Actualizar Datos</button>
                </form>
            </div>

            <div style="background: var(--bg-container); padding: 20px; border-radius: 12px; border: 1px solid var(--border-color);">
                <h2>Baja de Paciente</h2>
                <label>ID del paciente:</label>
                <input type="number" id="id_del" placeholder="ID a eliminar">
                <button onclick="eliminarPaciente()" class="btn-delete-action">Eliminar Registro</button>
            </div>
        </div>

        <div class="list-container">
            <h2>Archivo de Pacientes</h2>
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
            }).then(() => {
                alert("Paciente registrado con éxito");
                location.reload();
            });
        });

        // Lógica Autocompletar (Blur)
        document.getElementsByName("id_pacienteEdit")[0].addEventListener("blur", function () {
            if (this.value) {
                fetch(`${API_URL}/${this.value}`)
                    .then(res => res.json())
                    .then(data => {
                        if(data && !data.error) {
                            document.getElementsByName("nombreEdit")[0].value = data.nombre || '';
                            document.getElementsByName("dniEdit")[0].value = data.dni || '';
                            document.getElementsByName("fechaEdit")[0].value = data.fecha_nacimiento || '';
                            document.getElementsByName("telEdit")[0].value = data.telefono || '';
                        }
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
            }).then(() => {
                alert("Paciente actualizado");
                location.reload();
            });
        });

        // Lógica DELETE
        function eliminarPaciente() {
            const id = document.getElementById("id_del").value;
            if(!id) return alert("Ingrese un ID válido");
            
            if(confirm("¿Seguro que desea eliminar este paciente del sistema?")) {
                fetch(`${API_URL}/${id}`, { method: 'DELETE' })
                    .then(() => { 
                        alert("Registro eliminado"); 
                        location.reload(); 
                    });
            }
        }

        // Lógica GET
        fetch(API_URL)
            .then(res => res.json())
            .then(data => {
                const container = document.getElementById('container');
                data.forEach(p => {
                    const card = document.createElement("div");
                    card.className = "card_paciente";
                    card.innerHTML = `
                        <h2>👤 ID: ${p.id_paciente} - ${p.nombre}</h2>
                        <p><strong>🆔 DNI:</strong> ${p.dni}</p>
                        <p><strong>📞 Tel:</strong> ${p.telefono || 'No registrado'}</p>
                        <p><strong>🎂 F. Nac:</strong> ${p.fecha_nacimiento || 'No registrada'}</p>
                    `;
                    container.appendChild(card);
                });
            });
    </script>
</body>

</html>