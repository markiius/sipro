<div class="container-fluid">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <?php $id_prog = 0 ?>
                    <div class="text-md font-weight-bold text-warning text-uppercase mb-1">

                        NOMBRE DEL PROGRAMA PRESUPUESTARIO: <span style="font-weight: bold; text-emphasis-color: black; color:black"> <?= $programas->nombre_programa ?></span> <br>
                        OBJETIVO / FIN DEL PROGRAMA PRESUPUESTARIO: <span style="font-weight: bold; text-emphasis-color: black; color:black"> <?= $programas->objetivo_programa ?></span> <br>
                        EJERSICIO FISCAL: <span style="font-weight: bold; text-emphasis-color: black; color:black"> <?= $programas->ejercicio_fiscal ?></span><br>
                        <?php $id_prog = $programas->id_programa ?>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">AREA RESPONSABLE</label>
                                <select class="form-control" id="id_usuario" name="id_usuario" aria-label="Default select example">
                                    <option selected>Seleccionar</option>
                                    <?php foreach ($unidades as $key => $area) : ?>
                                        <option value="<?= $area->id_usuario ?>"><?= $area->nombre_unidad ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">MES A REVISAR</label>
                                <select class="form-control" id="id_mes" name="id_mes" aria-label="Default select example">
                                    <option selected>Seleccionar</option>
                                    <option value="enero">ENERO</option>
                                    <option value="febrero">FEBRERO</option>
                                    <option value="marzo">MARZO</option>
                                    <option value="abril">ABRIL</option>
                                    <option value="mayo">MAYO</option>
                                    <option value="junio">JUNIO</option>
                                    <option value="julio">JULIO</option>
                                    <option value="agosto">AGOSTO</option>
                                    <option value="septiembre">SEPTIEMBRE</option>
                                    <option value="octubre">OCTUBRE</option>
                                    <option value="noviembre">NOVIEMBRE</option>
                                    <option value="diciembre">DICIEMBRE</option>

                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <br>
                            <button id="btnFiltrar" class="btn btn-info">FILTRAR</button>
                        </div>
                    </div>

                </div>
                <div class="col-auto">

                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">

            <h6 style="text-align: center; font-family: 'Heebo', sans-serif;">
                <span style="font-weight: bold; text-emphasis-color: black; color:black"> DESCRIPCION DE ACTIVIDADES </span>
            </h6>

            <button class="btn btn-warning btn-sm" id="btnGenerarReporte"> <i class="fas fa-file-pdf"></i> GENERAR REPORTE F1</button>
            <button class="btn btn-success btn-sm" id="btnGenerarReporteFotografico"> <i class="fas fa-file-pdf"></i> GENERAR REPORTE FOTOGRAFICO F2</button>

            <div class="table-responsive">
                <table id="" class="table table-sm table-bordered" style=" display: table-cell; overflow-x: auto; width: 100%;">
                    <thead class=" text-white" style="font-size: 12px; background-color:#0B1734;">
                        <th>NUMERO COMPONENTE</th>
                        <th>NUMERO ACTIVIDAD</th>
                        <th>NOMBRE ACTIVIDAD</th>
                        <th>UNIDAD DE MEDIDA</th>
                        <th>MES QUE SE INFORMA</th>
                        <!-- <th>NUMERO DE INDICADORES </th> -->
                        <th>NUMERO DE INDICADOR DEL MES PROGRAMADO</th>
                        <th>NUMERO DE INDICADOR DEL MES REALIZADO</th>
                        <th>PORCENTAJE</th>
                        <th>STATUS</th>
                        <th>EN CASO DE QUE NO SE EJECUTE LA ACTIVIDAD, JUSTIFICAR LA CAUSA</th>
                        <th>NÚMERO DE POBLACIÓN ATENDIDA</th>
                        <th>NÚMERO DE HOMBRES</th>
                        <th>NÚMERO DE MUJERES</th>
                        <th>NOMBRE DE(LAS) LOCALIDAD(ES) ATENDIDA(S) </th>
                        <th>DESCRICPCIÓN DE LOS SERVICIOS/ BIENES/ INSUMOS ENTREGADOS - APLICADOS</th>
                        <th>DESCRIPCIÓN DE LA EVIDENCIA - DOCUMENTAL JUSTIFICATIVA GENERADA</th>
                        <th>FOTOGRAFIAS</th>
                        <th>DOCUMENTOS CARGADOS</th>
                    </thead>
                    <tbody id="actividades-list">


                    </tbody>

                </table>
            </div>

            <div id="texto"></div>

        </div>
    </div>


</div>


<!-- <div class="modal-dialog modal-lg" id="modalEvidencias">...</div> -->

<!-- Modal -->
<div class="modal fade" id="modalEvidencias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Documentos cargados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" id="documentacionCargada">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEvidenciaCargada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fotografias Cargadas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
                        <table id="mitable" class="table table-sm table-bordered text-dark">
                            <thead class="bg-secondary text-white">
                                <th>#</th>
                                <th>PERSONAS ATENDIDAS</th>
                                <th>FECHA ACTIVIDAD</th>
                                <th>DIRECCIONES O DEPENDENCIAS</th>
                                <th>LOCALIDADTES ATENDIDAS</th>
                                <th>FOTOGRAFIA 1</th>
                                <th>FOTOGRAFIA 2</th>
                                <th>MODIFICAR</th>
                            </thead>
                            <tbody id="evidencias">
                                
                            </tbody>
                            <tfoot>
                                <th>#</th>
                                <th>PERSONAS ATENDIDAS</th>
                                <th>FECHA ACTIVIDAD</th>
                                <th>DIRECCIONES O DEPENDENCIAS</th>
                                <th>LOCALIDADTES ATENDIDAS</th>
                                <th>FOTOGRAFIA 1</th>
                                <th>FOTOGRAFIA 2</th>
                                <th>MODIFICAR</th>
                            </tfoot>
                        </table>
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
        console.log("ready");
    });

    $('#btnFiltrar').on('click', function(e) {
        console.log('clic en el boton');
        var id_usuario = $('#id_usuario').val();
        var id_mes = $('#id_mes').val();
        var id_programa = <?= $id_prog ?>;
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>Reporte",
            data: {
                id_programa: id_programa,
                id_usuario: id_usuario,
                id_mes: id_mes
            },
            beforeSend: function() {

            },
            success: function(data) {
                console.log('respuesta de data ' + data);
                $('#actividades-list').html(data);
            },
            error: function() {

            }
        })

    });

    function obtenerInformacion(id) {
        $("#modalEvidencias").modal("show");

        obtenerdocs(id);
    }

    function obtenerdocs(id) {

        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>Obtener/Doc/Admin",
            data: {
                id_actividad: id,
            },
            beforeSend: function() {
                $('#documentacionCargada').html("");
                $('#spinCargaDoc').show();
            },
            success: function(data) {
                $('#documentacionCargada').html(data);
                $('#spinCargaDoc').hide();
            },
            error: function() {}
        });
    }

    $('#btnGenerarReporte').on('click', function() {
        console.log('clic en el boton');
        var id_usuario = $('#id_usuario').val();
        var id_mes = $('#id_mes').val();
        var id_programa = <?= $id_prog ?>;
        if (id_mes != 'Seleccionar' && id_usuario != 'Seleccionar') {
            location.href = "<?= base_url() ?>Reporte/PDF/" + id_usuario + "/" + id_mes + "/" + id_programa;
        } else {
            alert("          Error :(  \n debes llenar los filtro para poder generar un reporte");
        }

    });

    $('#btnGenerarReporteFotografico').on('click', function() {
        console.log('clic en el boton');
        var id_usuario = $('#id_usuario').val();
        var id_mes = $('#id_mes').val();
        var id_programa = <?= $id_prog ?>;
        if (id_mes != 'Seleccionar' && id_usuario != 'Seleccionar') {
            location.href = "<?= base_url() ?>Reporte/PDF/Fotografico/" + id_usuario + "/" + id_mes + "/" + id_programa;
        } else {
            alert("          Error :(  \n debes llenar los filtro para poder generar un reporte");
        }

    });

    document.addEventListener("keydown", event => {
        if (event.keyCode == 112) {
            console.log('clic en el boton');
            var id_usuario = $('#id_usuario').val();
            var id_mes = $('#id_mes').val();
            var id_programa = <?= $id_prog ?>;
            if (id_mes != 'Seleccionar' && id_usuario != 'Seleccionar') {
                location.href = "<?= base_url() ?>Reporte/PDF/" + id_usuario + "/" + id_mes + "/" + id_programa;
            } else {
                alert("          Error :(  \n debes llenar los filtro para poder generar un reporte");
            }

        }
    });

    document.addEventListener("keydown", event => {
        if (event.keyCode == 113) {
            console.log('clic en el boton');
            var id_usuario = $('#id_usuario').val();
            var id_mes = $('#id_mes').val();
            var id_programa = <?= $id_prog ?>;
            if (id_mes != 'Seleccionar' && id_usuario != 'Seleccionar') {
                location.href = "<?= base_url() ?>Reporte/PDF/Fotografico/" + id_usuario + "/" + id_mes + "/" + id_programa;
            } else {
                alert("          Error :(  \n debes llenar los filtro para poder generar un reporte");
            }

        }
    });

    function modalEvidenciaCargada(id_actividad_fecha) {
        $('#modalEvidenciaCargada').modal('show');
        obtenerEvidenciasCargadas(id_actividad_fecha);
    }

    function obtenerEvidenciasCargadas(id_actividad_fecha) {

        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>Reporte/Obtener",
            data: {
                id_actividad_fecha: id_actividad_fecha
            },
            beforeSend: function() {
                $('#spineerEvidenciaCargada').show();
            },
            success: function(data) {
                $('#spineerEvidenciaCargada').hide();
                $('#evidencias').html(data);
            }
        });
    }
</script>