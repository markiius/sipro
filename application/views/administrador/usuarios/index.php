<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            <h2 class="m-0 "> <strong>Usuarios</strong> </h2>
            <!-- <a id="newUser" class="btn btn-success" href="#" data-toggle="modal" data-target="#userModal"><i class="fas fa-fw fa-plus"></i>Nuevo Usuario</a> -->
            <a id="newUser" href="#" class="btn btn-success btn-sm btn-icon-split" data-toggle="modal" data-target="#userModal">
                <span class="icon text-white-50">
                    <i class="fas fa-fw fa-plus"></i>
                </span>
                <span class="text">Nuevo Usuario</span>
            </a>
            <a id="activarUsuarios" href="#" class="btn btn-info btn-sm btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-lock-open"></i>
                </span>
                <span class="text">ACTIVAR todos los usuarios</span>
            </a>
            <a id="desactivarUsuarios" href="#" class="btn btn-danger btn-sm btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-lock"></i>
                </span>
                <span class="text">DESACTIVAR todos los usuarios</span>
            </a>

        </div>
        <div class="card-body text-dark">
            <div class="table-responsive">
                <table id="mitable" class="table table-sm table-bordered text-dark">
                    <thead class=" text-white" style="font-size: 15px; background-color:#2C2D2D;">
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Unidad</th>
                        <th>Municipio</th>
                        <th>Rol</th>
                        <th>Estatus</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        <?php if ($usuarios) {
                            $x = 1;
                            foreach ($usuarios as $usuario) { ?>
                                <tr>
                                    <td><?= $x ?></td>
                                    <td><?= ucwords(mb_strtolower($usuario->nombre)) ?> <?= ucwords(mb_strtolower($usuario->apellido_paterno)) ?> <?= ucwords(mb_strtolower($usuario->apellido_materno)) ?></td>
                                    <td><?= $usuario->correo ?></td>
                                    <td><?= $usuario->telefono ?></td>
                                    <td><?= $usuario->usuario ?></td>
                                    <td><?= $usuario->password ?></td>
                                    <td><?= ucwords(mb_strtolower($usuario->nombre_unidad)) ?></td>
                                    <td><?= ucwords(mb_strtolower($usuario->NombreMunicipio)) ?></td>
                                    <td><?= ucwords(mb_strtolower($usuario->rol)) ?></td>
                                    <td>
                                        <?php if ($usuario->activo) { ?>
                                            <span class="badge rounded-pill bg-success"> Activo </span>
                                        <?php } else { ?>
                                            <span class="badge rounded-pill bg-danger" color="black"> Inactivo </span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button id="<?= $usuario->id_usuario ?>" onclick="modaUser(<?= $usuario->id_usuario ?>)" class="btn btn-success btn-sm"><i class="fas fa-fw fa-edit"></i>Editar</button>
                                        <button id="<?= $usuario->id_usuario ?>" onclick="deleteUser(<?= $usuario->id_usuario ?>)" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>Eliminar</button>
                                    </td>
                                </tr>
                        <?php $x = $x + 1;
                            }
                        } ?>
                    </tbody>
                    <tfoot>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Unidad</th>
                        <th>Municipio</th>
                        <th>Rol</th>
                        <th>Estatus</th>
                        <th>Opciones</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="container">
                <form id="form-user">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nombreUsuario" class="form-label">NOMBRE(S)</label>
                                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="apellidoPaterno" class="form-label">APELLIDO PATERNO</label>
                                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="apellidoMaterno" class="form-label">APELLIDO MATERNO</label>
                                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="correo" class="form-label">CORREO ELECTRONICO</label>
                                <input type="email" class="form-control" id="correo" name="correo">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">NÚMERO DE TELEFONO</label>
                                <input type="number" class="form-control" id="telefono" name="telefono">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="municipio" class="form-label">MUNICIPIO</label>
                                <select class="form-control" id="municipio" name="municipio">
                                    <option value="selection">SELECCIONAR...</option>
                                    <?php if ($municipios) {
                                        foreach ($municipios as $key => $municipio) { ?>
                                            <option value="<?= $municipio->id_municipio ?>"><?= $municipio->NombreMunicipio ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">USUARIO</label>
                                <input type="text" class="form-control" id="usuario" name="usuario">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="password" class="form-label">CONTRASEÑA</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="unidadResponsable" class="form-label">UNIDAD RESPONSABLE</label>
                                <select class="form-control" id="unidadResponsable" name="unidadResponsable">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <input class="form-check-input" type="checkbox" value="1" id="usuario_obras" name="usuario_obras">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Analitico de Obras
                                </label>
                            </div>
                        </div>

                    </div>

                    <div id="spinerCarga" class="text-center">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                        <br>
                        <span class="visually-hidden text-success">Cargando...</span>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-success btn-insertUser" href="#">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="container">
                <form id="form-userUpdate">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="idUser" name="idUser" hidden>
                            </div>
                            <div class="mb-3">
                                <label for="nombreUsuarioUpdate" class="form-label">NOMBRE(S)</label>
                                <input type="text" class="form-control" id="nombreUsuarioUpdate" name="nombreUsuarioUpdate">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="apellidoPaternoUpdate" class="form-label">APELLIDO PATERNO</label>
                                <input type="text" class="form-control" id="apellidoPaternoUpdate" name="apellidoPaternoUpdate">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="apellidoMaternoUpdate" class="form-label">APELLIDO MATERNO</label>
                                <input type="text" class="form-control" id="apellidoMaternoUpdate" name="apellidoMaternoUpdate">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="correoUpdate" class="form-label">CORREO ELECTRONICO</label>
                                <input type="email" class="form-control" id="correoUpdate" name="correoUpdate">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="telefonoUpdate" class="form-label">NÚMERO DE TELEFONO</label>
                                <input type="number" class="form-control" id="telefonoUpdate" name="telefonoUpdate">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="municipioUpdate" class="form-label">MUNICIPIO</label>
                                <input type="text" class="form-control" id="municipioUpdate" name="municipioUpdate" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="usuarioUpdate" class="form-label">USUARIO</label>
                                <input type="text" class="form-control" id="usuarioUpdate" name="usuarioUpdate">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="passwordUpdate" class="form-label">CONTRASEÑA</label>
                                <input type="text" class="form-control" id="passwordUpdate" name="passwordUpdate">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="unidadResponsableUpdate" class="form-label">UNIDAD RESPONSABLE</label>
                                <input type="text" class="form-control" id="unidadResponsableUpdate" name="unidadResponsableUpdate" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="municipio" class="form-label">STATUS</label>
                                <select class="form-control" id="id_status" name="id_status">
                                    <option value="selection">SELECCIONAR...</option>
                                    <option value="1">ACTIVO</option>
                                    <option value="0">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="cerrarModalUpdate" class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-success btn-updateUser" href="#">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#mitable').DataTable();
        $('#spinerCarga').hide();
    });

    $('#municipio').change(function() {
        var municipio = document.getElementById('municipio');
        var idMunicipio = municipio.options[municipio.selectedIndex].value;
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>UnidadesController/UnidadPorMunicipio",
            data: {
                'idMunicipio': idMunicipio
            },
            beforeSend: function() {},
            success: function(data) {
                $('#unidadResponsable').html("")
                data = JSON.parse(data);
                data.forEach(element => {
                    $('#unidadResponsable').append(
                        '<option value="' + element.id_unidad_responsable + '">' + element.nombre_unidad + '</option>'
                    )
                });
            },
            error: function() {}
        });
    });

    $('.btn-insertUser').on('click', function() {
        $('#spinerCarga').show();
        var nombreUsuario = document.getElementById('nombreUsuario').value;
        var apellidoPaterno = document.getElementById('apellidoPaterno').value;
        var apellidoMaterno = document.getElementById('apellidoMaterno').value;
        var usuario = document.getElementById('usuario').value;
        var password = document.getElementById('password').value;
        var usuario_obras = document.getElementById('usuario_obras').value;
        console.log(usuario_obras);
        if (nombreUsuario && apellidoPaterno && apellidoMaterno && usuario && password) {
            var data = $('#form-user').serialize();

            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>UsuarioController/insertarUsuario",
                data: data,
                beforeSend: function() {},
                success: function(data) {
                    console.log(data);
                    $('#spinerCarga').hide();
                    if (data) {
                        location.reload();
                    } else {
                        alert("error")
                    }
                },
                error: function() {
                    $('#spinerCarga').hide();
                }
            });
        } else {
            alert("Campos faltantes")
            $('#spinerCarga').hide();
        }

    });

    function deleteUser(id) {
        Swal.fire({
            title: "Eliminar Usuario",
            text: "Seguro que deseas eliminar este usuario",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>UsuarioController/eliminarUsuario",
                    data: {
                        'idUsuario': id
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        if (data) {
                            location.reload();
                        } else {
                            alert("error")
                        }
                    },
                    error: function() {}
                });
            }
        })
    }


    function modaUser(id) {
        $('#spinerCarga').hide();
        $('#updateUserModal').modal('show')

        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>UsuarioController/buscarUsuario",
            data: {
                'idUsuario': id
            },
            beforeSend: function() {
                $('#spinerCarga').hide();
            },
            success: function(data) {
                data = JSON.parse(data);
                $('#idUser').val(id);
                $('#nombreUsuarioUpdate').val(data['nombre']);
                $('#apellidoPaternoUpdate').val(data['apellido_paterno']);
                $('#apellidoMaternoUpdate').val(data['apellido_materno']);
                $('#usuarioUpdate').val(data['usuario']);
                $('#passwordUpdate').val(data['password']);
                $('#correoUpdate').val(data['correo']);
                $('#telefonoUpdate').val(data['telefono']);
                $('#unidadResponsableUpdate').val(data['nombre_unidad']);
                $('#municipioUpdate').val(data['NombreMunicipio']);
                $('#id_status').val(data['activo']);
            },
            error: function() {}
        });
    }

    $('.btn-updateUser').on('click', function() {
        $('#spinerCarga').show();
        var nombreUsuario = document.getElementById('nombreUsuarioUpdate').value;
        var apellidoPaterno = document.getElementById('apellidoPaternoUpdate').value;
        var apellidoMaterno = document.getElementById('apellidoMaternoUpdate').value;
        var usuario = document.getElementById('usuarioUpdate').value;
        var password = document.getElementById('passwordUpdate').value;
        if (nombreUsuario && apellidoPaterno && apellidoMaterno && usuario && password) {
            var data = $('#form-userUpdate').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>UsuarioController/actualizarUsuario",
                data: data,
                beforeSend: function() {},
                success: function(data) {
                    $('#spinerCarga').hide();
                    if (data) {
                        location.reload();
                    } else {
                        alert("error")
                    }
                },
                error: function() {
                    $('#spinerCarga').hide();
                }
            });
        } else {
            alert("Campos faltantes")
            $('#spinerCarga').hide();
        }

    });

    $('#cerrarModalUpdate').on('click', function() {
        $('#updateUserModal').modal('hide');
    });

    $('#desactivarUsuarios').on('click', function(e) {
        Swal.fire({
            title: "Desactivar Acceso",
            text: "Deseas desactivar el acceso de todos los usuarios en general ?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Si!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>CambiarStatus",
                    data: {
                        status: 0
                    },
                    success: function(data) {
                        location.reload();
                    }
                })
            }
        })
    });
    $('#activarUsuarios').on('click', function(e) {

        Swal.fire({
            title: "Activar Acceso",
            text: "Deseas Activar el acceso de todos los usuarios en general ?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Si!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>CambiarStatus",
                    data: {
                        status: 1
                    },
                    success: function(data) {
                        console.log(data);
                        location.reload();
                    }
                })
            }
        })
    });
</script>