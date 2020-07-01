
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">


</head>

<body>

    <div class="modal-dialog text-center">
        <div class="col-sm-10 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="assets/images/Avatar.png" alt="Avatar">
                </div>
                <form class="col-12">

                    <h3>Inicio de Sesiòn</h3>
                    <div class="form-group" id="user-group">

                        <input type="text" class="form-control" placeholder="Nombre de usuario">
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-sign-in-alt"></i> Ingresar</button>
                </form>

                <div class="col-12 forgot">
                    <a href="#">Recordar contraseña</a>
                </div>
            </div>
        </div>


        <script src="{{asset('assets/plugins/jquery/js/jquery.min.js')}}"></script>
        <script src="{{asset('assset/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>



