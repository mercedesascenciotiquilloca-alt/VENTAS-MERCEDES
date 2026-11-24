
<?php
header("Content-Type: application/json; charset=utf-8");

require_once "../modelos/Usuario.php";

try {
    $usuario = new Usuario();
    $accion = $_GET["op"] ?? "";

    switch ($accion) {

        case "listar":
            echo json_encode($usuario->listar(), JSON_UNESCAPED_UNICODE);
            break;

        case "agregar":
            if (
                empty($_POST["nombre"]) ||
                empty($_POST["usuario"]) ||
                empty($_POST["clave"])
            ) {
                echo json_encode(["error" => "Completa los campos obligatorios."]);
                break;
            }

            $resultado = $usuario->agregar($_POST);

            echo json_encode(
                $resultado
                    ? ["ok" => true, "mensaje" => "Usuario registrado correctamente."]
                    : ["ok" => false, "error" => "No se pudo registrar. Verifica que el usuario no exista."]
            );
            break;

        case "editar":
            if (
                empty($_POST["id"]) ||
                empty($_POST["nombre"]) ||
                empty($_POST["usuario"])
            ) {
                echo json_encode(["error" => "Completa los campos obligatorios."]);
                break;
            }

            $resultado = $usuario->editar($_POST);

            echo json_encode(
                $resultado
                    ? ["ok" => true, "mensaje" => "Usuario actualizado correctamente."]
                    : ["ok" => false, "error" => "No se pudo actualizar el usuario."]
            );
            break;

        case "cambiarEstado":
            $resultado = $usuario->cambiarEstado(
                $_POST["id"] ?? 0,
                $_POST["estado"] ?? ""
            );

            echo json_encode(
                $resultado
                    ? ["ok" => true]
                    : ["ok" => false, "error" => "No se pudo cambiar el estado."]
            );
            break;

        default:
            echo json_encode(["error" => "Acción no válida."]);
            break;
    }

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(["error" => "Error al procesar la solicitud."]);
}
