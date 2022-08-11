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
<?php
$acum = 0;
if (empty($obras)) {
    echo '<span style="font-weight: bold; text-emphasis-color: black; color:red">No hay ninguna obra cargada</span>';
} else {
    foreach ($obras as $key => $value) {
        $acum = $acum + $value->monto_obra;
    }
}
?>

<body style="background-image: url('<?= base_url() ?>logm/<?= $municipio->membrete ?>');">

    <table class="default text-tit">
        <tr>
            <td style="width: 460px;">
                <img src="<?= base_url() ?>assets/img/gyglogo.png" width="100" height="90">

            </td>
            <td style="width: 660px;">
                <div class="text-align-center tx-negrita" style="color:#741616">
                    CONSULTORIA G & G <br>
                    DIRECCION GENEAL<br>
                    <span style="color:#000000">ANALITICO DE OBRA PUBLICA</span>
                </div>
            </td>
            <td style="width: 240px;">
                <img src="<?= base_url() ?>logm/<?= $municipio->logo ?>" width="100" height="90">
            </td>
        </tr>
    </table>

    <table class="text-norm" style="font-size:10px">
        <tr>
            <td class="bord" bgcolor="#595D64" style="width:250px; height:15px; color:#FFFFFF">
                NOMBRE DEL MUNICIPIO:
            </td>
            <td class="bord">
                <?= strtoupper($municipio->NombreMunicipio) ?>
            </td>
        </tr>
        <tr>
            <td class="bord" bgcolor="#595D64" style="width:250px; height:15px; color:#FFFFFF">
                NOMBRE DEL ÁREA RESPONSABLE:
            </td>
            <td class="bord">
                OBRAS PUBLICAS
            </td>
        </tr>
        <tr>
            <td class="bord" bgcolor="#595D64" style="width:250px; height:15px; color:#FFFFFF">
                NOMBRE DEL TITULAR DEL ÁREA:
            </td>
            <td class="bord">
                <?= strtoupper($responsable->nombre)?> <?=strtoupper($responsable->apellido_paterno)?> <?=strtoupper($responsable->apellido_materno)?> 
            </td>
        </tr>
    </table>
    <br>
    <table class="text-norm" style="font-size:10px">
        <tr>
            <td class="bord" bgcolor="#595D64" style="width:250px; height:15px; color:#FFFFFF">
                TECHO FINANCIERO FISMDF ACUMULADO :
            </td>
            <td class="bord">
                $ <?= number_format($acum, 2) ?>
            </td>
        </tr>
    </table>

   
    <div>
        <table class="default text-tit">
            <tr class="text-norm">
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">#</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Ejer. fiscal</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Nombre de la Entidad</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Clave de Entidad</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Nombre del Municipio</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Clave Mun</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Nombre de Localidad</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Clave de la Localidad</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Número de obra</th>
                <th class="bord" bgcolor="#595D64" style="width:120px; color:#FFFFFF">Descripción y ubicación de la obra o acción</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Tipo de Localidad</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Población total</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Población en referencia</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Población Objetivo</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Población Atendida</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF"> H. </th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF"> M. </th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Grado de Marginación</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Número de población con carencia</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Total de Población con carencia, del Indicador, Atendida</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Monto de la Obra/Acción</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Fuente de Fin.</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Avance financiero</th>
                <th class="bord" bgcolor="#595D64" style="color:#FFFFFF">Avance fisico</th>
                
            </tr>
            <tbody>
                <?php
                $id = "";
                foreach ($obras as $key => $value) : ?>
                    <tr>
                        <td class="bord text-norm" align="center">1</td>
                        <td class="bord text-norm" align="center"><?= $value->ejercicio_fiscal ?></td>
                        <td class="bord text-norm" align="center"><?= $value->nombre_entidad ?></td>
                        <td class="bord text-norm" align="center"><?= $value->clave_entidad ?></td>
                        <td class="bord text-norm" align="center"><?= $value->NombreMunicipio ?></td>
                        <td class="bord text-norm" align="center"><?= $value->clave_municipio ?></td>
                        <td class="bord text-norm" align="center"><?= $value->localidad ?></td>
                        <td class="bord text-norm" align="center"><?= $value->clave_localidad ?></td>
                        <td class="bord text-norm" align="center"><?= $value->numero_obra ?></td>
                        <td class="bord text-norm" align="center"><?= $value->ubicacion_obra ?></td>
                        <td class="bord text-norm" align="center"><?= $value->tipo_localidad ?></td>
                        <td class="bord text-norm" align="center"><?= $value->poblacion_total ?></td>
                        <td class="bord text-norm" align="center"><?= $value->poblacion_referencia ?></td>
                        <td class="bord text-norm" align="center"><?= $value->poblacion_objetivo ?></td>
                        <td class="bord text-norm" align="center"><?= $value->poblacion_atendida ?></td>
                        <td class="bord text-norm" align="center"><?= $value->hombres ?></td>
                        <td class="bord text-norm" align="center"><?= $value->mujeres ?></td>
                        <td class="bord text-norm" align="center"><?= $value->grado_marginacion ?></td>
                        <td class="bord text-norm" align="center"><?= $value->poblacion_carencia ?></td>
                        <td class="bord text-norm" align="center"><?= $value->total_poblacion_carencia ?></td>
                        <td class="bord text-norm" align="center">$<?= number_format($value->monto_obra,2)?></td>
                        <td class="bord text-norm" align="center"><?= $value->fuente_financiamiento ?></td>
                        <td class="bord text-norm" align="center"><?= $value->avance_financiero ?></td>
                        <td class="bord text-norm" align="center"><?= $value->avance_fisico ?></td>
                        
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
    </div>
    <br>


    </div>
    <div>
        <br>
        <br>
    </div>


</body>

</html>