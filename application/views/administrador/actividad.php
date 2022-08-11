<div class="container-fluid">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <?php $id_componente = 0 ?>
                    <?php foreach ($componente as $key => $value) : ?>

                        <?php $id_componente = $value->id_componente ?>

                        NOMBRE DEL PROGRAMA PRESUPUESTARIO: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $programa->nombre_programa ?></span><br>
                        OBJETIVO / FIN DEL PROGRAMA PRESUPUESTARIO: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $programa->objetivo_programa ?></span> <br>
                        NOMBRE DE COMPONENTE : <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $value->nombre_componente ?></span> <br>
                        NUMERO DE COMPONENTE : <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $value->numero_componente ?></span>
                        <hr>
                        <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">
                            AGREGAR ACTIVIDADES
                        </div>
                        <br>

                        <form id="form-actividad">
                            <div class="row">
                                <input type="text" id="componente" name="id_componente" value="<?= $value->id_componente ?>" hidden>
                                <input type="text" id="programa" name="id_programa" value="<?= $value->id_programa ?>" hidden>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">NUMERO DE ACTIVIDAD</label>
                                        <input type="number" class="form-control" id="numero_actividad" name="numero_actividad" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">Escribir el numero del componente</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">NOMBRE DE ACTIVIDAD</label>
                                        <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">Describe el nombre del componente</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">UNIDAD DE MEDIDA</label>
                                        <textarea class="form-control" id="unidad_medida" name="unidad_medida"></textarea>
                                        <div id="emailHelp" class="form-text">Redactar el resumen narrativo</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">AREA RESPONSABLE</label>
                                        <select class="form-control" id="id_usuario" name="id_usuario" aria-label="Default select example">
                                            <option selected>Seleccionar</option>
                                            <?php foreach ($areas as $key => $area) : ?>
                                                <option value="<?= $area->id_usuario ?>"><?= $area->nombre_unidad ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div id="spinerCarga" class="text-center">
                                <div class="spinner-border text-success" role="status">
                                    <span class="visually-hidden"></span>
                                </div>
                                <br>
                                <span class="visually-hidden text-success">Cargando...</span>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-secondary btn-sm btn-osw-active" id="btnGuardarActividad">AGREGAR ACTIVIDAD <i class="fas fa-pen-square"></i></button>
                            </div>


                        </form>
                    <?php endforeach; ?>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <?php foreach ($componente as $key => $value) : ?>

                        <span style="font-weight: bold; text-emphasis-color: black; color:black"> LISTA DE ACTIVIDADES</span>

                    <?php endforeach; ?>

                    <div class="table-responsive">
                        <table id="mitable" class="table table-sm table-bordered text-dark">
                            <thead class=" text-white" style="font-size: 15px; background-color:#2C2D2D;">
                                <th>#</th>
                                <th>NUMERO ACTIVIDAD</th>
                                <th>NOMBRE ACTIVIDAD </th>
                                <th>UNIDAD DE MEDIDA</th>
                                <td>UNIDAD RESPONSABLE</td>
                                <td>NOMBRE RESPONSABLE</td>
                                <th>CALENDARIOS</th>
                                <th>MODIFICAR</th>
                                <th>ELIMINAR</th>
                            </thead>
                            <tbody>
                                <?php $cont = 1 ?>
                                <?php foreach ($actividades as $key => $actividad) : ?>
                                    <tr>
                                        <td><?= $cont ?></td>
                                        <td><?= $actividad->numero_actividad ?></td>
                                        <td><?= $actividad->nombre_actividad ?></td>
                                        <td><?= $actividad->unidad_medida ?></td>
                                        <td><?= $actividad->nombre_unidad ?></td>
                                        <td><?= $actividad->nombre ?> <?= $actividad->apellido_paterno ?> <?= $actividad->apellido_materno ?> </td>
                                        <td><a href="<?= base_url('') ?>Actividad/Fecha/<?= $programa->id_programa ?>/<?= $id_componente ?>/<?= $actividad->id_actividad ?>" class="btn btn-success btn-sm"><i class="fas fa-id-badge"></i></a></td>
                                        <td><button class="btn btn-warning btn-sm" onclick="modalModificarActividad(<?= $actividad->id_actividad ?>)" data-bs-toggle="modal" data-bs-target="#modalUpdate"><i class="far fa-edit"></i></button></td>
                                        <td><button class="btn btn-danger btn-sm" onclick="eliminarActividad(<?= $actividad->id_actividad ?>)"><i class="fas fa-trash-alt"></i></button></td>
                                    </tr>
                                    <?php $cont++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <th>#</th>
                                <th>NUMERO ACTIVIDAD</th>
                                <th>NOMBRE ACTIVIDAD </th>
                                <th>UNIDAD DE MEDIDA</th>
                                <td>UNIDAD RESPONSABLE</td>
                                <td>NOMBRE RESPONSABLE</td>
                                <th>CALENDARIOS</th>
                                <th>MODIFICAR</th>
                                <th>ELIMINAR</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    <br>x
</div>
</div>

<!-- MODAL UPDATE PROGRAMA -->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MODIFICAR ACTIVIDAD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-actividad-update">
                    <div class="row">
                        <input type="text" id="id_actividad_m" name="id_actividad" hidden>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">NUMERO DE ACTIVIDAD</label>
                                <input type="number" class="form-control" id="numero_actividad_m" name="numero_actividad" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Escribir el numero del componente</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">NOMBRE DE ACTIVIDAD</label>
                                <input type="text" class="form-control" id="nombre_actividad_m" name="nombre_actividad" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Describe el nombre del componente</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">UNIDAD DE MEDIDA</label>
                                <textarea class="form-control" id="unidad_medida_m" name="unidad_medida"></textarea>
                                <div id="emailHelp" class="form-text">Redactar el resumen narrativo</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">AREA RESPONSABLE</label>
                                <select class="form-control" id="id_usuario_m" name="id_usuario" aria-label="Default select example">
                                    <option selected>Seleccionar</option>
                                    <?php foreach ($areas as $key => $area) : ?>
                                        <option value="<?= $area->id_usuario ?>"><?= $area->nombre_unidad ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="spinerCargaModal" class="text-center">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                        <br>
                        <span class="visually-hidden text-success">Cargando...</span>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-success btn-sm " data-bs-toggle="modal" data-bs-target="#actividad" id="btnModificarActividad">MODIFICAR ACTIVIDAD <i class="fas fa-pen-square"></i></button>
                    </div>


                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#spinerCarga').hide();
            $('#componente').hide();
        });
        $('#btnGuardarActividad').on('click', function(e) {
            e.preventDefault();
            var data = $('#form-actividad').serialize();
            var numero_actividad = $('#numero_actividad').val();
            var nombre_actividad = $('#nombre_actividad').val();
            var unidad_medida = $('#unidad_medida').val();
            var id_usuario = $('#id_usuario').val();

            if (!numero_actividad == '' && !nombre_actividad == '' && !unidad_medida == '' && !id_usuario == '') {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>Actividad/Nuevo",
                    data: data,
                    beforeSend: function() {
                        $('#spinerCarga').show();
                    },
                    success: function(data) {
                        if (data = true) {
                            mensaje("success", "Buen trabajo!", "Agregado correctamente :)");
                        } else {

                        }

                    },
                    error: function() {
                        $('#spinerCarga').hide();
                    }
                });
            } else {
                mensaje("error", "Campos incompletos", "La informacion requerida no esta completa, favor de revisar los campos");
            }

        });

        function modalModificarActividad(id_actividad) {

            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Obtener/Actividad",
                data: {
                    id_actividad: id_actividad
                },
                beforeSend: function() {},
                success: function(data) {
                    data = JSON.parse(data);
                    $('#id_actividad_m').val(data['id_actividad']);
                    $('#numero_actividad_m').val(data['numero_actividad']);
                    $('#nombre_actividad_m').val(data['nombre_actividad']);
                    $('#unidad_medida_m').val(data['unidad_medida']);
                    $('#id_usuario_m').val(data['id_usuario']);
                    $('#spinerCargaModal').hide();
                },
                error: function() {}
            })
        }

        $('#btnModificarActividad').on('click', function(e) {
            e.preventDefault();
            var data = $('#form-actividad-update').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Modificar/Actividad",
                data: data,
                beforeSend: function() {},
                success: function(data) {
                    location.reload();
                },
                error: function() {

                }

            })
        });

        function mensaje(icon, titulo, texto) {
            Swal.fire({
                title: titulo,
                text: texto,
                icon: icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            })

        }

        function mensajeCarga(icon, titulo, texto) {
            Swal.fire({
                title: titulo,
                text: texto,
                icon: icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            })

        }

        function eliminarActividad(id_actividad) {
            Swal.fire({
                title: "Eliminar Actividad",
                text: "Si elimina esta actividad se cancelara la calendarizacion de la misma",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: "POST",
                        url: "<?= base_url()?>Eliminar/Actividad",
                        data:{
                            id_actividad: id_actividad
                        },
                        success:function(data){
                            if(data == true){
                                alert("registro eliminado correctamente");
                                location.reload();
                            }else{
                                alert("no se elimino nada :(");
                            }
                        }
                    })

                }
            })
        }
    </script>