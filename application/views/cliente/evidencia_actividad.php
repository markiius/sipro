<div class="container-fluid">
    <div class="card border-left-secondary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-info text-uppercase mb-1">

                    </div>
                    <span style="font-weight: bold; text-emphasis-color: black; color:black">LISTA DE EVIDENCIAS ADJUNTADAS</span>
                    <div class="table-responsive">
                        <table id="mitable" class="table table-sm table-bordered text-dark">
                            <thead class="bg-secondary text-white">
                                <th>#</th>
                                <th>NUMERO PERSONAS ATENDIDAS</th>
                                <th>FECHA ACTIVIDAD</th>
                                <th>DIRECCIONES O DEPENDENCIAS EXTERNAS INVOLUCRADAS</th>
                                <th>FOTOGRAFIA 1</th>
                                <th>FOTOGRAFIA 2</th>
                                <th>MODIFICAR</th>
                            </thead>
                            <tbody>
                                <?php 
                                    if(sizeof($evidencias) == 0 ){
                                        echo '<span style="color: red; font-weight: bold; font-size: 24px;">No hay evidencia cargada</span>';
                                    }
                                ?>
                                <?php
                                $cont = 1;
                                foreach ($evidencias as $key => $value) :
                                ?>
                               
                                    <tr>
                                        <td><?= $cont ?></td>
                                        <td><?= $value->personas_atendidas ?></td>
                                        <td><?= $value->fecha_actividad ?></td>
                                        <td><?= $value->direcciones_dependencias ?></td>
                                        <td><img src="<?= base_url() ?>uploads/<?= $value->fotografia_1 ?>" alt="" width="100" height="100"></td>
                                        <td><img src="<?= base_url() ?>uploads/<?= $value->fotografia_2 ?>" alt="" width="100" height="100"></td>
                                        <td align="center"><i onclick="eliminarReporteActividad(<?=$value->id_reporte_fotografico?>)" class="fas fa-trash-alt" style="color: red;"></i></td>
                                    </tr>
                                <?php
                                    $cont++;
                                endforeach; ?>
                            </tbody>
                            <tfoot>
                                <th>#</th>
                                <th>PERSONAS ATENDIDAS</th>
                                <th>FECHA ACTIVIDAD</th>
                                <th>DIRECCIONES O DEPENDENCIAS EXTERNAS INVOLUCRADAS</th>
                                <th>FOTOGRAFIA 1</th>
                                <th>FOTOGRAFIA 2</th>
                                <th>MODIFICAR</th>
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
</div>
<br>

<script>
    function eliminarReporteActividad(id){
        
        Swal.fire({
            title: "Info",
            text: "Deseas terminar tu captura de datos",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Si!'
        }).then((result) => {
            if (result.isConfirmed) {
               
                $.ajax({
                    method: "POST",
                    
                    url: "<?= base_url() ?>Evidencia/Eliminar",
                    data: {
                        id_evidencia : id
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        if (data == 'success') {
                            mensaje("success", "Buen trabajo!", "La evidencia ha sido eliminada correctamente");
                        } else {
                            alert("Ohh hubo un error" + data);
                        }
                    },
                    error: function() {

                    }
                });
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
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            }
        })

    }
</script>