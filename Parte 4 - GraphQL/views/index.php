<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Gestión Hospitalaria</title>
    <style>
        body { font-family: sans-serif; text-align: center; background-color: #f4f4f4; }
        h1 { color: #333; }
        .menu { margin-top: 50px; }
        .menu a {
            display: inline-block;
            margin: 15px;
            padding: 20px 40px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 1.2em;
            transition: background-color 0.3s;
        }
        .menu a:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h1>Sistema de Gestión Hospitalaria</h1>
    <div class="menu">
        <a href="citaGQL.php">Gestionar Citas</a>
        <a href="pacienteGQL.php">Gestionar Pacientes</a>
    </div>
</body>
</html>