
<?php
// Activar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../modelos/Modulos.php";

$modulos = new Modulos();

$idmodulo = isset($_POST["idmodulo"]) ? limpiarCadena($_POST["idmodulo"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$estado = isset($_POST["estado"]) ? limpiarCadena($_POST["estado"]) : "";

switch ($_GET["op"] ?? "") {

    case "guardaryeditar":

        if (empty($idmodulo)) {
            $respuesta = $modulos->insertar($nombre, $descripcion);
            echo $respuesta ? "Módulo registrado correctamente" : "No se pudo registrar el módulo";
        } else {
            $respuesta = $modulos->editar($idmodulo, $nombre, $descripcion, $estado);
            echo $respuesta ? "Módulo actualizado correctamente" : "No se pudo actualizar el módulo";
        }

    break;

    case "desactivar":

        $respuesta = $modulos->desactivar($idmodulo);
        echo $respuesta ? "Módulo desactivado correctamente" : "Error al desactivar";

    break;

    case "activar":

        $respuesta = $modulos->activar($idmodulo);
        echo $respuesta ? "Módulo activado correctamente" : "Error al activar";

    break;

    case "mostrar":

        $respuesta = $modulos->mostrar($idmodulo);
        echo json_encode($respuesta);

    break;

    case "listar":

        $respuesta = $modulos->listar();

        $data = [];

        while ($reg = $respuesta->fetch_object()) {
            $data[] = [
                "0" => $reg->nombre,
                "1" => $reg->descripcion,
                "2" => $reg->estado
            ];
        }

        echo json_encode([
            "data" => $data
        ]);

    break;
}
