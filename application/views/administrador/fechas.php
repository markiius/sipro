<div class="container-fluid">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <?php
                    $nombre_componente = "";
                    $numero_componente = 0;
                    $id_municipio = $programa->id_municipio;
                    ?>
                    <?php foreach ($componente as $key => $val) :
                        $nombre_componente = $val->nombre_componente;
                        $numero_componente = $val->numero_componente;
                    endforeach; ?>

                    <?php foreach ($actividad as $key => $value) : ?>


                        NOMBRE DEL PROGRAMA PRESUPUESTARIO: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $programa->nombre_programa ?></span><br>
                        OBJETIVO / FIN DEL PROGRAMA PRESUPUESTARIO: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $programa->objetivo_programa ?></span> <br>
                        NOMBRE DE COMPONENTE : <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $nombre_componente ?></span> <br>
                        NUMERO DE COMPONENTE : <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $numero_componente ?></span> <br>
                        ACTIVIDAD: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $value->nombre_actividad ?></span>
                        <hr>
                        <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">
                            AGREGAR ACTIVIDADES
                        </div>
                        <br>
                        <form id="form-fecha">
                            <div class="row">
                                <input type="text" id="componente" name="id_actividad" value="<?= $value->id_actividad ?>">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ENERO</label>
                                        <input type="number" min="0" max="10" class="form-control monto" id="enero" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">FEBRERO</label>
                                        <input type="number" min="0" class="form-control monto" id="febrero" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">MARZO</label>
                                        <input type="number" min="0" class="form-control monto" id="marzo" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ABRIL</label>
                                        <input type="number" min="0" class="form-control monto" id="abril" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">MAYO</label>
                                        <input type="number" min="0" class="form-control monto" id="mayo" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">JUNIO</label>
                                        <input type="number" min="0" class="form-control monto" id="junio" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <input type="text" id="componente" name="id_actividad" value="<?= $value->id_actividad ?>"> -->
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">JULIO</label>
                                        <input type="number" min="0" class="form-control monto" id="enero" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">AGOSTO</label>
                                        <input type="number" min="0" class="form-control monto" id="febrero" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">SEPTIEMBRE</label>
                                        <input type="number" min="0" class="form-control monto" id="marzo" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">OCTUBRE</label>
                                        <input type="number" min="0" class="form-control monto" id="abril" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">NOVIEMBRE</label>
                                        <input type="number" min="0" class="form-control monto" id="mayo" name="campo[]" onkeyup="sumar();">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">DICIEMBRE</label>
                                        <input type="number" min="0" class="form-control monto" id="junio" name="campo[]" onkeyup="sumar();">

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
                            <span>El resultado de lo programado es: </span> <span style="color: red;" id="spTotal"></span>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <?php if(sizeof($meses) == 0):?>
                                <button class="btn btn-secondary btn-sm btn-osw-active" id="btnGuardarActividad">GUARDAR CALENDARIO <i class="fas fa-pen-square"></i></button>
                                <?php endif; ?>
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
                    <?php foreach ($actividad as $key => $value) : ?>
                        <div class="text-lg font-weight-bold text-info text-uppercase mb-1">
                            <?= $value->nombre_actividad ?> </div>
                    <?php endforeach; ?>

                    <div class="table-responsive">
                        <table id="mitable" class="table table-sm table-bordered text-dark">
                            <thead class=" text-white" style="font-size: 15px; background-color:#2C2D2D;">
                                <th>#</th>
                                <th>MES</th>
                                <th>CANTIDAD PROGRAMADA </th>
                                <th>MODIFICAR</th>
                            </thead>
                            <tbody>
                                <?php $cont = 1 ?>
                                <?php foreach ($meses as $key => $mes) : ?>
                                    <tr>
                                        <td><?= $cont ?></td>
                                        <td><?= $mes->mes ?></td>
                                        <td><?= $mes->cantidad_programada ?></td>
                                        <td><button class="btn btn-danger btn-sm" onclick="modalModificarFecha(<?= $mes->id_actividad_fecha ?>)" data-bs-toggle="modal" data-bs-target="#modalUpdate"><i class="far fa-edit"></i></button></td>
                                    </tr>
                                    <?php $cont++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <th>#</th>
                                <th>MES</th>
                                <th>CANTIDAD PROGRAMADA </th>
                                <th>MODIFICAR</th>
                            </tfoot>
                        </table>

                    </div>
                    <span>El resultado de lo programado es: </span> <span style="color: green;" id="spTotal2"></span><br>
                    <a href="<?= base_url() ?>Municipio/Programa/<?= $id_municipio ?>" class="btn btn-info">FINALIZAR CAPTURA</a>
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MODIFICAR CANTIDAD PROGRAMADA POR MES</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-fecha-update">
                    <div class="row">
                        
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">MES </label>
                                <div class="" id="mes"></div>
                                <input type="text" min="0" max="6" class="form-control" id="id_mes" name="id_mes" hidden>
                                <input type="number" min="0" max="6" class="form-control" id="cantidad_programada" name="cantidad_programada" >
                                <div id="emailHelp" class="form-text">Escribir el numero del componente</div>
                            </div>
                        </div>

                    </div>
                    <hr>
                   


                </form>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-success btn-sm " id="btnModificarFecha">GUARDAR CAMBIOS <i class="fas fa-pen-square"></i></button>
                    </div>
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
        $('#componente').hide();
    });
    $('#btnGuardarActividad').on('click', function(e) {
        e.preventDefault();
        var data = $('#form-fecha').serialize();
        Swal.fire({
            title: "Info",
            text: "Deseas terminar tu captura de datos",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>Fecha/Nuevo",
                    data: data,
                    beforeSend: function() {
                        $('#spinerCarga').show();
                    },
                    success: function(data) {
                        if (data = true) {
                            mensaje("success", "Buen trabajo!", "Agregado correctamente :)");
                            $('#spinerCarga').hide();
                        } else {
                            mensaje("warning", "Error!", "Informacion incorrecta, ponerse en contacto con sistemas");
                        }
                    },
                    error: function() {
                        $('#spinerCarga').hide();
                    }
                });
            }
        })

    });

    function modalModificarFecha(id_actividad_fecha) {

        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>Obtener/Fecha",
            data: {
                id_actividad_fecha: id_actividad_fecha
            },
            beforeSend: function() {
                $('#spinerCarga').hide();
            },
            success: function(data) {

                $('#spinerCarga').hide();
                data = JSON.parse(data);
                console.log(data);
                console.log(data['mes']);
                $('#mes').html(data['mes']);
                $('#id_mes').val(data['id_actividad_fecha']);
                $('#cantidad_programada').val(data['cantidad_programada']);
            },
            error: function() {}
        })
    }

    $('#btnModificarFecha').on('click', function(e) {
        e.preventDefault();
        var data = $('#form-fecha-update').serialize();
        var id_mes = $('#id_mes').val();
        var cantidad = $('#cantidad_programada').val();
        console.log("formulario ->"+data);
        console.log("espacio "+id_mes+"    "+cantidad);
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>Modificar/Fecha",
            data: {
                id_mes: id_mes,
                cantidad: cantidad
            },
            beforeSend: function() {
                $('#spinerCarga').hide();
            },
            success: function(data) {
                console.log(data);
                location.reload();

            },
            error: function() {}
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

    function sumar() {

        var total = 0;

        $(".monto").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
                total += 0;
            } else {
                total += parseFloat($(this).val());
            }
        });

        //alert(total);
        document.getElementById('spTotal').innerHTML = total;
        document.getElementById('spTotal2').innerHTML = total;

    }
</script>