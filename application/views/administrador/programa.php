<div class="container-fluid">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <?php foreach ($municipio as $key => $value) : ?>


                        <div class="text-lg font-weight-bold text-secondary text-uppercase mb-1">
                            MUNICIPIO DE <?= $value->NombreMunicipio ?></div>

                        EN ESTE APARTADO SE CONSTRUIRA EL REPORTE DE ACTIVIDADES
                        <div><br></div>

                        <form id="form-programa">
                            <div class="row">
                                <input id="idmunicipio" name="id_municipio" value="<?= $value->id_municipio ?>">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">NOMBRE DE PROGRAMA</label>
                                        <input type="email" class="form-control" id="nombre_programa" name="nombre_programa" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">Describir el nombre del programa presupuestario</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">OBJETIVO DE PROGRAMA</label>
                                        <textarea class="form-control" id="objetivo_programa" name="objetivo_programa"></textarea>
                                        <div id="emailHelp" class="form-text">Redactar el objetivo del programa presupuestario.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">EJERCICIO FISCAL</label>
                                        <select class="form-control" aria-label="Default select example" id="ejercicio_fiscal" name="ejercicio_fiscal">
                                            <option value="">SELECCIONAR...</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
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
                                <button class="btn btn-sm btn-secondary btn-osw-active" data-bs-toggle="modal" data-bs-target="#actividad" id="btnGuardarPrograma">GUARDAR INFORMACION DE PROGRAMA <i class="fas fa-pen-square"></i></button>
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
                    <div class="text-md font-weight-bold text-secondary text-uppercase mb-1">
                        LISTA DE PROGRAMAS PRESUPUESTARIOS
                    </div>

                    <div class="table-responsive-sm">
                        <table id="mitable" class="table table-sm table-bordered text-dark">
                        <thead class=" text-white" style="font-size: 15px; background-color:#151618;">
                                <th>#</th>
                                <th>NOMBRE DE PROGRAMA</th>
                                <th>OBJETIVO DE PROGRAMA </th>
                                <th>EJERCICIO FISCAL</th>
                                <th>COMPONENTES</th>
                                <th>MODIFICAR</th>
                                <th>ELIMINAR</th>
                                <th>REPORTE</th>

                            </thead>
                            <tbody>
                                <?php $cont = 1 ?>
                                <?php foreach ($programas as $key => $programa) : ?>
                                    <tr>
                                        <td><?= $cont ?></td>
                                        <td><?= $programa->nombre_programa ?>  </td>
                                        <td><?= $programa->objetivo_programa ?></td>
                                        <td><?= $programa->ejercicio_fiscal ?> </td>
                                        <td><a href="<?= base_url('') ?>Programa/Componente/<?= $programa->id_programa ?>" class="btn btn-success btn-sm"><i class="fas fa-id-badge"></i></a></td>

                                        <td><button onclick="modalModificarPrograma(<?= $programa->id_programa?>)" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdate"><i class="far fa-edit"></i></button></td>

                                        <td><button onclick="eliminarPrograma(<?= $programa->id_programa?>)" class="btn btn-danger btn-sm" ><i class="fas fa-trash-alt"></i></button></td>

                                        <td><a href="<?= base_url('') ?>Reporte/Programa/<?= $programa->id_programa ?>" class="btn btn-warning btn-sm"><i class="fas fa-file-signature"></i></a></td>
                                    </tr>
                                    <?php $cont++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <th>#</th>
                                <th>NOMBRE DE PROGRAMA</th>
                                <th>OBJETIVO DE PROGRAMA </th>
                                <th>EJERCICIO FISCAL</th>
                                <th>COMPONENTES</th>
                                <th>MODIFICAR</th>
                                <th>ELIMINAR</th>
                                <th>REPORTE</th>
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
    <br>
</div>


<!-- MODAL UPDATE PROGRAMA -->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MODIFICAR PROGRAMA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-programa-update">
                    <div class="row">
                    <input id="id_programa" name="id_programa" hidden>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">NOMBRE DE PROGRAMA</label>
                                <input type="email" class="form-control" id="nombre_programa_m" name="nombre_programa" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Describir el nombre del programa presupuestario</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">OBJETIVO DE PROGRAMA</label>
                                
                                <textarea class="form-control" id="objetivo_programa_m" name="objetivo_programa"></textarea>
                                <div id="emailHelp" class="form-text">Redactar el objetivo del programa presupuestario.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">EJERCICIO FISCAL</label>
                                <select class="form-control" aria-label="Default select example" id="ejercicio_fiscal_m" name="ejercicio_fiscal">
                                    <option value="">SELECCIONAR...</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
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
                        <button class="btn btn-success btn-sm "  id="btnModificarPrograma">GUARDAR MODIFICACION DE PROGRAMA <i class="fas fa-pen-square"></i></button>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#spinerCarga').hide();
        $('#idmunicipio').hide();
        $('#spinerCargaModal').hide();
    });

    $('#btnGuardarPrograma').on('click', function(e) {
        e.preventDefault();
        var data = $('#form-programa').serialize();
        var nombre_programa = $('#nombre_programa').val();
        var objetivo_programa = $('#objetivo_programa').val();
        var ejercicio_fiscal = $('#ejercicio_fiscal').val();

        if (!nombre_programa == '' && !objetivo_programa == '' && !ejercicio_fiscal == '') {
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Programa/Nuevo",
                data: data,
                beforeSend: function() {
                    $('#spinerCarga').show();
                },
                success: function(data) {
                    $('#spinerCarga').hide();
                    location.reload();
                },
                error: function() {
                    $('#spinerCarga').hide();
                }
            });
        } else {
            mensaje("error", "Campos incompletos", "La informacion requerida no esta completa, favor de revisar los campos");
        }
    });

    function modalModificarPrograma(id_programa) {
        console.log('clic para modificar programa');
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>Obtener/Programa",
            data: {
                id_programa: id_programa
            },
            beforeSend: function() {},
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);
                $('#id_programa').val(data['id_programa']);
                $('#nombre_programa_m').val(data['nombre_programa']);
                $('#objetivo_programa_m').val(data['objetivo_programa']);
                $('#ejercicio_fiscal_m').val(data['ejercicio_fiscal']);
            },
            error: function() {

            }
        });

    }

    $('#btnModificarPrograma').on('click', function(e){
        e.preventDefault();
        var data = $('#form-programa-update').serialize();
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>Modificar/Programa",
            data: data,
            beforeSend: function() {
                $('#spinerCargaModal').show();
            },
            success: function(data) {
                $('#spinerCargaModal').hide();
                location.reload();
            },
            error: function(){}
        })
    })

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
                //location.reload();
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

    function eliminarPrograma(id_programa) {
            Swal.fire({
                title: "Eliminar Programa",
                text: "Si elimina esta PROGRAMA sera eliminada toda la informacion relacionada, componentes, actividades y calendarizacion",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: "POST",
                        url: "<?= base_url()?>Eliminar/Programa",
                        data:{
                            id_programa: id_programa
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