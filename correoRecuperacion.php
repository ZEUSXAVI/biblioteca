<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <?php include 'styles.php'; // Incluir estilos 
    ?>
</head>

<body>
    <main>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Recuperación de Contraseña</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="correo.php">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Ingresa un Correo electrónico para recuperar tu contraseña</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Enviar código de recuperación</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <?php include 'scripts.php'; // Incluir scripts 
    ?>
</body>

</html>