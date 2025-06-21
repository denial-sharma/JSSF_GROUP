<?php
// Include TCPDF library
require_once('../TCPDF-main/TCPDF-main/tcpdf.php');

// Get data from the database or any source
$name = "John Doe";
$course = "Certificate of Achievement";
$date = date("Y-m-d");

// Create a new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('JSSF GROUP');
$pdf->SetTitle('Certificate');
$pdf->SetSubject('Certificate of Achievement');
$pdf->SetKeywords('Certificate, TCPDF, PHP');

// Set font
$pdf->SetFont('helvetica', '', 12);

// Add a page
$pdf->AddPage();

// Add content to the PDF
$content = '
<div class="mt-3"><h1 class="text-center">बेटी विवाह अनुदान योजना</h1>
    <h3 class="text-center mt-3">प्रमाण पत्र </h3>
    <div class="row">
        <div class="col-lg-6">
            <span>पंजीकरण कर्ता की IDसंख्या </span><span>$data</span>
        </div>
    </div>
</div>
';
$pdf->writeHTML($content, true, false, true, false, '');

// Save to file (you can also use 'I' to output the PDF directly)
$pdf->Output('Yojana_certificate.pdf', 'D');
