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

<body>

    <!-- <table class="default text-tit">
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
    <br> -->

    <?php foreach ($reportes as $key => $value) : ?>

        <?php 
            $numero_com = 0;
            $nombre_com = '';
            foreach ($actividad as $key => $val) {

                if($value->id_actividad == $val->id_actividad) {
                    $numero_com = $val->numero_actividad;
                    $nombre_com = $val->nombre_actividad;
                }
                
            } ?>

           
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
        <div>

            <table class="default text-tit">
                <tr>
                    <td style="width: 100px;">
                    </td>
                    <td style="width: 450px;">
                        <img src="<?= base_url() ?>uploads/<?= $value->fotografia_1 ?>" alt="" width="300" height="300">
                    </td>
                    <td style="width: 500px;">
                        <img src="<?= base_url() ?>uploads/<?= $value->fotografia_2 ?>" alt="" width="300" height="300">
                    </td>

                </tr>
            </table>



        </div>
        <br>
        <div>
            <br>
        </div>
        <div>
           
                <table class="default text-sub">
                    <tr>
                        
                            <td style="width: 250px;">

                                NUMERO DE ACTIVIDAD <span class="tx-negrita"><?= $numero_com ?> </span>
                            </td>
                            <td style="width: 500px;">
                                DESCRIPCION DE LA ACTIVIDAD <span class="tx-negrita"><?= $nombre_com ?> </span>
                            </td>
                        
                    </tr>
                </table>

                <table class="default text-sub">
                    <tr>
                        <td style="width: 1050px;">
                            NOMBRE DE LAS LOCALIDADES DONDE SE REALIZO LA ACTIVIDAD <span class="tx-negrita"><?= $value->localidades_atendidas ?> </span>
                        </td>
                    </tr>
                </table>

                <table class="default text-sub">
                    <tr>
                        <td style="width: 250px;">
                            NUMERO DE PERSONAS ATENDAS <span class="tx-negrita"><?= $value->personas_atendidas ?> </span>
                        </td>
                        <td style="width: 500px;">
                            FECHA DE REALIZACION DE LA ACTIVIDAD <span class="tx-negrita"><?= $value->fecha_actividad ?> </span>
                        </td>
                    </tr>
                </table>

                <table class="default text-sub">
                    <tr>
                        <td style="width: 1050px;">
                            NOMBRE DE LAS DIRECCIONES MUNICIPALES Y/O DEPENDENCIAS ESTATALES O FEDERALES PARTICIPANTES <span class="tx-negrita"><?= $value->direcciones_dependencias ?> </span>
                        </td>
                    </tr>
                </table>
                <p class="text-tit">

                </p>

            
        </div>
        <div>
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

    <?php endforeach; ?>










</body>

</html>