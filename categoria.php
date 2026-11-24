
<?php

require_once __DIR__ . "/../modelos/Categoria.php";

header("Content-Type: application/json; charset=UTF-8");

try {

    $categoria = new Categoria();

    $accion = $_POST["accion"] ?? $_GET["accion"] ?? "listar";

    switch ($accion) {

        case "listar":

            echo json_encode([
                "success" => true,
                "data" => $categoria->listar()
            ], JSON_UNESCAPED_UNICODE);

            break;

        case "agregar":

            $nombre = trim($_POST["nombre"] ?? "");
            $descripcion = trim($_POST["descripcion"] ?? "");

            if ($nombre === "") {
                throw new Exception("Ingresa el nombre de la categoría.");
            }

            $categoria->agregar($nombre, $descripcion);

            echo json_encode([
                "success" => true,
                "mensaje" => "Categoría registrada correctamente."
            ], JSON_UNESCAPED_UNICODE);

            break;

        case "editar":

            $id = filter_var(
                $_POST["id"] ?? null,
                FILTER_VALIDATE_INT
            );

            $nombre = trim($_POST["nombre"] ?? "");
            $descripcion = trim($_POST["descripcion"] ?? "");

            if (!$id || $nombre === "") {
                throw new Exception("Completa correctamente los datos.");
            }

            $categoria->editar($id, $nombre, $descripcion);

            echo json_encode([
                "success" => true,
                "mensaje" => "Categoría actualizada correctamente."
            ], JSON_UNESCAPED_UNICODE);

            break;

        case "cambiarEstado":

            $id = filter_var(
                $_POST["id"] ?? null,
                FILTER_VALIDATE_INT
            );

            $estado = $_POST["estado"] ?? "";

            if (!$id || !in_array($estado, ["Activo", "Inactivo"], true)) {
                throw new Exception("Datos de estado incorrectos.");
            }

            $categoria->cambiarEstado($id, $estado);

            echo json_encode([
                "success" => true,
                "mensaje" => "Estado actualizado correctamente."
            ], JSON_UNESCAPED_UNICODE);

            break;

        default:

            http_response_code(400);

            echo json_encode([
                "success" => false,
                "mensaje" => "Acción no encontrada."
            ], JSON_UNESCAPED_UNICODE);

            break;
    }

} catch (Throwable $e) {

    error_log("Error en categorías: " . $e->getMessage());

    http_response_code(400);

    echo json_encode([
        "success" => false,
        "mensaje" => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
