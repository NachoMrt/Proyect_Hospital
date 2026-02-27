<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - Hospital Regional</title>
    <style>
        /* VARIABLES DE DISEÑO UNIFICADAS */
        :root {
            --bg-body: #f1f5f9;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --primary-blue: #007dc5;
            --secondary-blue: #005a8e;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] {
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --text-main: #f8fafc;
            --primary-blue: #38bdf8;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            margin: 0;
            transition: all 0.3s ease;
            text-align: center;
        }

        /* NAVEGACIÓN ESTILO APP */
        nav {
            background-color: var(--bg-card);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow);
            border-bottom: 3px solid var(--primary-blue);
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-nav {
            height: 45px;
            width: auto;
        }

        [data-theme="dark"] .logo-nav {
            filter: brightness(0.9) contrast(1.1);
            background: white;
            padding: 2px;
            border-radius: 4px;
        }

        .nav-links a {
            color: var(--text-main);
            text-decoration: none;
            margin: 0 15px;
            font-weight: 600;
            padding: 8px 12px;
            border-radius: 6px;
            transition: background 0.2s;
        }

        .nav-links a:hover {
            background-color: var(--primary-blue);
            color: white;
        }

        /* CONTENIDO */
        .container {
            margin-top: 80px;
            padding: 20px;
        }

        .welcome-card {
            background: var(--bg-card);
            display: inline-block;
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            max-width: 600px;
        }

        h1 {
            color: var(--primary-blue);
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .theme-switch {
            background: var(--bg-body);
            border: 1px solid var(--primary-blue);
            color: var(--primary-blue);
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }

        footer {
            margin-top: 50px;
            font-size: 0.85rem;
            opacity: 0.6;
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-brand">
            <img src="https://www.vectorlogo.es/wp-content/uploads/2023/01/logo-vector-hospital-regional-universitario-de-malaga-vertical.jpg" 
                 alt="Hospital Málaga" class="logo-nav">
            <span style="font-weight: bold; color: var(--primary-blue);">HRUM</span>
        </div>
        
        <div class="nav-links">
            <a href="citas.php">📅 Citas</a>
            <a href="pacientes.php">👥 Pacientes</a>
            <a href="medicos.php">👨‍⚕️ Médicos</a>
            <button class="theme-switch" id="themeBtn">🌓</button>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-card">
            <h1>Sistema de Gestión Clínica</h1>
            <p>Bienvenido al panel central. Por favor, utilice el menú superior para acceder a los distintos módulos del hospital.</p>
            <hr style="border: 0; border-top: 1px solid var(--primary-blue); opacity: 0.2; margin: 25px 0;">
            <p style="font-style: italic; font-size: 0.9em;">Acceso restringido a personal autorizado.</p>
        </div>
    </div>

    <footer>
        Hospital Regional Universitario de Málaga &copy; 2026
    </footer>

    <script>
        const btn = document.getElementById('themeBtn');
        btn.addEventListener('click', () => {
            const theme = document.documentElement.getAttribute('data-theme');
            if (theme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'light');
            } else {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        });
    </script>
</body>
</html>