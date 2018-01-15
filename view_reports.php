<?php

include('config.php');
include('session.php');

$userDetails=$userClass->userDetails($session_uid);

    ob_start();
    require('fpdf.php');
    date_default_timezone_set("Asia/Hong_Kong");
    $image1 = "images/Prenetics_logo.png";

    $date = date('Y-m-d H:i:s');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0, 10, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false);
    $pdf->SetY(20);
    $pdf->Cell(0,10,'Genetics report', 0, 0, 'C');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    // $pdf->SetX(50);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Physician:',0,0,'L');
    $pdf->SetX(33);
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(0,10,ucfirst($userDetails->physicianName),0,0,'L');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Patient name:',0,0,'L');
    $pdf->SetX(43);
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(0,10,ucfirst($userDetails->name),0,0,'L');
    // $pdf->SetY(44);
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Email:',0,0,'L');
    $pdf->SetX(25);
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(0,10,$userDetails->email,0,0,'L');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Gender:',0,0,'L');
    $pdf->SetX(28);
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(0,10,$userDetails->gender,0,0,'L');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Date of birth:',0,0,'L');
    $pdf->SetX(38);
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(0,10,$userDetails->dob,0,0,'L');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Age:',0,0,'L');
    $pdf->SetX(22);
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(0,10,$userDetails->age,0,0,'L');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Policy code:',0,0,'L');
    $pdf->SetX(38);
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(0,10,$userDetails->policyCode,0,0,'L');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Note:',0,0,'L');
    $pdf->SetX(22);
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(0,10,$userDetails->note,0,0,'L');
    $pdf->Ln();
    $pdf->SetFont('Arial','BI',12);
    $pdf->Cell(0,10,"AutismNext: Analyses of 48 Genes Associated with Autism Spectrum Disorders",0,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','BU',12);
    $pdf->Cell(0,10,'RESULTS:',0,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,"Pathogenic Mutation(s):                            None Detected",0,0,'C');
    $pdf->Ln();
    $pdf->Cell(0,10,"Variant(s) of Unknown Significance:         None Detected",0,0,'C');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','BI',12);
    $pdf->Cell(0,10,'SUMMARY:',0,0,'C');
    $pdf->Ln();
    $pdf->Cell(0,10,"NEGATIVE: No Clinically Significant Variants Detected",0,0,'C');
    
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,10,"Genes Analyzed: ADNP, ANKRD11, ARID1B, CACNA1C, CDKL5, CHD2, CHD7, CHD8, CNTNAP2, MED12, MEF2C",0,0,'L');
    // $pdf->MultiCell(200,40,"Genes A ADNP, ANKRD11, ARID1B, CACNA1C, CDKL5, CHD2, CHD7, CHD8, CNTNAP2, CREBBP, DHCR7, DYRK1A,
    // FMR1, FOXG1, FOXP1, GRIA3, GRIN2B, HDAC8, KATNAL2, MECP2, MED12, MEF2C, NIPBL, NLGN3, NLGN4X, NRXN1, NSD1,
    // PCDH19, POGZ, PTCHD1, PTEN, RAB39B, RAD21, RAI1, SCN2A, SHANK3, SLC6A8, SLC9A6, SMC1A, SMC3, SYNGAP1,
    // TBR1, TCF4, TSC1, TSC2, UBE3A, UPF3B and ZEB2 (sequencing and deletion/duplication). ",1);

    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Electronically signed by:',0,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,10,ucfirst($userDetails->physicianName).", PhD (Prenetics), FACGM, CGMBS, on ".$date." ",0,0,'C');

    $pdf->Output();
    ob_end_flush(); 
?>