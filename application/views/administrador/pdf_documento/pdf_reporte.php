<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        .text-align-center {
            height: 40px;
            width: 300px;
            line-height: 18px;
            text-align: center;
            vertical-align: middle;
            line-height: 15px;
            font-size: 15px;
        }

        .text-align-center-firma {
            height: 40px;
            width: 300px;
            line-height: 18px;
            text-align: center;
            vertical-align: middle;
            line-height: 11px;
            font-size: 11px;
        }

        .text-align-center-color {
            height: 20px;
            width: 965px;
            background: #A2A2A2;
            color: #333;
            line-height: 18px;
            text-align: center;
            vertical-align: middle;
            font-size: 11px;
            line-height: 8px;
            font-family: 'Hind Siliguri', sans-serif;
        }

        .text-tit {
            font-size: 12px;
            font-family: 'Hind Siliguri', sans-serif;
            line-height: 8px;
        }

        .text-sub {
            font-size: 11px;
            font-family: 'Hind Siliguri', sans-serif;
            line-height: 8px;
        }

        .text-norm {
            font-size: 9px;
            font-family: 'Hind Siliguri', sans-serif;
            font-weight: normal;
            line-height: 8px;
        }

        .text-negrita {
            font-family: 'Hind Siliguri', sans-serif;
            font-weight: bold;
            line-height: 8px;
        }

        .tx-negrita {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            line-height: 8px;
        }

        .bord {
            border: 0.5px solid black;
            line-height: 8px;
        }
    </style>
</head>

<body style=" 
  background-image: url('<?= base_url() ?>logm/<?= $municipio->membrete ?>');">

    <table class="default text-tit">
        <tr>
            <td style="width: 350px;">
                <img src="<?= base_url() ?>logm/<?= $municipio->logo ?>" width="100" height="90">
            </td>
            <td style="width: 500px;">
                <div class="text-align-center tx-negrita">
                    H. AYUNTAMIENTO DE <?= strtoupper($municipio->NombreMunicipio) ?> <br>
                    2021 - 2024 <br>
                    REPORTE DE ACTIVIDADES
                </div>
            </td>
            <td style="width: 240px;">

            </td>
        </tr>
    </table>
    <br>
    <div class="text-sub">
        DIRECCIÓN/DEPENDENCIA RESPONSABLE: <span class="text-negrita"><?= strtoupper($usuario->nombre_unidad) ?></span> <br>
        NOMBRE DEL TITULAR DE LA DIRECCIÓN / DEPENDENCIA: <span class="text-negrita"><?= strtoupper($usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno) ?></span> <br>
        NOMBRE DEL PROGRAMA PRESUPUESTARIO: <span class="text-negrita"><?= strtoupper($programas->nombre_programa) ?></span> <br>
        OBJETIVO / FIN DEL PROGRAMA PRESUPUESTARIO <span class="text-negrita"><?= strtoupper($programas->objetivo_programa) ?></span> <br>

    </div>
    <br>
    <div class="text-align-center-color">
        DESCRIPCIÓN DE ACTIVIDADES
    </div>
    <div>
        <table class="default text-tit">
            <tr class="text-norm">
                <th class="bord" bgcolor="#D3D3D3">NUMERO COMPONENTE</th>
                <th class="bord" bgcolor="#D3D3D3">NUMERO ACTIVIDAD</th>
                <th class="bord" bgcolor="#D3D3D3">NOMBRE ACTIVIDAD</th>
                <th class="bord" bgcolor="#D3D3D3">UNIDAD DE MEDIDA</th>
                <th class="bord" bgcolor="#D3D3D3">MES QUE SE INFORMA</th>
                <th class="bord" bgcolor="#D3D3D3">NUMERO DE INDICADOR DEL MES PROGRAMADO</th>
                <th class="bord" bgcolor="#D3D3D3">NUMERO DE INDICADOR DEL MES REALIZADO</th>
                <th class="bord" bgcolor="#D3D3D3">PORCENTAJE</th>
                <th class="bord" bgcolor="#D3D3D3">STATUS</th>
                <th class="bord" bgcolor="#D3D3D3">EN CASO DE QUE NO SE EJECUTE LA ACTIVIDAD, JUSTIFICAR LA CAUSA</th>
                <th class="bord" bgcolor="#D3D3D3">NÚMERO DE POBLACIÓN ATENDIDA</th>
                <th class="bord" bgcolor="#D3D3D3">NÚMERO DE HOMBRES</th>
                <th class="bord" bgcolor="#D3D3D3">NÚMERO DE MUJERES</th>
                <th class="bord" bgcolor="#D3D3D3">NOMBRE DE(LAS) LOCALIDAD(ES) ATENDIDA(S) </th>
                <th class="bord" bgcolor="#D3D3D3">DESCRIPCIÓN DE LOS SERVICIOS/ BIENES/ INSUMOS ENTREGADOS - APLICADOS</th>
                <th class="bord" bgcolor="#D3D3D3">DESCRIPCIÓN DE LA EVIDENCIA - DOCUMENTAL JUSTIFICATIVA GENERADA</th>
            </tr>
            <tbody>
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
                            <tr class="text-norm">
                                <th class="bord text-norm"><?= $value->numero_componente ?></th>
                                <th class="bord text-norm"><?= $value->numero_actividad ?></th>
                                <th class="bord text-norm"><?= strtoupper($value->nombre_actividad)  ?></th>
                                <th class="bord text-norm"><?= strtoupper($value->unidad_medida) ?></th>
                                <th class="bord text-norm"><?= strtoupper($value->mes) ?></th>
                                <th class="bord text-norm"><?= $value->cantidad_programada ?></th>
                                <th class="bord text-norm"><?= $valueInfo->indicador_realizado ?></th>
                                <th class="bord text-norm"><?= $porcentajeTotal ?> %</th>
                                <th class="bord text-norm"><?= strtoupper($status) ?></th>
                                <th class="bord text-norm"><?= strtoupper($valueInfo->justificacion) ?></th>
                                <th class="bord text-norm"><?= $valueInfo->poblacion_atendida ?></th>
                                <th class="bord text-norm"><?= $valueInfo->hombres ?></th>
                                <th class="bord text-norm"><?= $valueInfo->mujeres ?></th>
                                <th class="bord text-norm"><?= strtoupper($valueInfo->nombre_localidades_atendidas) ?></th>
                                <th class="bord text-norm"><?= strtoupper($valueInfo->servicios_aplicados) ?></th>
                                <th class="bord text-norm"><?= strtoupper($valueInfo->descripcion_evidencia) ?></th>

                            </tr>
                        <?php  }
                    endforeach;
                    if ($id != $value->id_actividad_fecha) { ?>

                        <?php if($value->cantidad_programada > 0): ?>

                            <tr class="text-norm">
                            <th class="bord text-norm"><?= $value->numero_componente ?></th>
                            <th class="bord text-norm"><?= $value->numero_actividad ?></th>
                            <th class="bord text-norm"><?= strtoupper($value->nombre_actividad) ?></th>
                            <th class="bord text-norm"><?= strtoupper($value->unidad_medida) ?></th>
                            <th class="bord text-norm"><?= strtoupper($value->mes) ?></th>
                            <th class="bord text-norm"><?= $value->cantidad_programada ?></th>
                            <th class="bord text-norm"></th>
                            <th class="bord text-norm"></th>
                            <th class="bord text-norm">
                            <span style="color: red; font-weight: bold;">Sin cumplimiento de actividad</span>
                            </th>
                            <th class="bord text-norm"></th>
                            <th class="bord text-norm"></th>
                            <th class="bord text-norm"></th>
                            <th class="bord text-norm"></th>
                            <th class="bord text-norm"></th>
                            <th class="bord text-norm"></th>
                            <th class="bord text-norm"></th>

                        </tr>
                        <?php endif; ?>


                    <?php }
                    ?>
                <?php endforeach;
                print_r($id);
                ?>

            </tbody>
        </table>
    </div>
    <br>
    <!-- <div class="text-align-center-firma">
        <br>
        __________________________________ <br>
        <?= strtoupper($usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno) ?>

    </div> -->
    <div>
        <br>
        <br>
    </div>
    <table class="default text-tit">
        <tr>
            <td style="width: 350px;">

            </td>
            <td style="width: 500px;">
                <br>
                <div class="text-align-center-firma tx-negrita">
                    _____________________________________ <br>

                    <?= strtoupper($usuario->nombre_unidad) ?> <br>
                    <?= strtoupper($usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno) ?>
                </div>
            </td>
            <td style="width: 240px;">

            </td>
        </tr>
    </table>

</body>

</html>