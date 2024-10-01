<?php
include('conexion.php');
$conexion = conexion();

// verificamos que haya una session
session_start();
if (isset($_SESSION['idUsuario'])) {

    $idUsuario = $_SESSION['idUsuario'];
    echo "EXISTE UN USUARIO";
}else{
    echo "NO SE PUEDE JEFE :C";
}

$sql = "SELECT * FROM usuarios WHERE idUsuario = '$idUsuario'";

$resultado = $conexion->query($sql);

$usuario = $resultado->fetch_assoc();

print_r($usuario);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <?php include 'styles.php'; // Incluir estilos ?>
</head>

<body>

    <?php include 'navbar.php'; // Incluir navbar ?>
    <main>
        



    </main>
    <?php include 'scripts.php'; // Incluir scripts ?>
</body>

</html>