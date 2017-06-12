<?php
header('Content-type: text/html; charset=utf-8');
require_once("fpdf/fpdf.php");

$event = trim($_POST['event']);
$date = $_POST['date'];
$company = trim($_POST['company']);
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$address = trim($_POST['address']);
$email = trim($_POST['email']);    
$tel1 = trim($_POST['tel1']);
$tel2 = trim($_POST['tel2']);  
$pdf = new FPDF('P', 'cm', 'A4');

    $pdf->AddPage();
    $pdf->SetMargins(1,1,1,1);

    $pdf->SetFont('Arial', 'BU', 24);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0, 2, $event, 0, 0, 'C');

    $pdf->Ln(1.5);
    $pdf->SetFont('Arial', 'I', 12);
	$pdf->Cell(0, 2, 'The report was generated on '.date("F j, Y, g:i a"), 0, 0, 'R');
    
    $pdf->Ln(2.5);
	
	if($tel2!="") $tel1=$tel1.", ".$tel2;

	$pdf->SetFont('Arial', '', 14);
	
	//Data for the table
    $data = array(
        array('Event', $event),
        array('Date', $date),
        array('Company', $company),
		array('Name', $name),
		array('Surname', $surname),
		array('Address', $address),
		array('Email', $email),
		array('Telephones', $tel1)
    );

    //Simple table
    foreach($data as $row){
        foreach($row as $col)
		$pdf->Cell(9.5, 1, $col, 1, 0, 'L'); 
        $pdf->Ln();
    }

    $pdf->Ln(0.5);


    //Displaying PDF page
    $pdf->Output($event.".pdf", "I" );

?>