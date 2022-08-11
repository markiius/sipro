<div class="container-fluid">
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <?php $numeroMunicipio = "" ?>
                <?php foreach ($municipio as $key => $value) :
                    $nombreMunicipio = strtoupper($value->NombreMunicipio);
                    $numeroMunicipio = $value->id_municipio;
                endforeach; ?>

                <h4 style="text-align: center; font-family: 'Heebo', sans-serif;">
                    <span style="font-weight: bold; text-emphasis-color: black; color:black">
                        H. AYUNTAMIENTO DE <?= $nombreMunicipio ?> <br> 2021 - 2024 </span>
                </h4>

                <div id="sihayinfo">
                    <?php
                    $bandera_obras = $this->session->userdata('obras');
                    $id_programa = 0;
                    $dependencias = array();
                    $titulares = array();
                    foreach ($programa as $key => $value) :
                        array_push($dependencias, $value->nombre_unidad);
                        array_push($titulares, $value->nombre . " " . $value->apellido_paterno . " " . $value->apellido_materno);
                        $nombrePrograma = $value->nombre_programa;
                        $objetivoPrograma = $value->objetivo_programa;
                        $ejercicioFiscal = $value->ejercicio_fiscal;
                        $id_programa = $value->id_programa;
                    endforeach;
                    $resultadoDependencias = array_unique($dependencias);
                    $resultadoDependencias = array_values($resultadoDependencias);

                    $resultadoTitulares = array_unique($titulares);
                    $resultadoTitulares = array_values($resultadoTitulares);
                    //print_r($resultadoTitulares);
                    $nombresDependencias = "";
                    $nombresTitulares = "";
                    echo count($resultadoDependencias);
                    for ($i = 0; $i < count($resultadoDependencias); $i++) {
                        $nombresDependencias .= $resultadoDependencias[$i] . ". ";
                        $nombresTitulares .= $resultadoTitulares[$i] . ". ";
                        //echo " numero iterado " . $resultadoTitulares[$i];
                    }
                    ?>


                    <div class="row">
                        <div class="col col-12 pull-right" style="font-family: 'Heebo', sans-serif; ">
                            DIRECCIÓN/DEPENDENCIA RESPONSABLE: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $nombresDependencias ?> </span> <br>
                            NOMBRE DEL TITULAR DE LA DIRECCIÓN / DEP.: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $nombresTitulares ?></span> <br>
                            NOMBRE DEL PROGRAMA PRESUPUESTARIO: <span style="font-weight: bold; text-emphasis-color: black; color:black"> <?= $nombrePrograma ?>.</span> <br>
                            OBJETIVO / FIN DEL PROGRAMA PRESUPUESTARIO: <span style="font-weight: bold; text-emphasis-color: black; color:black"> <?= $objetivoPrograma ?>. </span><br>
                            EJERCICIO FISCAL: <span style="font-weight: bold; text-emphasis-color: black; color:black"> <?= $ejercicioFiscal ?> </span><br>
                        </div>

                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                
                <div class="col col-md-4">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">MES A REVISAR</label>
                        <select class="form-control mes" id="id_mes" name="id_mes" aria-label="Default select example">
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
                <div class="row">
                    <div class="col">
                        <span class="badge rounded-pill " style="background-color:red; color: black"> OBLIGATORIO </span>
                        <span class="badge rounded-pill " style="background-color:yellow; color: black"> IMPORTANTE </span>
                        <!--  -->
                    </div>
                </div>
                <h6 style="text-align: center; font-family: 'Heebo', sans-serif;">
                    <span style="font-weight: bold; text-emphasis-color: black; color:black"> DESCRIPCION DE ACTIVIDADES </span>
                </h6>
                <br>
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-bordered" style=" display: table-cell; overflow-x: auto; width: 100%;">
                        <thead class=" text-white" style="font-size: 12px; background-color:#151618;">
                            <th>COMPONENTE</th>
                            <th>NUMERO ACTIVIDAD</th>
                            <th>ACTIVIDAD</th>
                            <th>UNIDAD DE MEDIDA</th>
                            <th>MES</th>
                            <th>INDICADORES PROGRAMADOS</th>
                            <th>INDICADOR REALIZADOS</th>
                            <th>PORCENTAJE</th>
                            <th>STATUS / NIVEL CRITERIO</th>
                            <th>EN CASO DE QUE NO SE EJECUTE LA ACTIVIDAD, JUSTIFICAR LA CAUSA</th>
                            <th>NÚMERO DE POBLACIÓN ATENDIDA</th>
                            <th>NÚMERO DE HOMBRES</th>
                            <th>NÚMERO DE MUJERES</th>
                            <th>NOMBRE DE(LAS) LOCALIDAD(ES) ATENDIDA(S) </th>
                            <th>DESCRICPCIÓN DE LOS SERVICIOS/ BIENES/ INSUMOS ENTREGADOS - APLICADOS</th>
                            <th>DESCRIPCIÓN DE LA EVIDENCIA - DOCUMENTAL JUSTIFICATIVA GENERADA</th>
                            <th>AGREGAR INFORMACION</th>
                            <th>AGREGAR EVIDENCIA FOTOGRAFICA</th>
                            <th>VER EVIDENCIA FOTOGRAFICA</th>
                            <?php if ($bandera_obras == 1) : ?>
                                <th>ANALITICO DE OBRAS PUBLICAS</th>
                            <?php endif; ?>
                        </thead>
                        <tbody id="tabla-reporte">
                            <?php


                            $id = "";
                            foreach ($actividad as $key => $value) :
                                foreach ($ifoActividad as $key => $valueInfo) :
                                    if ($value->id_actividad_fecha == $valueInfo->id_actividad_fecha) {
                                        $id = $valueInfo->id_actividad_fecha;

                                        $programado = $value->cantidad_programada;
                                        $ejecutado = $valueInfo->indicador_realizado;
                                        $porcentajeTotal = 0;
                                        if ($programado > 0) {
                                            $porcentajeTotal = ($ejecutado * 100  / $programado);
                                        } else {
                                            $porcentajeTotal = ($ejecutado * 100  / 1);
                                        }

                                        $status = '';
                                        if ($porcentajeTotal >= 131) {
                                            $status = '<span style="color: red; font-weight: bold;">Exedido</span>';
                                        } else if ($porcentajeTotal >= 106 && $porcentajeTotal <= 500) {
                                            $status = '<span style="color: yellow; font-weight: bold;">Sobre Estimado</span>';
                                        } else if ($porcentajeTotal >= 95 && $porcentajeTotal <= 105) {
                                            $status = '<span style="color: green; font-weight: bold;">Bueno</span>';
                                        } else if ($porcentajeTotal >= 80 && $porcentajeTotal <= 94) {
                                            $status = '<span style="color: orange; font-weight: bold;">Regular</span>';
                                        } else if ($porcentajeTotal <= 79) {
                                            $status = '<span style="color: red; font-weight: bold;">Malo</span>';
                                        }
                            ?>
                                        <tr>
                                            <td>#<?= $value->numero_componente ?>: <?= $value->nombre_componente ?></td>
                                            <td><?= $value->numero_actividad ?></td>
                                            <td><?= $value->nombre_actividad ?></td>
                                            <td><?= $value->unidad_medida ?></td>
                                            <td><?= $value->mes ?></td>
                                            <td><?= $value->cantidad_programada ?></td>
                                            <td><?= $valueInfo->indicador_realizado ?></td>
                                            <td><?= $porcentajeTotal ?> %</td>
                                            <td><?= $status ?></td>
                                            <td><?= $valueInfo->justificacion ?></td>
                                            <td><?= $valueInfo->poblacion_atendida ?></td>
                                            <td><?= $valueInfo->hombres ?></td>
                                            <td><?= $valueInfo->mujeres ?></td>
                                            <td><?= $valueInfo->nombre_localidades_atendidas ?></td>
                                            <td><?= $valueInfo->servicios_aplicados ?></td>
                                            <td><?= $valueInfo->descripcion_evidencia ?></td>
                                            <td align="center">
                                                <i onclick="actualizarInfo(<?= $value->id_actividad_fecha ?>, <?= $valueInfo->id_actividad_detalle ?>, <?= $value->cantidad_programada ?>)" class="fas fa-edit fa-1x"></i>
                                            </td>
                                            <td align="center"><i onclick="modalEvidencia(<?= $value->id_actividad_fecha ?>, <?= $value->id_actividad ?>)" class="fas fa-camera fa-1x" ></i></td>
                                            <td align="center"><a href="<?= base_url() ?>Reporte/Obtener/<?= $value->id_actividad_fecha ?>"><i class="fas fa-eye fa-1x"></i></a></td>
                                            <?php if ($bandera_obras == 1) : ?>
                                                <td>
                                                    <a href="<?= base_url() ?>Analitico/<?= $id_programa ?>">
                                                        <i class="fas fa-edit" style="color:red"></i>
                                                    </a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php  }
                                endforeach;
                                if ($id != $value->id_actividad_fecha) { ?>
                                    <tr>
                                        <td>#<?= $value->numero_componente ?>: <?= $value->nombre_componente ?></td>
                                        <td><?= $value->numero_actividad ?></td>
                                        <td><?= $value->nombre_actividad ?></td>
                                        <td><?= $value->unidad_medida ?></td>
                                        <td><?= $value->mes ?></td>
                                        <td><?= $value->cantidad_programada ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td align="center">

                                            <i onclick="llenarInfo(<?= $value->id_actividad_fecha ?>)" class="fas fa-edit" style="color:red"></i>




                                        </td>
                                        <td></td>
                                        <td></td>
                                        <!-- <td align="center"> <i onclick="modalEvidencia(<?= $value->id_actividad_fecha ?>)" class="fas fa-camera"></i></td> -->

                                    </tr>
                                <?php }
                                ?>
                            <?php endforeach;
                            print_r($id);
                            ?>

                        </tbody>



                    </table>
                </div>
                <br>
                <hr>


            </div>
        </div>
    </div>


    <div class="modal fade" id="modalInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" id="titulo">
                </div>
                <div class="modal-body">
                    <form id="form-actividadDetalles">
                        <input id="id_actividad_fecha" name="id_actividad_fecha" value="" hidden>
                        <input id="id_actividad" name="id_actividad" value="" hidden>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="indicadoresRealizados" class="form-label">INDICADORES PROGRAMADOS: <div id="indicador_programado"> </div></span> </label>
                                    <label for="indicadoresRealizados" class="form-label">INDICADORES REALIZADOS:</label>
                                    <input type="number" class="form-control" name="indicadoresRealizados" id="indicadoresRealizados">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="justificacion" class="form-label">EN CASO DE NO EJECUTAR LA ACTIVIDAD, JUSTIFICAR CAUSA:</label><br>
                                    En caso de si ejecutar escribir<span style="color: red;"> N/A</span>
                                    <textarea class="form-control" name="justificacion" id="justificacion" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="numeroPblacion" class="form-label">POBLACIÓN TOTAL ATENDIDA:</label>
                                    <input type="number" class="form-control" name="numeroPblacion" id="numeroPblacion" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="numeroHombres" class="form-label">NUMERO DE HOMBRES:</label>
                                    <input type="number" class="form-control" name="numeroHombres" id="numeroHombres">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="numeroMujeres" class="form-label">NUMERO DE MUJERES:</label>
                                    <input type="number" class="form-control" name="numeroMujeres" id="numeroMujeres">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="nombreLocalidadesAtendidas" class="form-label">NOMBRE DE LOCALIDADES ANTENDIDAS: </label>
                                    <textarea class="form-control" name="nombreLocalidadesAtendidas" id="nombreLocalidadesAtendidas" cols="30" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="descripcionServiciosBienes" class="form-label">DESCRIPCION DE LOS SERVICIOS/ BIENES/ INSUMOS ENTREGADOS:</label>
                                    <textarea class="form-control" name="descripcionServiciosBienes" id="descripcionServiciosBienes" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label for="descripcionDeEvidenciaDocumental" class="form-label">DESCRIPCION DE LA EVIDENCIA - DOCUMENTAL JUSTIFICATIVA GENERADA:</label>
                                    <textarea class="form-control" name="descripcionDeEvidenciaDocumental" id="descripcionDeEvidenciaDocumental" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="spinerActividadDetalle" class="text-center">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                        <br>
                        <span class="visually-hidden text-success">Cargando...</span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">CERRAR</button>
                    <div id="botonModal">
                        <button type="button" class="btn btn-success btn-sm" id="btnGuardarActividad">GUARDAR <i class="fas fa-save"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEvidencias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" id="titulo">
                </div>
                <div class="modal-body">


                    <div class="row">
                        <br>
                        <div class="col-12">
                            <div class="mb-3" id="evidencias">

                            </div>
                        </div>
                    </div>
                    <form action="" id="form-reporte-evidencia">
                        <input id="id_actividad_evidencia" name="id_actividad" value="" hidden>
                        <input id="id_actividad_para_evidencia" name="id_actividad_para_evidencia" value="" hidden>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NUMERO DE PERSONAS ATENDIDAS</label>
                                    <input type="number" class="form-control" id="personas_atendidas" name="personas_atendidas" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Escribir el numero de personas</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">FECHA DE REALIZACION DE LA ACTIVIDAD</label>
                                    <input type="date" class="form-control" id="fecha_actividad" name="fecha_actividad" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Escribir fecha</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NOMBRE DE LAS LOCALIDADES ATENDIDAS</label>
                                    <textarea class="form-control" id="localidades_atendidas" name="localidades_atendidas" rows="2"></textarea>
                                    <div id="emailHelp" class="form-text">Escribir localidades atendidas </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NOMBRE DE LAS DIRECCIONES MUNICIPALES Y/O DEPENDENCIAS ESTATALES O FEDERALES PARTICIPANTES</label>
                                    <input type="text" class="form-control" id="direcciones_dependencias" name="direcciones_dependencias" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Escribir direcciones / dependencias participantes </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <strong>Nota: las fotografias deben de contener un maximo de 20MB</strong>
                        <div class="col-12">
                            <div class="mb-3">

                                <label for="evidencia" class="form-label">Fotografia 1:</label>
                                <div class="input-group"> <input type="file" class="form-control" id="evidencia_1" name="evidencia_1"> <!-- <button id="subirEvidencia11" class="btn btn-outline-danger">Subir archivo</button> -->

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">

                                    <label for="evidencia" class="form-label">Fotografia 2:</label>
                                    <div class="input-group"> <input type="file" class="form-control" id="evidencia_2" name="evidencia_2"> <!-- <button onclick="evidencia_fotografia_2()" class="btn btn-outline-danger">Subir archivo</button> -->

                                    </div>
                                </div>
                    </form>


                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">CERRAR</button>
            <div id="botonModal">
                <button type="button" class="btn btn-success btn-sm" id="btnAceptar">ACEPTAR <i class="fas fa-save"></i></button>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modalEvidenciaCargada" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" id="titulo">
                </div>
                <div class="modal-body">


                    <div id="spinerActividadDetalle" class="text-center">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                        <br>
                        <span class="visually-hidden text-success">Cargando...</span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">CERRAR</button>
                    <div id="botonModal">
                        <button type="button" class="btn btn-success btn-sm" id="btnGuardarActividad">GUARDAR <i class="fas fa-save"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</div>

<br>

<script>
    var id_actividad_fe = 0;
    $(document).ready(function() {
        $('#spinerCarga').hide();
        //fecha();
        $('#modalInfo').modal('hide')
    });

    function llenarInfo(id) {
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>InicioController/buscarActividadFecha",
            data: {
                'id': id
            },
            beforeSend: function() {},
            success: function(data) {
                data = JSON.parse(data)
                $('#modalInfo').modal('show')
                $('#indicador_programado').html('<span style="color: blue;">' + data['cantidad_programada'] + '</span>');
                $('#spinerActividadDetalle').hide();
                $('#form-actividadDetalles').trigger("reset");
                $("#titulo").html("");
                $("#titulo").append(
                    '<h5 class="modal-title">COMPONENTE: ' + data.nombre_componente.toUpperCase() + ' / ACTIVIDAD: ' + data.nombre_actividad.toUpperCase() + '</h5>'
                );
                $("#botonModal").html("");
                $("#botonModal").append(
                    '<button type="button" class="btn btn-success btn-sm" onclick="guardar()">GUARDAR <i class="fas fa-save"></i></button>'
                );

                $("#id_actividad_fecha").val(id);
                $("#id_actividad").val(data.id_actividad);
            },
            error: function() {
                $('#spinerActividadDetalle').hide();
            }
        });
    }

    function actualizarInfo(id, id_info, cantidad_programada) {
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>InicioController/buscarInformacionActividadFecha",
            data: {
                'id': id
            },
            beforeSend: function() {},
            success: function(data) {
                data = JSON.parse(data)
                $('#modalInfo').modal('show')
                $('#spinerActividadDetalle').hide();
                $("#titulo").html("");
                $("#botonModal").html("");
                $("#botonModal").append(
                    '<button type="button" class="btn btn-success btn-sm" onclick="actualizar()">ACTUALIZAR <i class="fas fa-save"></i></button>'
                );
                $("#indicador_programado").html('<span style="color: blue;">' + cantidad_programada + '</span>');
                $("#id_actividad_fecha").val(id_info);
                $("#indicadoresRealizados").val(data.indicador_realizado);
                $("#justificacion").val(data.justificacion);
                $("#numeroPblacion").val(data.poblacion_atendida);
                $("#numeroHombres").val(data.hombres);
                $("#numeroMujeres").val(data.mujeres);
                $("#nombreLocalidadesAtendidas").val(data.nombre_localidades_atendidas);
                $("#descripcionServiciosBienes").val(data.servicios_aplicados);
                $("#descripcionDeEvidenciaDocumental").val(data.descripcion_evidencia);

            },
            error: function() {
                $('#spinerActividadDetalle').hide();
            }
        });
    }

    function modalEvidencia(id, id_actividad) {

        $('#modalEvidencias').modal('show');
        $('#id_actividad_evidencia').val(id);
        $('#id_actividad_para_evidencia').val(id_actividad);

    }

    $('#btnMostrarid').on('click', function() {
        alert($('#id_actividad_fecha'));
    });

    $("#numeroHombres").change(function() {
        var hombres = $("#numeroHombres").val();
        var mujeres = $("#numeroMujeres").val();
        $('#numeroPblacion').val(parseInt(hombres) + parseInt(mujeres));
    });

    $("#numeroMujeres").change(function() {
        var hombres = $("#numeroHombres").val();
        var mujeres = $("#numeroMujeres").val();
        $('#numeroPblacion').val(parseInt(hombres) + parseInt(mujeres));
    });


    function guardar() {
        var data = $('#form-actividadDetalles').serialize();
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>InicioController/llenarActividad",
            data: data,
            beforeSend: function() {
                $('#spinerActividadDetalle').show();
            },
            success: function(datos) {
                $('#spinerActividadDetalle').hide();
                $('#modalInfo').modal('hide')
                mensaje("success", "Buen trabajo!", "El proceso se realizó con exito");
            },
            error: function(jqXHR, textStatus, error) {
                $('#spinerActividadDetalle').hide();
            }
        });
    };


    function actualizar() {
        var data = $('#form-actividadDetalles').serialize();
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>InicioController/updateActividad",
            data: data,
            beforeSend: function() {
                $('#spinerActividadDetalle').show();
            },
            success: function(datos) {
                $('#spinerActividadDetalle').hide();
                $('#modalInfo').modal('hide')
                mensaje("success", "Buen trabajo!", "El proceso se realizó con exito");
            },
            error: function(jqXHR, textStatus, error) {
                $('#spinerActividadDetalle').hide();
            }
        });
    };


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


    const getBase64 = (file) => {
        let reader = new FileReader();
        let id_actividad_fecha = $("#id_actividad_fecha").val();
        reader.readAsDataURL(file);
        reader.onload = () => {
            $.ajax({
                url: "<?= base_url() ?>InicioController/subirEvidencia",
                type: "POST",
                dataType: 'json',
                data: {
                    'evidencia': reader.result,
                    'id_actividad_fecha': id_actividad_fecha
                },
                beforeSend: function() {},
                success: function(datos) {
                    //$('#modalEvidencias').modal('hide')
                    modalEvidencia(id_actividad_fecha)
                },
                error: function(jqXHR, textStatus, error) {
                    console.log("error: " + error);
                }
            });
        };
    }

    const leerArchivo = () => {
        let file = document.getElementById('evidencia').files[0];
        if (file) {
            console.log(file);
            //getBase64(file)
        } else {
            alert("Seleccionar un archivo");
        }

    }

    $('#id_mes').on('change', function() {
        console.log('clic en el select');
        var id_mes = this.value;
        var id_programa = <?= $id_programa ?>;
        var id_usuario = <?= $this->session->userdata('usuario') ?>;
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>ReporteCliente",
            data: {
                id_programa: id_programa,
                id_usuario: id_usuario,
                id_mes: id_mes
            },
            beforeSend: function() {

            },
            success: function(data) {
                console.log(data);
                $('#tabla-reporte').html(data);
            },
            error: function() {

            }


        });
    });

    $('#btnAceptar').on('click', function(e) {
        e.preventDefault();
        var form = $('#form-reporte-evidencia')[0];
        var data = new FormData(form);


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
                    enctype: 'multipart/form-data',
                    url: "<?= base_url() ?>Reporte/Nuevo",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data == 'success') {
                            mensaje("success", "Buen trabajo!", "Toda la informacion fue almacenada correctamente");
                        } else {
                            alert("Ohh hubo un error" + data);
                        }
                    },
                    error: function() {

                    }
                });
            }
        })



    })

    $('#subirEvidencia11').on('click', function(e) {
        e.preventDefault();
        var form = $('#form-reporte-evidencia')[0];
        var data = new FormData(form);
        console.log("click en el boton ");

        $.ajax({
            method: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url() ?>Reporte/Foto1",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {},
            success: function(data) {
                console.log(data);
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


    /*  */
</script>