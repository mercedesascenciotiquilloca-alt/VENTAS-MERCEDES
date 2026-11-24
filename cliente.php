
<?php
require_once "../modelos/Cliente.php";

$cliente = new Cliente();

$accion = isset($_GET["op"]) ? $_GET["op"] : "";

switch ($accion) {

    case "listar":
        $respuesta = $cliente->listar();
        echo json_encode($respuesta);
        break;

    case "agregar":
        $nombre = $_POST["nombre"] ?? "";
        $documento = $_POST["documento"] ?? null;
        $telefono = $_POST["telefono"] ?? null;
        $correo = $_POST["correo"] ?? null;
        $direccion = $_POST["direccion"] ?? null;

        $respuesta = $cliente->agregar([
            "nombre" => $nombre,
            "documento" => $documento,
            "telefono" => $telefono,
            "correo" => $correo,
            "direccion" => $direccion
        ]);

        echo json_encode($respuesta);
        break;

    case "editar":
        $respuesta = $cliente->editar([
            "id" => $_POST["id"] ?? 0,
            "nombre" => $_POST["nombre"] ?? "",
            "documento" => $_POST["documento"] ?? null,
            "telefono" => $_POST["telefono"] ?? null,
            "correo" => $_POST["correo"] ?? null,
            "direccion" => $_POST["direccion"] ?? null
        ]);

        echo json_encode($respuesta);
        break;

    case "cambiarEstado":
        $id = $_POST["id"] ?? 0;
        $estado = $_POST["estado"] ?? "Inactivo";

        $respuesta = $cliente->cambiarEstado($id, $estado);
        echo json_encode($respuesta);
        break;
}
