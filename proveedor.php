
<?php
header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . "/../modelos/Proveedor.php";

try {
    $proveedor = new Proveedor();
    $accion = $_GET["accion"] ?? $_POST["accion"] ?? "";

    switch ($accion) {

        case "listar":
            echo json_encode([
                "success" => true,
                "data" => $proveedor->listar()
            ]);
            break;

        case "agregar":
        case "editar":

            $datos = [
                "id" => $_POST["id"] ?? null,
                "nombre" => trim($_POST["nombre"] ?? ""),
                "documento" => trim($_POST["documento"] ?? ""),
                "telefono" => trim($_POST["telefono"] ?? ""),
                "correo" => trim($_POST["correo"] ?? ""),
                "direccion" => trim($_POST["direccion"] ?? "")
            ];

            if ($datos["nombre"] === "") {
                throw new Exception("El nombre del proveedor es obligatorio.");
            }

            if ($accion === "agregar") {
                $resultado = $proveedor->agregar($datos);
                $mensaje = "Proveedor registrado correctamente.";
            } else {
                if (!$datos["id"]) {
                    throw new Exception("ID de proveedor no válido.");
                }

                $resultado = $proveedor->editar($datos);
                $mensaje = "Proveedor actualizado correctamente.";
            }

            if (!$resultado) {
                throw new Exception("No se pudo guardar el proveedor.");
            }

            echo json_encode([
                "success" => true,
                "mensaje" => $mensaje
            ]);
            break;

        case "cambiarEstado":

            $id = (int)($_POST["id"] ?? 0);
            $estado = $_POST["estado"] ?? "";

            if ($id <= 0 || !in_array($estado, ["Activo", "Inactivo"], true)) {
                throw new Exception("Datos no válidos.");
            }

            $proveedor->cambiarEstado($id, $estado);

            echo json_encode([
                "success" => true,
                "mensaje" => "Estado actualizado correctamente."
            ]);
            break;

        default:
            throw new Exception("Acción no válida.");
    }

} catch (Throwable $e) {
    http_response_code(400);

    error_log($e->getMessage());

    echo json_encode([
        "success" => false,
        "mensaje" => $e->getMessage()
    ]);
}
