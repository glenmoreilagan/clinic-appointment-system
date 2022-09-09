<?php

require_once '../../vendor/autoload.php';

header('Content-Type: application/pdf'); 
header('Content-Description: inline; filename.pdf'); 

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();