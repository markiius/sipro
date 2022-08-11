<div class="container-fluid">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">

                    <br>

                    NOMBRE DEL PROGRAMA PRESUPUESTARIO: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $programa->nombre_programa ?></span> <br>
                    OBJETIVO / FIN DEL PROGRAMA PRESUPUESTARIO: <span style="font-weight: bold; text-emphasis-color: black; color:black"><?= $programa->objetivo_programa ?></span> 

                    <hr>
                    <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">
                        AGREGAR COMPONENTES
                    </div>
                    <br>
                    <form id="form-programa">
                        <div class="row">
                            <input type="text" id="programa" name="id_programa" value="<?= $programa->id_programa ?>">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NUMERO DE COMPONENTE</label>
                                    <input type="number" min="0" max="6" class="form-control" id="numero_componente" name="numero_componente" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Escribir el numero del componente</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NOMBRE DEL COMPONENTE</label>
                                    <input type="text" class="form-control" id="nombre_componente" name="nombre_componente" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Describe el nombre del componente</div>
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
                            <button class="btn btn-secondary btn-sm btn btn-sm  btn-osw-active"  id="btnGuardarComponente">AGREGAR COMPONENTE <i class="fas fa-pen-square"></i></button>
                        </div>


                    </form>

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
                    
                        <span style="font-weight: bold; text-emphasis-color: black; color:black">LISTA DE COMPONENTES AGREGADOS</span>
                

                    <div class="table-responsive">
                        <table id="mitable" class="table table-sm table-bordered text-dark">
                        <thead class=" text-white" style="font-size: 15px; background-color:#2C2D2D;">
                                <th>#</th>
                                <th>NUMERO COMPONENTE</th>
                                <th>NOMBRE COMPONENTE</th>
                                <th>AGREGAR ACTIVIDADES</th>
                                <th>MODIFICAR</th>
                                <th>ELIMINAR</th>
                            </thead>
                            <tbody>
                                <?php $cont = 1 ?>
                                <?php foreach ($componentes as $key => $componente) : ?>
                                    <tr>
                                        <td><?= $cont ?></td>
                                        <td><?= $componente->numero_componente ?></td>
                                        <td><?= $componente->nombre_componente ?></td>
                                        <td class="text-center"><a href="<?= base_url('') ?>Componente/Actividad/<?= $programa->id_programa ?>/<?= $componente->id_componente ?>" class="btn btn-success btn-sm"><i class="fas fa-id-badge"></i></a></td>
                                        <td><button onclick="modalModificarComponente(<?=$componente->id_componente?>)" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdate"><i class="far fa-edit"></i></button></td>
                                        <td><button onclick="eliminarComponente(<?=$componente->id_componente?>)" class="btn btn-danger btn-sm" ><i class="fas fa-trash-alt"></i></button></td>
                                    </tr>
                                    <?php $cont++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <th>#</th>
                                <th>NUMERO COMPONENTE</th>

                                <th>NOMBRE COMPONENTE</th>
                                <th>AGREGAR ACTIVIDADES</th>
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
        <br>
    </div>
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
            <form id="form-componente-update">
                        <div class="row">
                            <input type="text" id="id_componente" name="id_componente" hidden>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NUMERO DE COMPONENTE</label>
                                    <input type="number" min="0" max="6" class="form-control" id="numero_componente_m" name="numero_componente" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Escribir el numero del componente</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NOMBRE DEL COMPONENTE</label>
                                    <input type="text" class="form-control" id="nombre_componente_m" name="nombre_componente" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Describe el nombre del componente</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-success btn-sm " data-bs-toggle="modal" data-bs-target="#actividad" id="btnModificarComponente">GUARDAR CAMBIOS <i class="fas fa-pen-square"></i></button>
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
            $('#programa').hide();
        });

        $('#btnGuardarComponente').on('click', function(e) {
            e.preventDefault();
            var numero_componente = $('#numero_componente').val();
            var nombre_componente = $('#nombre_componente').val();

            var data = $('#form-programa').serialize();
            if (!numero_componente == '' && !nombre_componente == '') {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>Componente/Nuevo",
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

        function modalModificarComponente(id_componente){
            
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Obtener/Componente",
                data: {
                    id_componente: id_componente
                },
                beforeSend: function() {
                    $('#spinerCarga').hide();
                },
                success: function(data) {
                    
                    $('#spinerCarga').hide();
                    data = JSON.parse(data);
                    $('#id_componente').val(data['id_componente']);
                    $('#numero_componente_m').val(data['numero_componente']);
                    $('#nombre_componente_m').val(data['nombre_componente']);
                },
                error: function() {}
            })
        }

        $('#btnModificarComponente').on('click', function(e){
            e.preventDefault();
            var data = $('#form-componente-update').serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>Modificar/Componente",
                data: data,
                beforeSend: function() {},
                success: function(data) {
                    location.reload();
                },
                error:function(){}
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

        function eliminarComponente(id_componente) {
            Swal.fire({
                title: "Eliminar Componente",
                text: "Si elimina esta COMPONENTE se eliminara el automatico todas sus actividades registradas, asi como su calendarizacion",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: "POST",
                        url: "<?= base_url()?>Eliminar/Componente",
                        data:{
                            id_componente: id_componente
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