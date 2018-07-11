<?php

    include_once "settings.php";
    include_once "../includes/fpdf/fpdf.php";

    if(isset($_GET['id']))
    {
        $id = mysqli_escape_string($db, $_GET['id']);
        $query = mysqli_query($db, "SELECT * FROM `posts` WHERE id='".$_GET['id']."'");

        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $title = $row['title'];
            $content = $row['content'];
            $author = $row['author'];


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

            $pdf = new PDF();
            $pdf->title = $title;

            $pdf->AliasNbPages();
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

            $name = $title[0] . "_" . $id . $title[strlen($title) - 1] . ".pdf";

            $pdf->Output("../documents/pdf/" . $name, 'F');

            echo "Your PDF file has been generated in your document folder (Name: ".$name.").";


        }
    }
    else
    {
            redirect();
    }



?>
