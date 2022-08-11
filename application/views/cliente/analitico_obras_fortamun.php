<div class="container-fluid">

    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">


                <?php
                // Obteniendo la fecha actual del sistema con PHP
                $fechaActual = date('d-m-Y');
                //echo $fechaActual;
                $acum = 0;

                if (empty($obras)) {
                    echo '<span style="font-weight: bold; text-emphasis-color: black; color:red">No hay ninguna obra cargada</span>';
                } else {
                    foreach ($obras as $key => $value) {
                        $acum = $acum + $value->monto_obra;
                    }
                }


                ?>
                <div class="row justify-content-end">
                    <h5>
                        <?= $fechaActual; ?>
                    </h5>

                </div>

                <?php foreach ($municipio as $key => $value) :
                    $nombreMunicipio = strtoupper($value->NombreMunicipio);
                endforeach; ?>

                <h4 style="text-align: center; font-family: 'Heebo', sans-serif;">
                    <span style="font-weight: bold; text-emphasis-color: black; color:black">
                        H. AYUNTAMIENTO DE <?= $nombreMunicipio ?> <br> 2021 - 2024 <br>
                        ANALITICO DE OBRAS FORTAMUN
                    </span>
                </h4>


                <div id="sihayinfo">



                    <div class="row">
                        <div class="col col-12 pull-right" style="font-family: 'Heebo', sans-serif; ">
                            DIRECCIÓN/DEPENDENCIA RESPONSABLE: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $usuario->nombre_unidad ?> </span> <br>
                            NOMBRE DEL TITULAR DE LA DIRECCIÓN / DEP.: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $usuario->nombre ?> <?= $usuario->apellido_paterno ?> <?= $usuario->apellido_materno ?></span> <br>
                            TECHO FINANCIERO DE FORTAMUN ACUMULADO: <span style="font-weight: bold; text-emphasis-color: black; color:black">$ <?= number_format($acum, 2) ?></span>

                        </div>

                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            <h2 class="m-0 "> <strong>Analitico de obra</strong> </h2>

            <a id="nuevoAnalitico" href="#" class="btn btn-success btn-sm btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-fw fa-plus"></i>
                </span>
                <span class="text">Nueva Obra</span>
            </a>


        </div>
        <div class="card-body text-dark">
            <div class="table-responsive">
                <table id="mitable" class="table table-sm table-bordered text-dark">
                    <thead class=" text-white" style="font-size: 15px; background-color:#2C2D2D;">
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
                        <th>Fecha de captura</th>


                    </thead>
                    <tbody>
                        <?php if ($obras) {
                            $x = 1;
                            foreach ($obras as $key => $value) { ?>
                                <tr>
                                    <td style="font-size: 15px; background-color:#D5D7D7;"> &nbsp;<i onclick="modificar(<?= $value->id_analitico ?>)" class="fas fa-edit"></i> &nbsp; &nbsp; &nbsp; <i onclick="eliminar(<?= $value->id_analitico ?>)" class="fas fa-trash-alt"></i></td>
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
                                    <td><?= $value->fecha_captura ?></td>


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
                        <th>Fecha de captura</th>


                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- <div class="modal fade" id="modalAnalitico" > -->
<div class="modal fade" id="modalAnalitico" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" id="titulo">
                <h4>INFORMACION DE OBRA</h4>
            </div>
            <div class="modal-body">
                <form id="form-anaitico" class="needs-validation" novalidate>
                    <div id="parte_1">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">EJERCICIO FISCAL</label>
                                <input type="text" class="form-control" id="ejercicio_fiscal" name="ejercicio_fiscal" value="2022" readonly required>
                                <div class="invalid-feedback">
                                    El ejersicio fiscal es requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">NOMBRE DE LA ENTIDAD</label>
                                <input type="text" class="form-control" id="nombre_entidad" name="nombre_entidad" value="PUEBLA" readonly required>
                                <div class="invalid-feedback">
                                    Nombre de la entidad requerida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">CLAVE DE LA ENTIDAD</label>
                                <input type="number" class="form-control" id="clave_entidad" name="clave_entidad" value="21" readonly required>
                                <div class="invalid-feedback">
                                    Clave de la entidad requerida
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">NOMBRE DEL MUNICIPIO</label>
                                <input type="text" class="form-control" id="nombre_municipio" name="municipio_municipio" value="<?= $nombreMunicipio ?>" readonly required>
                                <div class="invalid-feedback">
                                    Nombre del municipio requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">CLAVE DEL MUNICIPIO</label>
                                <input type="number" class="form-control" id="clave_municipio" name="clave_municipio" required>
                                <div class="invalid-feedback">
                                    Clave del municipio requerida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">NOMBRE DE LOCALIDAD</label>
                                <select class="form-control" id="nombre_localidad" name="nombre_localidad" required>
                                    <option selected disabled value="">Seleccionar...</option>
                                    <?php foreach ($localidades as $key => $value) : ?>
                                        <option value="<?= $value->idlocalidad ?>"><?= $value->localidad ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <div class="invalid-feedback">
                                    Nombre de la licalidad requerida
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">CLAVE DE LOCALIDAD</label>
                                <input type="text" class="form-control" id="clave_localidad" name="clave_localidad" required>
                                <div class="invalid-feedback">
                                    Clave de localidad requerida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">NUMERO DE OBRA</label>
                                <input type="number" min="0" class="form-control" id="numero_obra" name="numero_obra" required>
                                <div class="invalid-feedback">
                                    numero de obra requerida
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">FOLIO MIDS</label>
                                <input type="number" min="0" class="form-control" id="folio_mids" name="folio_mids" required>
                                <div class="invalid-feedback">
                                    Folio requerido
                                </div>
                            </div> -->
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <a id="siguiente_1" href="#" class="btn btn-success btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                </span>
                                <span class="text">Siguiente</span>
                            </a>
                        </div>
                    </div>




                    <div id="parte_2">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">DESCRIPCION Y UBICACION DE LA OBRA / ACCION</label>
                                <textarea class="form-control" id="ubicacion_obra" name="ubicacion_obra" rows="3" required></textarea>
                                <!-- <input type="text" class="form-control" id="ubicacion_obra" required> -->
                                <div class="invalid-feedback">
                                    Descripcion de obra requerida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">TIPO DE LOCALIDAD</label>
                                <select class="form-control" id="tipo_localidad" name="tipo_localidad" required>
                                    <option selected disabled value="">Seleccionar...</option>
                                    <?php foreach ($tipo_localidad as $key => $value) : ?>
                                        <option value="<?= $value->id_tipo_localidad ?>"><?= $value->tipo_localidad ?></option>
                                    <?php endforeach; ?>


                                </select>
                                <div class="invalid-feedback">
                                    Tipo de localidad requerida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">RUBRO O ACCION</label>
                                <select class="form-control" id="rubro_accion" name="rubro_accion" required>
                                    <option selected disabled value="">Seleccionar...</option>
                                    <?php foreach ($rubros as $key => $value) : ?>
                                        <option value="<?= $value->id_rubro ?>"><?= $value->nombre_rubro ?></option>
                                    <?php endforeach; ?>


                                </select>
                                <div class="invalid-feedback">
                                    Rubro o accion requerido
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">POBLACION TOTAL</label>
                                <input type="number" class="form-control" min="1" id="poblacion_total" name="poblacion_total" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">POBLACION EN REFERENCIA</label>
                                <input type="number" class="form-control" min="1" id="poblacion_referencia" name="poblacion_referencia" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">POBLACION OBJETIVO</label>
                                <input type="number" class="form-control" min="1" id="poblacion_objetivo" name="poblacion_objetivo" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">POBLACION ATENDIDA</label>
                                <input type="text" class="form-control" id="poblacion_atendida" name="poblacion_atendida" readonly required>
                               
                                <div class="invalid-feedback">
                                    Descripcion de obra requerida
                                </div>
                            </div>




                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">TOTAL HOMBRES</label>
                                <input type="number" class="form-control" min="1" id="numero_hombres" name="numero_hombres" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">TOTAL MUJERES</label>
                                <input type="number" class="form-control" min="1" id="numero_mujeres" name="numero_mujeres" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <a id="atras_2" href="#" class="btn btn-warning btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-arrow-alt-circle-left"></i>
                                </span>
                                <span class="text">Atras</span>
                            </a>

                            <a id="siguiente_2" href="#" class="btn btn-success btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                </span>
                                <span class="text">Siguiente</span>
                            </a>
                        </div>

                    </div>

                    <div id="parte_3">
                        <div class="row">

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">GRADO DE MARGINACION</label>
                                <input type="text" class="form-control" id="grado_marginacion" name="grado_marginacion" required>
                                <div class="invalid-feedback">
                                    Grado de marginacion requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">MONOTO DE OBRA / ACCION</label>
                                <input type="text" class="form-control" id="monto_obra" name="monto_obra" placeholder="$" required>
                                <div class="invalid-feedback">
                                    Monto requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">FUENTE DE FINANCIAMIENTO</label>
                                <input type="text" class="form-control" id="fuente_financiamiento" name="fuente_financiamiento" value="FORTAMUN" readonly required>
                                <div class="invalid-feedback">
                                    Fuente requerida
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">AVANCE FINANCIERO</label>
                                <input type="text" class="form-control" id="avance_financiero" name="avance_financiero" placeholder="%" required>
                                <div class="invalid-feedback">
                                    Avance requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">AVANCE FISICO</label>
                                <input type="text" class="form-control" id="avance_fisico" name="avance_fisico" placeholder="%" required>
                                <div class="invalid-feedback">
                                    Monto reuqerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">GEO-LOCALIZACION DE LA OBRA / ACCION, DESCIPCION O LINK</label>
                                <input type="text" class="form-control" id="geo_localizacion" name="geo_localizacion" required>
                                <div class="invalid-feedback">
                                    Fuente requerida
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <a id="atras_3" href="#" class="btn btn-warning btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-arrow-alt-circle-left"></i>
                                </span>
                                <span class="text">Atras</span>
                            </a>
                        </div>


                        <br>
                        <div class="row justify-content-end">
                            <button id="btnGuardarInformacionAnalitico" href="#" class="btn btn-success btn-sm btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="far fa-save"></i>
                                </span>
                                <span class="text">GUARDAR INFORMACION</span>
                            </button>
                        </div>

                    </div>

                </form>

            </div>
            <div class="modal-footer">

                <button id="cerrarModalNew" type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">CERRAR</button>
                <div id="botonModal">

                </div>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalAnaliticoModificar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" id="titulo">
                <h4>MODIFICAR INFORMACION DE OBRA</h4>
            </div>
            <div class="modal-body">
                <form id="form-anaitico-fism-update" class="needs-validation" novalidate>
                    <div id="parte_1">
                        <input type="text" id="id_analitico_fism_m" name="id_analitico_fism" hidden>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">EJERCICIO FISCAL</label>
                                <input type="text" class="form-control" id="ejercicio_fiscal_m" name="ejercicio_fiscal" value="2022" required>
                                <div class="invalid-feedback">
                                    El ejersicio fiscal es requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">NOMBRE DE LA ENTIDAD</label>
                                <input type="text" class="form-control" id="nombre_entidad_m" name="nombre_entidad" value="PUEBLA" required>
                                <div class="invalid-feedback">
                                    Nombre de la entidad requerida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">CLAVE DE LA ENTIDAD</label>
                                <input type="number" class="form-control" id="clave_entidad_m" name="clave_entidad" value="21" required>
                                <div class="invalid-feedback">
                                    Clave de la entidad requerida
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">NOMBRE DEL MUNICIPIO</label>
                                <input type="text" class="form-control" id="nombre_municipio_m" name="municipio_municipio" value="<?= $nombreMunicipio ?>" required>
                                <div class="invalid-feedback">
                                    Nombre del municipio requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">CLAVE DEL MUNICIPIO</label>
                                <input type="number" class="form-control" id="clave_municipio_m" name="clave_municipio" required>
                                <div class="invalid-feedback">
                                    Clave del municipio requerida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">NOMBRE DE LOCALIDAD</label>
                                <select class="form-control" id="nombre_localidad_m" name="nombre_localidad" required>
                                    <option selected disabled value="">Seleccionar...</option>
                                    <?php foreach ($localidades as $key => $value) : ?>
                                        <option value="<?= $value->idlocalidad ?>"><?= $value->localidad ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <div class="invalid-feedback">
                                    Nombre de la licalidad requerida
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">CLAVE DE LOCALIDAD</label>
                                <input type="text" class="form-control" id="clave_localidad_m" name="clave_localidad" required>
                                <div class="invalid-feedback">
                                    Clave de localidad requerida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">NUMERO DE OBRA</label>
                                <input type="number" min="0" class="form-control" id="numero_obra_m" name="numero_obra" required>
                                <div class="invalid-feedback">
                                    numero de obra requerida
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">FOLIO MIDS</label>
                                <input type="number" min="0" class="form-control" id="folio_mids_m" name="folio_mids" required>
                                <div class="invalid-feedback">
                                    Folio requerido
                                </div>
                            </div> -->
                        </div>
                        <br>
                        <!-- <div class="row justify-content-center">
                            <a id="siguiente_1_m" href="#" class="btn btn-success btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                </span>
                                <span class="text">Siguiente</span>
                            </a>
                        </div> -->
                    </div>




                    <div id="parte_2">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">DESCRIPCION Y UBICACION DE LA OBRA / ACCION</label>
                                <textarea class="form-control" id="ubicacion_obra_m" name="ubicacion_obra" rows="3" required></textarea>
                                <!-- <input type="text" class="form-control" id="ubicacion_obra" required> -->
                                <div class="invalid-feedback">
                                    Descripcion de obra requerida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">TIPO DE LOCALIDAD</label>
                                <select class="form-control" id="tipo_localidad_m" name="tipo_localidad" required>
                                    <option selected disabled value="">Seleccionar...</option>
                                    <?php foreach ($tipo_localidad as $key => $value) : ?>
                                        <option value="<?= $value->id_tipo_localidad ?>"><?= $value->tipo_localidad ?></option>
                                    <?php endforeach; ?>


                                </select>
                                <div class="invalid-feedback">
                                    Tipo de localidad requerida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">RUBRO O ACCION</label>
                                <select class="form-control" id="rubro_accion_m" name="rubro_accion" required>
                                    <option selected disabled value="">Seleccionar...</option>
                                    <?php foreach ($rubros as $key => $value) : ?>
                                        <option value="<?= $value->id_rubro ?>"><?= $value->nombre_rubro ?></option>
                                    <?php endforeach; ?>


                                </select>
                                <div class="invalid-feedback">
                                    Rubro o accion requerido
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">POBLACION TOTAL</label>
                                <input type="number" class="form-control" min="1" id="poblacion_total_m" name="poblacion_total" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">POBLACION EN REFERENCIA</label>
                                <input type="number" class="form-control" min="1" id="poblacion_referencia_m" name="poblacion_referencia" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">POBLACION OBJETIVO</label>
                                <input type="number" class="form-control" min="1" id="poblacion_objetivo_m" name="poblacion_objetivo" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">POBLACION ATENDIDA</label>
                                <input type="text" class="form-control" id="poblacion_atendida_m" name="poblacion_atendida" readonly required>
                                
                                <div class="invalid-feedback">
                                    Descripcion de obra requerida
                                </div>
                            </div>




                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">TOTAL HOMBRES</label>
                                <input type="number" class="form-control" min="1" id="numero_hombres_m" name="numero_hombres" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">TOTAL MUJERES</label>
                                <input type="number" class="form-control" min="1" id="numero_mujeres_m" name="numero_mujeres" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <!-- <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">CRITERIOS DE ASIGNACION</label>
                                <select class="form-control" id="criterios_asignacion_m" name="criterios_asignacion" required>
                                    <option selected disabled value="">Seleccionar...</option>

                                    <?php foreach ($criterios as $key => $value) : ?>
                                        <option value="<?= $value->id_criterio_asignacion ?>"><?= $value->nombre_criterio ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Criterio requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">INDICADORES DE VIVIENDA</label>
                                <select class="form-control" id="indicadores_vivienda_m" name="indicadores_vivienda" required>
                                    <option selected disabled value="">Seleccionar...</option>
                                    <?php foreach ($indicadores as $key => $value) : ?>
                                        <option value="<?= $value->id_indicador ?>"><?= $value->nombre_indicador ?></option>
                                    <?php endforeach; ?>

                                </select>
                                <div class="invalid-feedback">
                                    Invidador requerido
                                </div>
                            </div> -->
                        </div>
                        <br>
                        <!-- <div class="row justify-content-center">
                            <a id="atras_2_m" href="#" class="btn btn-warning btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-arrow-alt-circle-left"></i>
                                </span>
                                <span class="text">Atras</span>
                            </a>

                            <a id="siguiente_2_m" href="#" class="btn btn-success btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                </span>
                                <span class="text">Siguiente</span>
                            </a>
                        </div> -->

                    </div>

                    <div id="parte_3">
                        <div class="row">
                            <!-- <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">NUMERO DE POBLACION CON CARENCIA</label>
                                <input type="text" class="form-control" id="poblacion_carencia_m" name="poblacion_carencia" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">TOTAL DE POBLACION CON CARENCIA, DEL INDICADOR ATENDIDA</label>
                                <input type="text" class="form-control" id="total_poblacion_carencia_m" name="total_poblacion_carencia" required>
                                <div class="invalid-feedback">
                                    Numero requerido
                                </div>
                            </div> -->
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">GRADO DE MARGINACION</label>
                                <input type="text" class="form-control" id="grado_marginacion_m" name="grado_marginacion" required>
                                <div class="invalid-feedback">
                                    Grado de marginacion requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">MONOTO DE OBRA / ACCION</label>
                                <input type="text" class="form-control" id="monto_obra_m" name="monto_obra" placeholder="$" required>
                                <div class="invalid-feedback">
                                    Monto reuqerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">FUENTE DE FINANCIAMIENTO</label>
                                <input type="text" class="form-control" id="fuente_financiamiento_m" name="fuente_financiamiento" value="FISM" required>
                                <div class="invalid-feedback">
                                    Fuente requerida
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">AVANCE FINANCIERO</label>
                                <input type="text" class="form-control" id="avance_financiero_m" name="avance_financiero" placeholder="%" required>
                                <div class="invalid-feedback">
                                    Avance requerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">AVANCE FISICO</label>
                                <input type="text" class="form-control" id="avance_fisico_m" name="avance_fisico" placeholder="%" required>
                                <div class="invalid-feedback">
                                    Monto reuqerido
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">GEO-LOCALIZACION DE LA OBRA / ACCION, DESCIPCION O LINK</label>
                                <input type="text" class="form-control" id="geo_localizacion_m" name="geo_localizacion" required>
                                <div class="invalid-feedback">
                                    Fuente requerida
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        </div>
                        <br>
                        <!-- <div class="row justify-content-center">
                            <a id="atras_3_m" href="#" class="btn btn-warning btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-arrow-alt-circle-left"></i>
                                </span>
                                <span class="text">Atras</span>
                            </a>
                        </div> -->


                        <br>
                        <div class="row justify-content-end">
                            <button id="btnGuardarInformacionAnaliticoF_update" href="#" class="btn btn-success btn-sm btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="far fa-save"></i>
                                </span>
                                <span class="text">GUARDAR CAMBIOS</span>
                            </button>
                        </div>

                    </div>

                </form>

            </div>
            <div class="modal-footer">

                <button id="cerrarModalNew" type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">CERRAR</button>
                <div id="botonModal">

                </div>

            </div>
        </div>
    </div>
</div>



<script>
    var status = false;
    $(document).ready(function() {

        $('#mitable').DataTable();
        $('#spinerCarga').hide();
        $('#parte_2').hide();
        $('#parte_3').hide();
    });

    $('#siguiente_1').on('click', function() {
        $('#parte_1').hide();
        $('#parte_2').show();
    });

    $('#siguiente_2').on('click', function() {
        $('#parte_1').hide();
        $('#parte_2').hide();
        $('#parte_3').show();
    });

    $('#atras_2').on('click', function() {
        $('#parte_1').show();
        $('#parte_2').hide();
        $('#parte_3').hide();
    });

    $('#atras_3').on('click', function() {
        $('#parte_1').hide();
        $('#parte_2').show();
        $('#parte_3').hide();
    });

    $('#numero_hombres').change(function() {
        var hombres = $('#numero_hombres').val();
        var mujeres = $('#numero_mujeres').val();
        var totalPoblacion = (parseInt(hombres) + parseInt(mujeres));
        $('#poblacion_atendida').val(totalPoblacion);
    });

    $('#numero_mujeres').change(function() {
        var hombres = $('#numero_hombres').val();
        var mujeres = $('#numero_mujeres').val();
        var totalPoblacion = (parseInt(hombres) + parseInt(mujeres));
        $('#poblacion_atendida').val(totalPoblacion);
    });

    $('#nuevoAnalitico').on('click', function() {
        $('#modalAnalitico').modal('show');
    });

    $('#cerrarModalNew').on('click', function() {

        $('#modalAnalitico').modal('hide');

    });

    $('#btnGuardarInformacionAnalitico').on('click', function(e) {
        e.preventDefault();
        var ejercicio_fiscal = $("#ejercicio_fiscal").val();
        var nombre_entidad = $("#nombre_entidad").val();
        var clave_entidad = $("#clave_entidad").val();
        var nombre_municipio = $("#nombre_municipio").val();
        var clave_municipio = $("#clave_municipio").val();
        var nombre_localidad = $("#nombre_localidad").val();
        var clave_localidad = $("#clave_localidad").val();
        var numero_obra = $("#numero_obra").val();
        /* var folio_mids = $("#folio_mids").val(); */
        var ubicacion_obra = $("#ubicacion_obra").val();
        var tipo_localidad = $("#tipo_localidad").val();
        var rubro_accion = $("#rubro_accion").val();
        var poblacion_total = $("#poblacion_total").val();
        var poblacion_referencia = $("#poblacion_referencia").val();
        var poblacion_objetivo = $("#poblacion_objetivo").val();
        var poblacion_atendida = $("#poblacion_atendida").val();
        var numero_hombres = $("#numero_hombres").val();
        var numero_mujeres = $("#numero_mujeres").val();
        var grado_marginacion = $("#grado_marginacion").val();
        /*  var criterios_asignacion = $("#criterios_asignacion").val();
         var indicadores_vivienda = $("#indicadores_vivienda").val(); */
        /* var poblacion_carencia = $("#poblacion_carencia").val();
        var total_poblacion_carencia = $("#total_poblacion_carencia").val(); */
        var monto_obra = $("#monto_obra").val();
        var fuente_financiamiento = $("#fuente_financiamiento").val();
        var avance_financiero = $("#avance_financiero").val();
        var avance_fisico = $("#avance_fisico").val();
        var geo_localizacion = $("#geo_localizacion").val();


        if (ejercicio_fiscal != "" && nombre_entidad != "" && clave_entidad != "" && nombre_municipio != "" && clave_municipio != "" && nombre_localidad != null &&
            clave_localidad != "" && numero_obra != "" && ubicacion_obra != "" && tipo_localidad != null && rubro_accion != null && poblacion_total != "" &&
            poblacion_referencia != "" && poblacion_objetivo != "" && poblacion_atendida != "" && numero_hombres != "" && numero_mujeres != "" &&
            grado_marginacion != "" && monto_obra != "" && fuente_financiamiento != "" &&
            avance_financiero != "" && avance_fisico != "" && geo_localizacion != "") {
            

            var data = $('#form-anaitico').serialize();
            
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Nuevo/Analitico/Forta",
                data: data,
                beforeSend: function() {
                    $('#btnGuardarInformacionAnalitico').prop('disabled', true);
                },
                success: function(data) {
                    location.reload();
                },
                error: function(data) {
                    location.reload();
                    alert("error");
                }

            });

        } else {
            mensaje("warning", "Campos incompletos", "Por favor llenar toda la informacion solicitada!");

            
        }

        //guardarAnalitico();


    });

    function guardarAnalitico() {

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        status = false;
                    } else {

                        status = true;
                        var data = $('#form-anaitico').serialize();

                        $.ajax({
                            method: "POST",
                            url: "<?= base_url() ?>Nuevo/Analitico/Forta",
                            data: data,
                            beforeSend: function() {
                                $('#btnGuardarInformacionAnalitico').prop('disabled', true);
                            },
                            success: function(data) {
                                location.reload();
                            },
                            error: function(data) {
                                location.reload();
                                alert("error");
                            }

                        });
                    }

                    form.classList.add('was-validated')
                }, false)
            })


    }


    function modificar(id) {
        $.ajax({
            method: "post",
            url: "<?= base_url() ?>Analitico/get",
            data: {
                id_analitico: id
            },
            beforeSend: function(data) {

            },
            success: function(data) {

                $('#modalAnaliticoModificar').modal('show');
                console.log(data);

                data = JSON.parse(data);
                $('#id_analitico_fism_m').val(data.id_analitico);
                $('#ejercicio_fiscal_m').val(data.ejercicio_fiscal);
                $('#nombre_entidad_m').val(data.nombre_entidad);
                $('#clave_entidad_m').val(data.clave_entidad);
                $('#nombre_municipio_m').val(data.id_municipio);
                $('#clave_municipio_m').val(data.clave_municipio);
                $('#nombre_localidad_m').val(data.id_localidad);
                $('#clave_localidad_m').val(data.clave_localidad);
                $('#numero_obra_m').val(data.numero_obra);
                $('#folio_mids_m').val(data.folio_mids);
                $('#ubicacion_obra_m').val(data.ubicacion_obra);
                $('#tipo_localidad_m').val(data.id_tipo_localidad);
                $('#rubro_accion_m').val(data.id_rubro);
                $('#poblacion_total_m').val(data.poblacion_total);
                $('#poblacion_referencia_m').val(data.poblacion_referencia);
                $('#poblacion_objetivo_m').val(data.poblacion_objetivo);
                $('#poblacion_atendida_m').val(data.poblacion_atendida);
                $('#numero_hombres_m').val(data.hombres);
                $('#numero_mujeres_m').val(data.mujeres);
                $('#grado_marginacion_m').val(data.grado_marginacion);
                $('#criterios_asignacion_m').val(data.id_criterio);
                $('#indicadores_vivienda_m').val(data.id_indicador);
                $('#poblacion_carencia_m').val(data.poblacion_carencia);
                $('#total_poblacion_carencia_m').val(data.total_poblacion_carencia);
                $('#monto_obra_m').val(data.monto_obra);
                $('#fuente_financiamiento_m').val(data.fuente_financiamiento);
                $('#avance_financiero_m').val(data.avance_financiero);
                $('#avance_fisico_m').val(data.avance_fisico);
                $('#geo_localizacion_m').val(data.geo_localizacion);


            },
            error: function(data) {

            }
        })
    }

    $('#btnGuardarInformacionAnaliticoF_update').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Deseas modificar el analitico?',
            text: "Todos los cambios seran efectuados al precionar guardar!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, guardar cambios!'
        }).then((result) => {
            if (result.isConfirmed) {

                var data = $('#form-anaitico-fism-update').serialize();
                console.log(data);
                $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>AnaliticoFISM/update",
                    data: data,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data = true) {
                            Swal.fire(
                                'Cambios Guardados',
                                'Todos los cambios fueron guardados satisfactoriamente!',
                                'success'
                            )
                            location.reload();
                        } else {

                        }
                    },
                    error: function(data) {

                    }
                })

            }
        })
    });

    function eliminar(id) {
        Swal.fire({
            title: 'Deseas Eliminar este analitico?',
            text: "Al eliminar la infomacion no podras recuperarla !",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>Analitico/DeleteFISM",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data = true) {
                            location.reload();
                        }
                    }
                })
            }
        })
    }

    function mensaje(icon, titulo, texto) {
        Swal.fire({
            title: titulo,
            text: texto,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok!'
        })

    }
</script>