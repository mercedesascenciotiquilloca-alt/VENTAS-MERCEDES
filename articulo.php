
<?php

require_once __DIR__ . "/../modelos/Articulo.php";

header("Content-Type: application/json; charset=UTF-8");

// Recibir y validar la fotografía
function subirImagen()
{
    if (!isset($_FILES["imagen"]) ||
        $_FILES["imagen"]["error"] === UPLOAD_ERR_NO_FILE) {
        return null;
    }

    if ($_FILES["imagen"]["error"] !== UPLOAD_ERR_OK) {
        throw new Exception("No se pudo recibir la fotografía.");
    }

    $archivo = $_FILES["imagen"];

    // Tamaño máximo: 5 MB
    if ($archivo["size"] > 5 * 1024 * 1024) {
        throw new Exception("La fotografía no debe superar los 5 MB.");
    }

    // Comprobar el tipo real del archivo
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($archivo["tmp_name"]);

    $formatos = [
        "image/jpeg" => "jpg",
        "image/png"  => "png",
        "image/webp" => "webp"
    ];

    if (!isset($formatos[$mime])) {
        throw new Exception("Solo se permiten imágenes JPG, PNG o WEBP.");
    }

    // Carpeta donde se guardarán las fotografías
    $carpeta = __DIR__ . "/../public/img/productos/";

    if (!is_dir($carpeta)) {
        if (!mkdir($carpeta, 0755, true) && !is_dir($carpeta)) {
            throw new Exception("No se pudo crear la carpeta de fotografías.");
        }
    }

    if (!is_writable($carpeta)) {
        throw new Exception("La carpeta de fotografías no tiene permisos de escritura.");
    }

    // Nombre único para evitar reemplazar fotografías
    $nombreArchivo = bin2hex(random_bytes(16)) . "." . $formatos[$mime];

    $destino = $carpeta . $nombreArchivo;

    if (!move_uploaded_file($archivo["tmp_name"], $destino)) {
        throw new Exception("No se pudo guardar la fotografía.");
    }

    return "../public/img/productos/" . $nombreArchivo;
}

try {

    $articulo = new Articulo();

    $accion = $_POST["accion"] ?? $_GET["accion"] ?? "listar";

    // Obtener variantes
    $variantes = [];

    if (isset($_POST["variantes"])) {

        if (is_array($_POST["variantes"])) {
            $variantes = $_POST["variantes"];
        } else {
            $variantes = json_decode($_POST["variantes"], true);

            if (!is_array($variantes)) {
                throw new Exception("El formato de las variantes no es válido.");
            }
        }

    } else {
        $variantes = $_POST["stock"] ?? 0;
    }

    switch ($accion) {

        // LISTAR
        case "listar":

            $datos = $articulo->listar();

            echo json_encode([
                "success" => true,
                "data" => $datos
            ], JSON_UNESCAPED_UNICODE);

            break;


        // AGREGAR
        case "agregar":

            $codigo = trim($_POST["codigo"] ?? "");
            $nombre = trim($_POST["nombre"] ?? "");
            $categoria = $_POST["categoria"] ?? "";
            $precio = $_POST["precio"] ?? 0;
            $estado = $_POST["estado"] ?? "Activo";

            $imagen = subirImagen();

            $resultado = $articulo->agregar(
                $codigo,
                $nombre,
                $categoria,
                $precio,
                $variantes,
                $estado,
                $imagen
            );

            echo json_encode([
                "success" => $resultado,
                "mensaje" => $resultado
                    ? "Prenda registrada correctamente."
                    : "No se pudo registrar la prenda. Verifica los datos y la categoría."
            ], JSON_UNESCAPED_UNICODE);

            break;


        // EDITAR
        case "editar":

            $id = $_POST["id"] ?? 0;
            $codigo = trim($_POST["codigo"] ?? "");
            $nombre = trim($_POST["nombre"] ?? "");
            $categoria = $_POST["categoria"] ?? "";
            $precio = $_POST["precio"] ?? 0;
            $estado = $_POST["estado"] ?? "Activo";

            // Si no se selecciona otra fotografía, conserva la actual
            $imagen = subirImagen();

            $resultado = $articulo->editar(
                $id,
                $codigo,
                $nombre,
                $categoria,
                $precio,
                $variantes,
                $estado,
                $imagen
            );

            echo json_encode([
                "success" => $resultado,
                "mensaje" => $resultado
                    ? "Prenda actualizada correctamente."
                    : "No se pudo actualizar la prenda. Verifica los datos."
            ], JSON_UNESCAPED_UNICODE);

            break;


        // ELIMINAR
        case "eliminar":

            $id = filter_var(
                $_POST["id"] ?? 0,
                FILTER_VALIDATE_INT
            );

            if (!$id || $id <= 0) {
                throw new Exception("El identificador de la prenda no es válido.");
            }

            $resultado = $articulo->eliminar($id);

            echo json_encode([
                "success" => $resultado,
                "mensaje" => $resultado
                    ? "Prenda eliminada correctamente."
                    : "No se encontró la prenda o no se pudo eliminar."
            ], JSON_UNESCAPED_UNICODE);

            break;


        default:

            http_response_code(400);

            echo json_encode([
                "success" => false,
                "mensaje" => "La acción solicitada no existe."
            ], JSON_UNESCAPED_UNICODE);

            break;
    }

} catch (Throwable $e) {

    error_log("Error en AJAX de artículos: " . $e->getMessage());

    http_response_code(400);

    echo json_encode([
        "success" => false,
        "mensaje" => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
