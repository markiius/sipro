<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// Al requerir el autoload, cargamos todo lo necesario para trabajar

require_once APPPATH."/third_party/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator {
// por defecto, usaremos papel A4 en vertical, salvo que digamos otra cosa al momento de generar un PDF
public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $options = new Options();
    $options->setIsRemoteEnabled(true);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    //$dompdf->page_text($w - 120, $h - 40, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0)); 
    //$dompdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
    
    $dompdf->render();
    
if ($stream) {
        // "Attachment" => 1 hará que por defecto los PDF se descarguen en lugar de presentarse en pantalla.
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    }
else 
    {
      return $dompdf->output();
    }
  }
}