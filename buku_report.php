<?php
include("./config.php");
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Setup Dompdf with default options
$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);


$data = mysqli_query($db, "SELECT * FROM buku");
$no = 1;

// Buat konten HTML untuk laporan PDF
$html = '
<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Data Buku</h1>
    <table>
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">ISBN</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun Terbit</th>
            </tr>
        </thead>
        <tbody>';

while ($row = mysqli_fetch_array($data)) {
    $html .= "<tr>";
    $html .= "<td class='text-center'>" . $no++ . "</td>";
    $html .= "<td>" . $row['isbn'] . "</td>";
    $html .= "<td>" . $row['judul'] . "</td>";
    $html .= "<td>" . $row['penulis'] . "</td>";
    $html .= "<td>" . $row['penerbit'] . "</td>";
    $html .= "<td>" . $row['tahun_terbit'] . "</td>";
    $html .= "</tr>";
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

// Load HTML content to Dompdf
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('laporan.pdf', ['Attachment' => 0]);
