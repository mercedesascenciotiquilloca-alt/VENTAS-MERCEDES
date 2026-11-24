
<?php
header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . "/../modelos/Compra.php";

try {
    $compra = new Compra();
    $accion = $_GET["accion"] ?? $_POST["accion"] ?? "";

    switch ($accion) {

        case "datos":
            echo json_encode([
                "success" => true,
                "data" => $compra->obtenerDatos()
            ]);
            break;

        case "listar":
            echo json_encode([
                "success" => true,
                "data" => $compra->listar()
            ]);
            break;

        case "registrar":
            $proveedorId = (int)($_POST["proveedor_id"] ?? 0);
            $comprobante = $_POST["comprobante"] ?? "";
            $detalles = json_decode($_POST["detalles"] ?? "[]", true);

            if (!is_array($detalles)) {
                throw new Exception("Los detalles de la compra no son válidos.");
            }

            $resultado = $compra->registrar(
                $proveedorId,
                $comprobante,
                $detalles
            );

            echo json_encode([
                "success" => true,
                "mensaje" => "Compra registrada y stock actualizado correctamente.",
                "data" => $resultado
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
