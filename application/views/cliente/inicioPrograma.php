<div class="container-fluid">
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">

                <?php foreach ($municipio as $key => $value) :
                    $nombreMunicipio = strtoupper($value->NombreMunicipio);
                endforeach; ?>

                <h3 style="text-align: center; font-family: 'Heebo', sans-serif;">
                    <span style="font-weight: bold; text-emphasis-color: black; color:black">
                        H. AYUNTAMIENTO DE <?= $nombreMunicipio ?> <br> 2021 - 2024 </span>
                </h3>


                <div id="sihayinfo">
                </div>




            </div>
        </div>
    </div>



    <div class="card border-left-secondary shadow h-100 py-2">
        <div class="card-body">
            <div class="row justify-content-end">
                <?php
                $usuario_obras = $this->session->userdata('obras');
                if($usuario_obras == 1) :
                ?>
                <a id="btnGuardarInformacionAnalitico" href="<?= base_url() ?>Analitico" class="btn btn-success btn-sm btn-icon-split" type="submit">
                    <span class="icon text-white-50">
                        <i class="far fa-save"></i>
                    </span>
                    <span class="text">ANALITICO DE OBRAS FISM</span>
                </a>
                <a id="btnGuardarInformacionAnalitico" href="<?= base_url() ?>AnaliticoFortamun" class="btn btn-warning btn-sm btn-icon-split" type="submit">
                    <span class="icon text-white-50">
                        <i class="far fa-save"></i>
                    </span>
                    <span class="text">ANALITICO DE OBRAS FORTAMUN</span>
                </a>
                <?php endif; ?>
            </div>
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-info text-uppercase mb-1">

                    </div>
                    <span style="font-weight: bold; text-emphasis-color: black; color:black">LISTA DE PROGRAMAS PRESUPUESTARIOS ASIGNADOS</span>
                    <div class="table-responsive">
                        <table id="mitable" class="table table-sm table-bordered text-dark">
                            <thead class="bg-secondary text-white">
                                <th>#</th>
                                <th>PROGRAMA</th>
                                <th>OBJETIVO</th>
                                <th>OPCIONES</th>
                            </thead>
                            <tbody>

                                <?php if ($programas) {
                                    $programa = array();
                                    foreach ($programas as $key => $value) :
                                        //array_push($programa, "Programa " . $c);
                                        array_push($programa, $value->nombre_programa);
                                        array_push($programa, $value->objetivo_programa);
                                        array_push($programa, $value->id_programa);
                                ?>
                                        <?php endforeach;
                                    $resultado = array_unique($programa);
                                    $resultado = array_values($resultado);
                                    $c = 1;
                                    for ($i = 0; $i < count($resultado); $i++) {
                                        if (($i % 3) == 0) { ?>
                                            <tr>
                                                <td><?= $c ?></td>
                                                <td><?= $resultado[$i] ?></td>
                                                <?php
                                                $c++;
                                            } else {
                                                if (is_numeric($resultado[$i])) { ?>
                                                    <td align="center"><a href="<?= base_url(); ?>InicioController/programa/<?= $resultado[$i] ?>"><i class="fas fa-door-open"></i> ABRIR </a></td>
                                                <?php } else { ?>
                                                    <td><?= $resultado[$i] ?></td>
                                    <?php }
                                            }
                                        }
                                    } ?>

                            </tbody>
                            <tfoot>
                                <th>#</th>
                                <th>PROGRAMA</th>
                                <th>OBJETIVO</th>
                                <th>OPCIONES</th>
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
    $(document).ready(function() {});
</script>