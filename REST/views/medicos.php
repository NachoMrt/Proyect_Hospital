<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Hospital Regional - Gestión de Médicos</title>
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

        form, .card_medico {
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

        .card_medico h3 { 
            color: var(--primary-blue); 
            margin-top: 0;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 5px;
        }
        .card_medico p { font-size: 1rem; margin: 8px 0; }
    </style>
</head>

<body>
    <header>
        <div class="brand">
            <img src="https://www.vectorlogo.es/wp-content/uploads/2023/01/logo-vector-hospital-regional-universitario-de-malaga-vertical.jpg" 
                 alt="Logo Hospital" class="logo-hospital">
            <h1>Gestión de Médicos</h1>
        </div>
        <div class="nav-links">
            <button class="theme-toggle" id="modeBtn">🌓 Modo</button>
            <a href="index.php" class="btn-nav btn-index">Volver al Index</a>
        </div>
    </header>

    <main>
        <div class="sidebar-forms">
            <div>
                <h2>Registrar Médico</h2>
                <form id="formPost">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="Nombre completo" required>
                    <label>Especialidad:</label>
                    <input type="text" name="especialidad" placeholder="Ej. Cardiología" required>
                    <label>ID Departamento:</label>
                    <input type="number" name="id_departamento" placeholder="ID del departamento">
                    <button type="submit">Guardar Médico</button>
                </form>
            </div>

            <div>
                <h2>Editar Médico</h2>
                <form id="formUpdate">
                    <label>ID a Buscar:</label>
                    <input type="number" id="id_edit" name="id_edit" placeholder="ID del médico" required>
                    <label>Nuevo Nombre:</label>
                    <input type="text" id="nombre_edit" name="nombre_edit">
                    <label>Nueva Especialidad:</label>
                    <input type="text" id="espec_edit" name="espec_edit">
                    <label>Nuevo ID Departamento:</label>
                    <input type="number" id="dept_edit" name="dept_edit">
                    <button type="submit">Actualizar Datos</button>
                </form>
            </div>

            <div style="background: var(--bg-container); padding: 20px; border-radius: 12px; border: 1px solid var(--border-color);">
                <h2>Eliminar Médico</h2>
                <form id="formDelete" style="box-shadow: none; padding: 0; border: none;">
                    <label>ID a Eliminar:</label>
                    <input type="number" id="id_del" name="id_del" placeholder="ID del médico" required>
                    <button type="submit" class="btn-delete-action">Eliminar Médico</button>
                </form>
            </div>
        </div>

        <div class="list-container">
            <h2>Lista de Personal Médico</h2>
            <div id="container"></div>
        </div>
    </main>

    <script>
        // Modo Oscuro
        const modeBtn = document.getElementById('modeBtn');
        modeBtn.addEventListener('click', () => {
            const theme = document.documentElement.getAttribute('data-theme');
            document.documentElement.setAttribute('data-theme', theme === 'dark' ? 'light' : 'dark');
        });

        const URL = 'http://localhost/Certificado/01.Git/Hospital/Proyect_Hospital/REST/public/index.php/medico';

        // Cargar Lista
        function cargarMedicos() {
            fetch(URL).then(r => r.json()).then(data => {
                const cont = document.getElementById('container');
                cont.innerHTML = '';
                data.forEach(m => {
                    cont.innerHTML += `
                    <div class="card_medico">
                        <h3>👨‍⚕️ ${m.nombre} (ID: ${m.id_medico})</h3>
                        <p><strong>🩺 Especialidad:</strong> ${m.especialidad}</p>
                        <p><strong>🏢 Departamento ID:</strong> ${m.id_departamento}</p>
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
            }).then(() => { 
                alert("Médico registrado");
                this.reset(); 
                cargarMedicos(); 
            });
        });

        // Autocompletar para editar
        document.getElementById("id_edit").addEventListener("blur", function () {
            if (this.value) {
                fetch(`${URL}/${this.value}`).then(r => r.json()).then(data => {
                    if (!data.mensaje) {
                        document.getElementById("nombre_edit").value = data.nombre;
                        document.getElementById("espec_edit").value = data.especialidad;
                        document.getElementById("dept_edit").value = data.id_departamento;
                    } else {
                        alert("Médico no encontrado");
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
            }).then(() => { 
                alert("Datos actualizados");
                this.reset(); 
                cargarMedicos(); 
            });
        });

        // Eliminar (DELETE)
        document.getElementById("formDelete").addEventListener("submit", function (e) {
            e.preventDefault();
            const id = document.getElementById("id_del").value;
            if (confirm('¿Estás seguro de eliminar este médico?')) {
                fetch(`${URL}/${id}`, { method: 'DELETE' })
                    .then(() => { 
                        alert("Médico eliminado");
                        this.reset(); 
                        cargarMedicos(); 
                    });
            }
        });

        // Carga inicial
        cargarMedicos();
    </script>
</body>

</html>