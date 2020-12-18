<?php

    use Dompdf\Dompdf;
    require_once 'dompdf/autoload.inc.php';

    $dompdf = new DOMPDF();
    $dompdf->load_html('
    
    ');

    $dompdf->render();
    $dompdf->stream(
        "teste.pdf", 
        array(
            "Attachment" => false // Para realizar o download somente alterar para true
        )
    );

?>
