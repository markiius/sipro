<?php

use Dompdf\Dompdf;

require_once "autoload.inc.php";

$nombreMunicipio = "SAN ANDRES CALPAN";

$html = ' 
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Rubik:wght@300&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&family=Rubik:wght@300&display=swap" rel="stylesheet">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta de cabildo</title>

</head>
<body>
    <div style="font: size 20px; font-family: ´Noto Serif´, serif; text-align:center;">
    <h4 >HONORABLE AYUNTAMIENTO DEL MUNICIPIO DE  <br>
    '.$nombreMunicipio.', PUEBLA  <br>
    2021 – 2024 <br>
    XXX SESIÓN EXTRAORDINARIA <br>
    </h4>
    
    </div>
    <div>
    <p style="text-align: justify">
    EN EL MUNICIPIO DE SAN SALVADOR EL VERDE, PUEBLA, , SIENDO LAS ___ HORAS CON __ MINUTOS DEL DÍA ___ DE _____ DE DOS MIL VEINTIUNO, SE REUNEN LOS INTEGRANTES DEL HONORABLE AYUNTAMIENTO EN LA SALA DE CABILDOS DE ESTE MUNICIPIO, LOS CC. JOSE GREGORIO OJEDA OJEDA, PRESIDENTE MUNICIPAL CONSTITUCIONAL , REGIDORES: MARCELA HERNANDEZ SÁNCHEZ, REGIDORA DE GOBERNACIÓN, JUSTICIA, SEGURIDAD PÚBLICA Y PROTECCIÓN CIVIL; VICTORIA PÉREZ PÉREZ, REGIDORA DE PATRIMONIO Y HACIENDA PÚBLICA MUNICIPAL; MARCIAL HERNÁNDEZ GALICIA, REGIDOR DE DESARROLLO URBANO, ECOLOGÍA, MEDIO AMBIENTE, OBRAS Y SERVICIOS PÚBLICOS: JOSÉ ISABEL ESPINOZA JIMÉNEZ, REGIDOR DE INDUSTRIA, COMERCIO AGRICULTURA Y GANADERÍA; CRISTINA ASCENCIO DÍAZ, REGIDORA DE SALUBRIDAD Y ASISTENCIA PÚBLICA; VICENTE PÉREZ ROMERO, REGIDOR DE EDUCACIÓN PÚBLICA, ACTIVIDADES CULTURALES, DEPORTIVAS Y SOCIALES, GABRIELA AGUILAR NAVA, REGIDORA DE GRUPOS VULNERABLES PERSONAS CON DISCAPACIDAD Y JUVENTUD; FATIMA ABIGAIL HERNANDEZ PEREZ, REGIDORA DE IGUALDAD DE GÉNERO; SAMMAI COHEN JUÁREZ, SÍNDICO MUNICIPAL Y OSBALDO FLORES MEJIA, SECRETARIO GENERAL DEL H. AYUNTAMIENTO QUIEN ACTUA Y DA FE DE LA PRESENTE, CON FUNDAMENTOS EN LOS ARTICULOS 115 DE LA CONSTITUCION DE LOS ESTADOS UNIDOS MEXICANOS, ARTICULO 1, FRACCIÓN V, ARTICLO 107, 108,110 Y 111, DE LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE PUEBLA, 70,73,74,75,76 Y 77, DE LA LEY ORGÁNICA MUNICIPAL, CON LA FINALIDAD DE LLEVAR A CABO LA XXX SESIÓN EXTRAORDINARIA DE CABILDO, EN LA CUAL SE TOMARAN LOS ACUERDOS NECESARIOS CON FORME A LA SIGUIENTE ORDEN DEL DÍA: 
        </p>
        </br>
        <h4 style="text-align:center;">ORDEN DEL DÍA </h4>
        <ol type "A" start="1" >
        <li>LISTA DE ASISTENCIA Y DECLARACIÓN DEL QUÓRUM LEGAL PARA SESIONAR. </li>
        <li>LECTURA Y APROBACIÓN DE LA ORDEN DEL DÍA. </li>
        <li>ANÁLISIS, DISCUSIÓN Y EN SU CASO APROBACIÓN DE LA CREACIÓN DEL COMITÉ DE PLANEACIÓN PARA EL DESARROLLO MUNICIPAL DE SAN SALVADOR EL VERDE. </li>
        <li>CIERRE DE SESIÓN.</li>
        </ol>
    </div>

    <h4 style="text-align:center;">DESAHOGO DE LA ORDEN DEL DIA </h4>
    <p><span style="font-weight: bold;">PRIMER PUNTO DEL ORDEN DEL DÍA.</span> EN USO DE LA PALABRA EL SECRETARIO GENERAL, MANIFIESTA: PROCEDO AL PASE DE LISTA DE ASSTENCIA: </p>

<table class="default">

<tr>

  <td style="width: 40%;">C. JOSE GREGORIO OJEDA OJEDA </td>

  <td style="width: 40%;">    PRESIDENTE MUNICIPAL </td>

  <td> PRESENTE</td>
</tr>

<tr>

  <td style="width: 40%;">C. MARCELA HERNANDEZ SÁNCHEZ  </td>

  <td style="width: 40%;">    REGIDORA DE GOBERNACIÓN, JUSTICIA, SEGURIDAD PÚBLICA Y PROTECCIÓN CIVIL </td>

  <td> PRESENTE</td>
</tr>

<tr>

  <td>C. JOSE GREGORIO OJEDA OJEDA </td>

  <td> PRESIDENTE MUNICIPAL </td>

  <td> PRESENTE</td>
</tr>

<p style="text-align: justify">PRESIDENTE LE INFORMO QUE SE ENCUENTRAN PRESENTES SIETE INTEGRANTES DEL
HONORABLE CABILDO DEL H. AYUNTAMIENTO DE PUEBLA <br>
<br>
EN USO DE LA PALABRA EL SECRETARIO DEL AYUNTAMIENTO, MANIFIESTA TODA VEZ QUE SE ENCUENTRAN PRESENTES LOS INTEGRANTES DEL AYUNTAMIENTO, EN TERMINOS DEL ARTICULO 76 Y 138 FRACCIÓN IV DE LA LEY ORGÁNICA MUNICIPAL, EN CORRELACIÓN AL PUNTO INMEDIATO ANTERIOR, SE TIENE LA ASISTENCIA DEL PRESIDENTE MUNICIPAL CONSTITUCIONAL, PRESIDE ESTA XXXX  SESIÓN EXTRAORDINARIA DE CABILDO, AÍ COMO LOS 8 REGIDORES, LA SÍNDICO MUNICIPAL, Y EL SECRETARIO DEL AYUNTAMIENTO.
</p> 

<p style="text-align: justify">
 </p>

</table>
</body>
</html>';

$dompdf = new Dompdf();
$dompdf->loadHTML($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
$dompdf->stream('invoice.pdf');
