<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary text-center">Unidades Responsables</h2>
            <a id="newUser" class="btn btn-success" href="#" data-toggle="modal" data-target="#unidadModal"><i class="fas fa-fw fa-plus"></i>Nueva Unidad</a>
        </div>
        <div class="card-body text-dark">
            <div class="table-responsive">
                <table id="mitable" class="table table-sm table-bordered text-dark">
                    <thead class=" text-white" style="font-size: 15px; background-color:#2C2D2D;">
                        
                        <th>id</th>
                        <th>Unidad responsable</th>
                        <th>Municipio</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        <?php if ($unidades) {
                            $x = 1;
                            foreach ($unidades as $unidad) { ?>
                                <tr>
                                    <td><?= ucwords(strtolower($unidad->id_unidad_responsable)) ?></td>
                                    <td><?= ucwords(strtolower($unidad->nombre_unidad)) ?></td>
                                    <td><?= ucwords(strtolower($unidad->NombreMunicipio)) ?></td>
                                    <td>
                                        <button id="<?= $unidad->id_unidad_responsable ?>" onclick="modalUnidad(<?= $unidad->id_unidad_responsable ?>)" class="btn btn-success"><i class="fas fa-fw fa-edit"></i></button>
                                        <!-- <button id="<?= $unidad->id_unidad_responsable ?>" onclick="deleteUnidad(<?= $unidad->id_unidad_responsable ?>)" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
                                    </td>
                                </tr>
                        <?php $x = $x + 1;
                            }
                        } ?>
                    </tbody>
                    <tfoot>
                        <th>id</th>
                        <th>Unidad responsable</th>
                        <th>Municipio</th>
                        <th>Opciones</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unidadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Unidad Responsable</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="container">
                <form id="form-unidad">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="unidadResponsable" class="form-label">NOMBRE DE LA UNIDAD RESPONSABLE</label>
                                <input type="text" class="form-control" id="unidadResponsable" name="unidadResponsable">
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
                <a class="btn btn-success btn-insertUnidad" href="#">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unidadModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Unidad Responsable</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="container">
                <form id="form-unidadUpdate">
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="idUnidad" name="idUnidad" hidden>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="unidadResponsableUpdate" class="form-label">NOMBRE DE LA UNIDAD RESPONSABLE</label>
                                <input type="text" class="form-control" id="unidadResponsableUpdate" name="unidadResponsableUpdate">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="municipioUpdate" class="form-label">MUNICIPIO</label>
                                <input type="text" class="form-control" id="municipioUpdate" name="municipioUpdate" disabled>
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
                <a class="btn btn-success btn-updateUnidad" href="#">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#mitable').DataTable();
        $('#spinerCarga').hide();
    });

    $('.btn-insertUnidad').on('click', function() {
        $('#spinerCarga').show();
        var unidadResponsable = document.getElementById('unidadResponsable').value;
        var municipio = document.getElementById('municipio').value;

        if (unidadResponsable && municipio) {
            var data = $('#form-unidad').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>UnidadesController/insertarUnidad",
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

    function deleteUnidad(id) {
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>UnidadesController/eliminarUnidad",
            data: {
                'idUnidad': id
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

    function modalUnidad(id) {
        $('#spinerCarga').hide();
        $('#unidadModalUpdate').modal('show')

        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>UnidadesController/buscarUnidad",
            data: {
                'idUnidad': id
            },
            beforeSend: function() {
                $('#spinerCarga').hide();
            },
            success: function(data) {
                data = JSON.parse(data);
                $('#idUnidad').val(id);
                $('#unidadResponsableUpdate').val(data['nombre_unidad']);
                $('#municipioUpdate').val(data['NombreMunicipio']);
            },
            error: function() {}
        });
    }

    $('.btn-updateUnidad').on('click', function() {
        $('#spinerCarga').show();
        var unidadResponsable = document.getElementById('unidadResponsableUpdate').value;
        if (unidadResponsable) {
            var data = $('#form-unidadUpdate').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>UnidadesController/actualizarUnidad",
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
</script>