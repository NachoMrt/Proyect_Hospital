<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Médicos</title>
</head>
<body>


  <!-- LISTAR MÉDICOS -->
  

  <h1>Lista de Médicos</h1>
  <ul id="listaMedicos"></ul>

  <script>
    fetch('http://localhost/Certificado/REST/public/index.php/medico')
      .then(response => response.json())
      .then(data => {
        const lista = document.getElementById('listaMedicos');
        lista.innerHTML = "";

        data.forEach(medico => {
          lista.innerHTML += `
            <li>
              ID: ${medico.id_medico} |
              Nombre: ${medico.nombre} |
              DNI: ${medico.DNI} |
              ID Paciente: ${medico.id_paciente ?? "Sin asignar"} |
              ID Departamento: ${medico.id_departamento ?? "Sin asignar"}
            </li>
          `;
        });
      })
      .catch(error => console.error("Error:", error));
  </script>


 
  <!-- CREAR MÉDICO -->
  
  <h2>Agregar Médico</h2>

  <form id="formCrearMedico">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="DNI" placeholder="DNI" required>
    <input type="number" name="id_paciente" placeholder="ID Paciente">
    <input type="number" name="id_departamento" placeholder="ID Departamento">
    <button type="submit">Guardar</button>
  </form>

  <script>
    document.getElementById("formCrearMedico").addEventListener("submit", function(e) {
      e.preventDefault();

      fetch('http://localhost/Certificado/REST/public/index.php/medico', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          nombre: this.nombre.value,
          DNI: this.DNI.value,
          id_paciente: this.id_paciente.value || null,
          id_departamento: this.id_departamento.value || null
        })
      })
      .then(response => response.json())
      .then(data => {
        alert("Médico agregado correctamente");
        location.reload();
      })
      .catch(error => console.error("Error:", error));
    });
  </script>


  
  <!-- ACTUALIZAR MÉDICO -->
  
  <h2>Actualizar Médico</h2>

  <form id="formActualizarMedico">
    <input type="number" name="id_medico" placeholder="ID Médico" required>
    <input type="text" name="nombre" placeholder="Nuevo Nombre" required>
    <input type="text" name="DNI" placeholder="Nuevo DNI" required>
    <input type="number" name="id_paciente" placeholder="ID Paciente">
    <input type="number" name="id_departamento" placeholder="ID Departamento">
    <button type="submit">Actualizar</button>
  </form>

  <script>
    document.getElementById("formActualizarMedico").addEventListener("submit", function(e) {
      e.preventDefault();
      const id = this.id_medico.value;

      fetch(`http://localhost/Certificado/REST/public/index.php/medico/${id}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          nombre: this.nombre.value,
          DNI: this.DNI.value,
          id_paciente: this.id_paciente.value || null,
          id_departamento: this.id_departamento.value || null
        })
      })
      .then(response => response.json())
      .then(data => {
        alert("Médico actualizado correctamente");
        location.reload();
      })
      .catch(error => console.error("Error:", error));
    });
  </script>


  
  <!-- DELETE: ELIMINAR MÉDICO -->
  
  <h2>Eliminar Médico</h2>

  <input type="number" id="idEliminarMedico" placeholder="ID Médico">
  <button onclick="eliminarMedico()">Eliminar</button>

  <script>
    function eliminarMedico() {
      const id = document.getElementById("idEliminarMedico").value;

      fetch(`http://localhost/Certificado/REST/public/index.php/medico/${id}`, {
        method: 'DELETE'
      })
      .then(response => response.json())
      .then(data => {
        alert("Médico eliminado correctamente");
        location.reload();
      })
      .catch(error => console.error("Error:", error));
    }
  </script>

</body>
</html>