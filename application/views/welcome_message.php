<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIRP</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <!--<img src="<?= base_url() ?>assets/img/gyglogo.png" alt="" width="120" height="120">-->
                                        <h1 class="h4 text-gray-900 mb-4"> <strong style="font-family: 'Poppins', sans-serif;"">SIPRO</strong> </h1>
                                    </div>
                                    <form class=" form-user" id="form-user">
                                                <div class="form-group">
                                                    <label for="">USUARIO</label>
                                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="*********" name="usuario">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">CONTRASEÑA</label>
                                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="********" name="password">
                                                </div>
                                                <br>
                                                <div class="text-center">
                                                    <p>En caso de error ponerse en contacto con el administrador</p>
                                                </div>

                                                <div id="spinerActividad" class="text-center">
                                                    <div class="spinner-border text-success" role="status">
                                                        <span class="visually-hidden"></span>
                                                    </div>
                                                    <br>
                                                    <span class="visually-hidden text-success">Cargando...</span>
                                                </div>

                                                <button class="btn btn-secondary btn-osw-active" id="btnLogin">
                                                    INICIAR SESION <i class="fas fa-sign-in-alt"></i>
                                                </button>




                                                </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

        <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->

        <script>
            $(document).ready(function() {
                
                $('#spinerActividad').hide();
            });

            $('#btnLogin').on('click', function(e) {
                e.preventDefault();
                var data = $('#form-user').serialize();
                console.log(data);
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>Inicio",
                    data: data,
                    beforeSend: function(data) {
                        $('#spinerActividad').show();
                    },
                    success: function(data) {
                        if (data == 'inactivo') {
                            Swal.fire(
                                'Periodo de carga vencido :(',
                                'La plataforma cuenta con dias especificos para la carga de informacion',
                                'error'
                            )
                            $('#spinerActividad').hide();
                        } else {
                            $('#spinerActividad').hide();
                            if (data == 'user') {
                                alert("Bienvenido");
                                window.location.href = "<?= base_url('Bienvenido') ?>";
                            } else if (data == 'admin') {
                                alert("Bienvenido");
                                window.location.href = "<?= base_url('BienvenidoAdmin') ?>";
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error de autenticacion!',
                                    text: 'Favor de revisar usuario / contraseña',
                                    
                                })
                            }
                        }

                    },
                    error: function(data) {
                        $('#spinerActividad').hide();
                    }
                });

            });
        </script>

</body>

</html>