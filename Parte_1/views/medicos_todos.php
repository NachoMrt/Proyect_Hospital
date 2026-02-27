<?php require 'views/header.php'; ?>

<main class="main-content">
    <div class="gestion-header">
        <h1>🩺 Personal Médico</h1>
        <p style="color: var(--verde-oliva);">Hospital Último Aliento - Gestión de Facultativos</p>
    </div>

    <div class="grid-formularios">
        
        <div class="card-medico">
            <h2>➕ Agregar Médico</h2>
            <form id="formCrearMedico">
                <input type="text" name="nombre" class="input-hosp" placeholder="Nombre completo" required>
                <input type="text" name="DNI" class="input-hosp" placeholder="DNI" required>
                <input type="number" name="id_paciente" class="input-hosp" placeholder="ID Paciente (Opcional)">
                <input type="number" name="id_departamento" class="input-hosp" placeholder="ID Departamento">
                <button type="submit" class="btn-accion btn-guardar">Guardar Médico</button>
            </form>
        </div>

        <div class="card-medico" style="border-top-color: var(--azul-oscuro);">
            <h2>🔄 Actualizar Datos</h2>
            <form id="formActualizarMedico">
                <input type="number" name="id_medico" class="input-hosp" placeholder="ID del Médico a editar" required>
                <input type="text" name="nombre" class="input-hosp" placeholder="Nuevo Nombre">
                <input type="text" name="DNI" class="input-hosp" placeholder="Nuevo DNI">
                <button type="submit" class="btn-accion btn-actualizar">Aplicar Cambios</button>
            </form>
        </div>

        <div class="card-medico" style="border-top-color: #ff4d4d;">
            <h2>🗑️ Baja de Médico</h2>
            <p style="font-size: 0.8rem; color: #666;">Introduce el ID para eliminar el registro.</p>
            <input type="number" id="idEliminarMedico" class="input-hosp" placeholder="ID Médico">
            <button onclick="eliminarMedico()" class="btn-accion btn-eliminar">Eliminar Permanentemente</button>
        </div>
    </div>

    <section class="tabla-contenedor" style="padding: 20px; background: white; border-radius: 15px;">
        <h2>Lista de Médicos Activos</h2>
        <ul id="listaMedicos" class="lista-medicos">
            <p style="text-align: center; color: #999;">Cargando personal médico...</p>
        </ul>
    </section>
</main>

<script>
    const API_URL = 'http://localhost/Certificado/REST/public/index.php/medico';

    // Función para Listar
    function cargarMedicos() {
        fetch(API_URL)
            .then(response => response.json())
            .then(data => {
                const lista = document.getElementById('listaMedicos');
                lista.innerHTML = "";
                data.forEach(medico => {
                    lista.innerHTML += `
                        <li class="medico-item">
                            <div class="medico-info">
                                <span class="medico-id">ID: ${medico.id_medico}</span>
                                <strong>${medico.nombre}</strong> | DNI: ${medico.DNI}
                            </div>
                            <div style="font-size: 0.85rem; color: #717332;">
                                Dep: ${medico.id_departamento ?? "General"}
                            </div>
                        </li>
                    `;
                });
            })
            .catch(error => console.error("Error:", error));
    }

    // Evento Crear
    document.getElementById("formCrearMedico").addEventListener("submit", function(e) {
        e.preventDefault();
        fetch(API_URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                nombre: this.nombre.value,
                DNI: this.DNI.value,
                id_paciente: this.id_paciente.value || null,
                id_departamento: this.id_departamento.value || null
            })
        })
        .then(() => { alert("Médico agregado"); cargarMedicos(); this.reset(); });
    });

    // Función Eliminar
    function eliminarMedico() {
        const id = document.getElementById("idEliminarMedico").value;
        if(!id) return alert("Escribe un ID");
        fetch(`${API_URL}/${id}`, { method: 'DELETE' })
        .then(() => { alert("Médico eliminado"); cargarMedicos(); });
    }

    // Carga inicial
    cargarMedicos();
</script>

<?php require 'views/footer.php'; ?>