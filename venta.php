
<?php
header("Content-Type: application/json; charset=utf-8");

require_once "../modelos/Venta.php";

try {
    $venta = new Venta();
    $accion = $_GET["op"] ?? "";

    switch ($accion) {

        case "datos":
            echo json_encode(
                $venta->obtenerDatos(),
                JSON_UNESCAPED_UNICODE
            );
            break;

        case "listar":
            echo json_encode(
                $venta->listar(),
                JSON_UNESCAPED_UNICODE
            );
            break;

        case "registrar":
            $clienteId = $_POST["cliente_id"] ?? null;
            $comprobante = trim($_POST["comprobante"] ?? "");

            $detalles = json_decode(
                $_POST["detalles"] ?? "[]",
                true
            );

            $resultado = $venta->registrar(
                $clienteId,
                $comprobante,
                $detalles
            );

            echo json_encode(
                $resultado,
                JSON_UNESCAPED_UNICODE
            );
            break;

        default:
            echo json_encode([
                "ok" => false,
                "error" => "Acción no válida."
            ]);
            break;
    }

} catch (Throwable $e) {
    http_response_code(500);

    echo json_encode([
        "ok" => false,
        "error" => "Ocurrió un error al procesar la solicitud."
    ]);
}
