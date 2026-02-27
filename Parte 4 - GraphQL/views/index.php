<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Gestión Hospitalaria - HRUM</title>
    <style>
        /* VARIABLES INSTITUCIONALES */
        :root {
            --bg-body: #f1f5f9;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --primary-blue: #007dc5;
            --secondary-blue: #005a8e;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] {
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --text-main: #f8fafc;
            --primary-blue: #38bdf8;
            --shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5);
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* LOGO Y TÍTULO */
        .header-main {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-vertical {
            height: 150px; /* Más grande para el index */
            width: auto;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        [data-theme="dark"] .logo-vertical {
            filter: brightness(0.9) contrast(1.1);
            background: white;
            padding: 10px;
            border-radius: 12px;
        }

        h1 {
            font-size: 1.8rem;
            color: var(--primary-blue);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
        }

        /* MENÚ DE ACCESO */
        .menu {
            display: flex;
            gap: 25px;
            perspective: 1000px;
        }

        .menu a {
            background-color: var(--bg-card);
            color: var(--primary-blue);
            text-decoration: none;
            padding: 40px 60px;
            border-radius: 20px;
            font-size: 1.3em;
            font-weight: bold;
            border: 2px solid var(--primary-blue);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .menu a:hover {
            background-color: var(--primary-blue);
            color: white;
            transform: translateY(-10px);
        }

        /* BOTÓN MODO OSCURO FLOTANTE */
        .theme-switch {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: var(--bg-card);
            border: 1px solid var(--primary-blue);
            color: var(--primary-blue);
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: var(--shadow);
        }

        footer {
            position: fixed;
            bottom: 20px;
            font-size: 0.8rem;
            opacity: 0.7;
        }
    </style>
</head>
<body>

    <button class="theme-switch" id="themeBtn">🌓 Cambiar Modo</button>

    <div class="header-main">
        <img src="https://www.vectorlogo.es/wp-content/uploads/2023/01/logo-vector-hospital-regional-universitario-de-malaga-vertical.jpg" 
             alt="Logo Hospital Regional Málaga" class="logo-vertical">
        <h1>Sistema de Gestión Clínica</h1>
    </div>

    <div class="menu">
        <a href="citaGQL.php">
            <span>📅</span>
            Gestionar Citas
        </a>
        <a href="pacienteGQL.php">
            <span>👥</span>
            Gestionar Pacientes
        </a>
    </div>

    <footer>
        Hospital Regional Universitario de Málaga © 2026
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