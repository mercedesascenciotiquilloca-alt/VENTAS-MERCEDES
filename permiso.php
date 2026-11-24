
<?php
header("Content-Type: application/json; charset=utf-8");

require_once "../modelos/Permiso.php";

try {
    $permiso = new Permiso();
    $accion = $_GET["op"] ?? "";

    switch ($accion) {

        case "datos":
            echo json_encode(
                $permiso->obtenerDatos(),
                JSON_UNESCAPED_UNICODE
            );
            break;

        case "listar":
            $idusuario = (int)($_GET["idusuario"] ?? 0);

            if ($idusuario <= 0) {
                echo json_encode([
                    "ok" => false,
                    "error" => "Selecciona un usuario."
                ]);
                break;
            }

            echo json_encode(
                $permiso->listar($idusuario),
                JSON_UNESCAPED_UNICODE
            );
            break;

        case "guardar":
            $idusuario = (int)($_POST["idusuario"] ?? 0);
            $permisos = json_decode(
                $_POST["permisos"] ?? "[]",
                true
            );

            $resultado = $permiso->guardar(
                $idusuario,
                $permisos
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
        "error" => "Error al procesar los permisos."
    ]);
}
