
<?php
include('conexion.php');
$conexion = conexion();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['pasword'];

    //Mostrar datos recibidos por el metodo POST
    echo "Email: " . $email . "<br>";
    echo "Password: " . $password . "<br>";
    echo "-------------------<br>";

    //$consulta = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    // Consulta para verificar si el usuario existe
    $sql = "SELECT * FROM usuarios WHERE email LIKE '$email'";

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        // Obtener los datos del usuario
        $usuario = $resultado->fetch_assoc();

        $hash1 = password_hash($password, PASSWORD_DEFAULT);

        $hash2 = password_hash($usuario['contraseña'], PASSWORD_DEFAULT);

        echo "Constraseñas".$usuario['contraseña']." - ". $password. " - ".$hash2." - ".$hash1;

        // Verificar si la contraseña es correcta
        //password_verify: (123,jhsfdhjfvbsdjhbfshjbs)
        if (password_verify($password, $hash2)) {
            // Inicio de sesión exitoso
            session_start();
            $_SESSION['user_id'] = $usuario['idUsuario'];
            echo "Inicio de sesión exitoso";
            // Redirige al usuario a una página protegida, si es necesario
            header('Location: dashboard.php');
        } else {
            echo "Contraseña incorrecta";
        }

    }else{
        echo "Correo incorrecto o la constraseña mal escrita";
    }

}else{
    echo "No se recibieron datos";
}

?>