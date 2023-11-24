<?php
// Include the necessary files
require_once("config.php");
require_once("./pdf_library/fpdf.php"); // Include the FPDF library

// Create a PDF document
class PDF extends FPDF
{
    // Header
    function Header()
    {
        // Logo or any other header content
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Student Registration 2023', 0, 0, 'C');
        $this->Ln(10); // Add some space

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(40, 10, 'NIS', 1);
        $this->Cell(55, 10, 'Nama', 1);
        $this->Cell(35, 10, 'Jenis Kelamin', 1);
        $this->Cell(40, 10, 'Telepon', 1);
        $this->Cell(75, 10, 'Alamat', 1);
        $this->Cell(30, 10, 'Foto', 1);
        $this->Ln();
    }

    function getAllStudents($conn) {
        $result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
        return $result;
    }

    // Footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Hanun Shaka Puspa (051) - Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Create a PDF instance
$pdf = new PDF();

// Add a page with landscape orientation
$pdf->AddPage('L');

// Fetch all students
$result = $pdf->getAllStudents($conn);

// Define maximum width and height for the image
$maxWidth = 30;
$maxHeight = 30;

$pdf->SetFont('Arial', '', 12);

// Add data to the PDF
while ($res = mysqli_fetch_assoc($result)) {
    // Set the position for the image cell
    $imageX = $pdf->GetX();
    $imageY = $pdf->GetY();

    // Get the image size
    list($imgWidth, $imgHeight) = getimagesize($res['foto']);

    // Calculate the new width and height to fit within the maximum size
    $ratio = min($maxWidth / $imgWidth, $maxHeight / $imgHeight);
    $newWidth = $imgWidth * $ratio;
    $newHeight = $imgHeight * $ratio;

    // Add other cells in the row
    $pdf->Cell(40, $maxHeight, $res['nis'], 1); // Add NIS cell
    $pdf->Cell(55, $maxHeight, $res['nama'], 1);
    $pdf->Cell(35, $maxHeight, $res['jenis_kelamin'], 1);
    $pdf->Cell(40, $maxHeight, $res['telp'], 1);
    $pdf->Cell(75, $maxHeight, $res['alamat'], 1);

    // Display image from URL in the cell with a border
    $pdf->Image($res['foto'], $pdf->GetX(), $pdf->GetY(), $newWidth, $newHeight);
    $pdf->Cell(30, $maxHeight, '', 1); // Empty cell for the foto column
    
    $pdf->Ln(); // Move to the next line
}

// Output the PDF as a download
$pdf->Output("D", "report.pdf");
?>
