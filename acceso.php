
<?php

session_start();

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../modelos/Acceso.php';

try {

    $accion = $_POST['accion'] ?? '';

    if ($accion === 'login') {

        $usuario = trim($_POST['usuario'] ?? '');
        $clave = $_POST['clave'] ?? '';

        if ($usuario === '' || $clave === '') {
            echo json_encode([
                'ok' => false,
                'mensaje' => 'Completa el usuario y la contraseña.'
            ]);
            exit;
        }

        $modelo = new Acceso();
        $resultado = $modelo->iniciarSesion($usuario, $clave);

        if ($resultado['ok']) {

            session_regenerate_id(true);

            $_SESSION['idusuario'] = $resultado['usuario']['idusuario'];
            $_SESSION['nombre'] = $resultado['usuario']['nombre'];
            $_SESSION['usuario'] = $resultado['usuario']['usuario'];
            $_SESSION['logueado'] = true;

            echo json_encode([
                'ok' => true,
                'mensaje' => 'Bienvenido al sistema.'
            ]);
            exit;
        }

        echo json_encode($resultado);
        exit;
    }

    echo json_encode([
        'ok' => false,
        'mensaje' => 'Acción no válida.'
    ]);

} catch (Exception $e) {

    error_log($e->getMessage());

    echo json_encode([
        'ok' => false,
        'mensaje' => 'Ocurrió un error al iniciar sesión.'
    ]);
}
