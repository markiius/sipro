<div class="container-fluid">



    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
        <h3 class="m-0 "> <strong style="font-weight: bold; text-emphasis-color: black; color:black">ANALITICOS DE OBRA FORTAMUN</strong> </h3>
            <br>
            <div class="row">
                <div class="col-md-1">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">EJERCICIO FISCAL</label>
                        <select class="form-control" id="ejercicio_fiscal" name="ejercicio_fiscal" aria-label="Default select example">
                            <option selected value="">Seleccionar</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">MES A REVISAR</label>
                        <select class="form-control" id="id_mes" name="id_mes" aria-label="Default select example">
                            <option selected value="">Seleccionar</option>
                            <option value="01">ENERO</option>
                            <option value="02">FEBRERO</option>
                            <option value="03">MARZO</option>
                            <option value="04">ABRIL</option>
                            <option value="05">MAYO</option>
                            <option value="06">JUNIO</option>
                            <option value="07">JULIO</option>
                            <option value="08">AGOSTO</option>
                            <option value="09">SEPTIEMBRE</option>
                            <option value="10">OCTUBRE</option>
                            <option value="11">NOVIEMBRE</option>
                            <option value="12">DICIEMBRE</option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="row justify-content-end">
                <button id="btn_reporte_fism" href="#" class="btn btn-success btn-sm btn-icon-split" type="submit">
                    <span class="icon text-white-50">
                        <i class="far fa-save"></i>
                    </span>
                    <span class="text">GENERAR REPORTE</span>
                </button>
            </div>

        </div>
        <div class="card-body text-dark">
            <div class="table-responsive">
                <table id="mitable" class="table table-sm table-bordered text-dark">
                    <thead class=" text-white" style="font-size: 15px; background-color:#2C2D2D;">
                        <!-- <th>Opciones</th> -->
                        <th>Numero Consecutivo</th>
                        <th>Ejercicio fiscal</th>
                        <th>Nombre de la Entidad</th>
                        <th>Clave de la Entidad</th>
                        <th>Nombre del Municipio</th>
                        <th>Clave del Municipio</th>
                        <th>Nombre de la Localidad</th>
                        <th>Clave de la Localidad</th>
                        <th>Número de obra</th>

                        <th>Descripción y ubicación de la obra o acción</th>
                        <th>Tipo de Localidad</th>
                        <th>Rubro/Acción</th>
                        <th>Población total</th>
                        <th>Población en referencia</th>
                        <th>Población Objetivo</th>
                        <th>Población Atendida</th>
                        <th>Hombres</th>
                        <th>Mujeres</th>
                        <th>Grado de Marginación</th>

                        <th>Monto de la Obra/Acción</th>
                        <th>Fuente de Financiamiento</th>
                        <th>Avance financiero</th>
                        <th>Avance fisico</th>
                        <th>Geo - localización de la Obra/Acción (Describir link o insertar imagen)</th>
                        <th>Fecha de captura</th>
                        <th>Archivo fotográfico de la Obra/Acción(Insertar imagen)</th>

                    </thead>
                    <tbody id="obras">
                        <?php if ($obras) {
                            $x = 1;
                            foreach ($obras as $key => $value) { ?>
                                <tr>
                                    <!-- <td style="font-size: 15px; background-color:#D5D7D7;"> &nbsp;<i onclick="modificar(<?= $value->id_analitico ?>)" class="fas fa-edit"></i> &nbsp; &nbsp; &nbsp;  <i onclick="eliminar(<?= $value->id_analitico ?>)" class="fas fa-trash-alt"></i></td> -->
                                    <td><?= $x ?></td>
                                    <td><?= $value->ejercicio_fiscal ?></td>
                                    <td><?= $value->nombre_entidad ?></td>
                                    <td><?= $value->clave_entidad ?></td>
                                    <td><?= $value->NombreMunicipio ?></td>
                                    <td><?= $value->clave_municipio ?></td>
                                    <td><?= $value->localidad ?></td>
                                    <td><?= $value->clave_localidad ?></td>
                                    <td><?= $value->numero_obra ?></td>
                                    <td><?= $value->ubicacion_obra ?></td>
                                    <td><?= $value->id_tipo_localidad ?></td>
                                    <td><?= $value->id_rubro ?></td>
                                    <td><?= $value->poblacion_total ?></td>
                                    <td><?= $value->poblacion_referencia ?></td>
                                    <td><?= $value->poblacion_objetivo ?></td>
                                    <td><?= $value->poblacion_atendida ?></td>
                                    <td><?= $value->hombres ?></td>
                                    <td><?= $value->mujeres ?></td>
                                    <td><?= $value->grado_marginacion ?></td>

                                    <td><?= $value->monto_obra ?></td>
                                    <td><?= $value->fuente_financiamiento ?></td>
                                    <td><?= $value->avance_financiero ?></td>
                                    <td><?= $value->avance_fisico ?></td>
                                    <td><?= $value->geo_localizacion ?></td>
                                    <!-- <td><?= $value->fecha_captura ?></td> -->
                                    <!-- <td><?= $value->id_archivo_fotorgrafico ?></td> -->

                                </tr>
                        <?php $x = $x + 1;
                            }
                        } ?>
                    </tbody>
                    <tfoot>
                        <th>Opciones</th>
                        <th>Numero Consecutivo</th>
                        <th>Ejercicio fiscal</th>
                        <th>Nombre de la Entidad</th>
                        <th>Clave de la Entidad</th>
                        <th>Nombre del Municipio</th>
                        <th>Clave del Municipio</th>
                        <th>Nombre de la Localidad</th>
                        <th>Clave de la Localidad</th>
                        <th>Número de obra</th>

                        <th>Descripción y ubicación de la obra o acción</th>
                        <th>Tipo de Localidad</th>
                        <th>Rubro/Acción</th>
                        <th>Población total</th>
                        <th>Población en referencia</th>
                        <th>Población Objetivo</th>
                        <th>Población Atendida</th>
                        <th>Hombres</th>
                        <th>Mujeres</th>
                        <th>Grado de Marginación</th>

                        <th>Monto de la Obra/Acción</th>
                        <th>Fuente de Financiamiento</th>
                        <th>Avance financiero</th>
                        <th>Avance fisico</th>
                        <th>Geo - localización de la Obra/Acción (Describir link o insertar imagen)</th>
                        <!-- <th>Fecha de captura</th> -->
                        <!-- <th>Archivo fotográfico de la Obra/Acción(Insertar imagen)</th> -->

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
    var status = false;
    var tipo = "FORTAMUN";
    console.log(status);



    $('#id_mes').on('change', function() {
        console.log('clic en el mes ');
        var ejercicio = $('#ejercicio_fiscal').val();
        var mes = this.value;
        if (ejercicio != "" && mes != "") {
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Analitico/Filtro",
                data: {
                    mes: mes,
                    ejercicio: ejercicio,
                    tipo: tipo
                },
                success: function(data) {
                    if (data != false) {
                        $('#obras').html(data);
                    } else {
                        $('#obras').html("");
                        msj('error', 'Oops!', 'La consulta no devulve valores!');
                    }

                }
            });
        } else {
            /*  alert("favor de llenar los filtros"); */
        }

    })

    $('#ejercicio_fiscal').on('change', function() {
        var mes = $('#id_mes').val();
        var ejercicio = this.value;
        if (ejercicio != "" && mes != "") {
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Analitico/Filtro",
                data: {
                    mes: mes,
                    ejercicio: ejercicio,
                    tipo: tipo
                },
                success: function(data) {
                    if (data != false) {
                        $('#obras').html(data);
                    } else {
                        $('#obras').html("");
                        msj('error', 'Oops!', 'La consulta no devulve valores!');
                    }

                }
            });
        } else {
            /* alert("favor de llenar los filtros"); */
        }

    })

    $('#btn_reporte_fism').on('click', function() {
        var mes = $('#id_mes').val();
        var ejercicio = $('#ejercicio_fiscal').val();
        console.log(mes + "  " + ejercicio + " " + tipo);
        if (mes != "" && ejercicio != "") {
            location.href = "<?= base_url() ?>Analitico/FORTAMUN/PDF/" + mes + "/" + ejercicio + "/" + tipo + "/<?= $municipio ?>";

        } else {
            msj('warning', 'Oops!', 'No puedes generar un PDF vacio!');
        }

    });

    function msj(icon, titulo, texto) {
        Swal.fire({
            icon: icon,
            title: titulo,
            text: texto,
        })
    }
</script>