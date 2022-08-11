<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">MUNICIPIOS</h6>
        </div>
        <div class="card-body text-dark">
            <div class="table-responsive">
                <table id="mitable" class="table table-sm table-bordered text-dark">
                    <thead class=" text-white" style="font-size: 15px; background-color:#151618;">
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Logo</th>
                        <th>Membrete</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($municipios as $municipio) { ?>
                            <tr>
                                <td><?= $municipio->id_municipio ?></td>
                                <td><?= $municipio->NombreMunicipio ?></td>
                                <td>
                                    <!-- <?php if ($municipio->logo != '') { ?>
                                        <img src="<?= base_url('assets/logos/' . $municipio->logo) ?>" width="70px" height="70px">
                                    <?php } else { ?>
                                        <p>No hay Imagen</p>
                                    <?php } ?> -->
                                </td>
                                <td>
                                    <!-- <?php if ($municipio->membrete != '') { ?>
                                        <img src="<?= base_url('assets/membretes/' . $municipio->membrete) ?>" width="70px" height="70px">
                                    <?php } else { ?>
                                        <p>No hay Imagen</p>
                                    <?php } ?> -->
                                </td>
                                <td>
                                    <a id="<?= $municipio->id_municipio ?>" href="<?= base_url() ?>Analitico/FISM/<?= $municipio->id_municipio ?>" class="btn btn-success"><i class="fas fa-fw fa-edit"></i> Analiticos FISM</a>
                                </td>
                                <td>
                                    <a id="<?= $municipio->id_municipio ?>" href="<?= base_url() ?>Analitico/FORTA/<?= $municipio->id_municipio ?>" class="btn btn-success"><i class="fas fa-fw fa-edit"></i> Analiticos FORTAMUN</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Logo</th>
                        <th>Membrete</th>
                        <th></th>
                        <th></th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#mitable').DataTable();
    });
</script>