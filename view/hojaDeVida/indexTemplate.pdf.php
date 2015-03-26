<?php

$pdf = new FPDF();
$PDF->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$mensaje);
$pdf->Output();

?>
