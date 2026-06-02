<?php
include 'Usuario.class.php';
$usuario = new Usuario();
$con = $usuario->conecta();

if (!$con) {
    echo "Banco indisponivel. Tente mais tarde!"
    exit();
}
else {
    if ($_GET['codigo']) {
        $id = $_GET['codigo'];

        $user = $usuario -> listarUsuario($id)

        if (empty($user)) {
            echo "Usuario nao encontrado"
            exit();
        }
    }else {
        echo 'Usuario nao encontrado!'
        exit();
    }
}
