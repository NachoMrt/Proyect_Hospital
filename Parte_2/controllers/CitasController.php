require_once '../../Parte_1/models/citas.php';

class CitasController {
    public function index() {
        $u = new Usuario();
        $clientes = $u->getAll();
        require 'views/listar.php';
    }
    public function crear() {
        /*  La PRIMERA VEZ :
                NO hay POST -> $_POST está vacío -> El if($_POST) NO entra -> Ejecuta el require
            La SEGUNDA VEZ:
                Ahora SÍ hay POST -> $_POST contiene nombre y email -> El if($_POST) SÍ entra ;
                    Guarda en BD y Redirige al listado
        */
        if($_POST){
            (new Usuario())->save($_POST['id_medico'],$_POST['dia'],$_POST['hora'],$_POST['nombre'],$_POST['dni'],$_POST['id_paciente']);
            header("Location: index.php");
        }
        require 'views/crear.php';
    }
    public function editar() {
        // En DOS pasos como método anterior de crear()
        $u = new Usuario();
        if($_POST){
            $u->update($_POST['nombre'],$_POST['email'],$_POST['clave'],$_POST['edad'],$_POST['id']);
            header("Location: index.php");
        }
        $data = $u->getById($_GET['id']);
        require 'views/editar.php';
    }
    public function eliminar() {
        (new Usuario())->delete($_GET['id']);
        header("Location: index.php");
    }

}