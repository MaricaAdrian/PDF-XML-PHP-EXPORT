<?php

include_once "settings.php";
include_once "../includes/fpdf/fpdf.php";

class PDF extends FPDF
{

    public $title;

    function Header()
    {

        $this->SetFont('Arial','B', 24);

        $this->Cell(80);

        $this->Cell(30, 10, $this->title,0, 0,'C');

        $this->Ln(20);
    }


    function Footer()
    {

        $this->SetY(-15);

        $this->SetFont('Arial','I',8);

        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}



$query = mysqli_query($db, "SELECT * FROM `posts`");

$pdf = new PDF();

$pdf->title = "All posts PDF";

$pdf->AliasNbPages();


while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
    $title = $row['title'];
    $content = $row['content'];
    $author = $row['author'];

    $pdf->AddPage();

    $pdf->SetFont('Times','B', 14);
    $pdf->Cell(14,10,'Title: ', 0,0);
    $pdf->SetFont('Times','', 12);
    $pdf->Cell(0,10, $title, 0, 1, 'L');

    $pdf->SetFont('Times','B', 14);
    $pdf->Cell(20,10,'Content: ', 0,0);
    $pdf->SetFont('Times','', 12);
    $pdf->Multicell(0,10, $content);

    $pdf->SetFont('Times','B', 14);
    $pdf->Cell(0, 10, 'Author:', 0,1, 'R');
    $pdf->SetFont('Times','', 12);
    $pdf->Cell(0,10, $author, 0, 1, 'R');




}

$pdf->Output("../documents/pdf/pdfall.pdf", 'F');
echo "All PDF have been generated to one file into document folder (Name: pdfall.pdf).";



?>
