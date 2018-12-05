<?php
include '../controlador/NominaControlador.php';
require '../vendor/fpdf/fpdf.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $pdf = new FPDF('p', 'mm', 'A4');
    $hoy = date("d/m/y");
    $i = 0;

    $idEmpleado = $_POST["cbEmpleado"];
    $periodo = $_POST["periodo"];
    $periodo = $periodo.'-01';
    $empleados = NominaControlador::reporteSalario($idEmpleado, $periodo);
    $devengos = NominaControlador::reporteDevengo($idEmpleado, $periodo);
    $deducciones = NominaControlador::reporteDeduccion($idEmpleado, $periodo);
    foreach ($empleados as $empleado) {
        $i++;
    }

    if ($i === 0) {
        exit();
    }

    $pdf->AddPage('PORTRAIT', 'LETTER');

    class pdf extends FPDF
    {
        public function header()
        {
            $this->SetFont('Arial', '', 10);
            $this->Write(5, 'Sistema de recursos humanos');
            $this->Image('img/logo.png', 170, 5, 35, 30, 'png');
        }

        public function footer()
        {
            $this->SetFont('Arial', '', 10);
            $this->SetY(-15);
            $this->Write(5, 'Asunción - Paraguay');
            $this->SetX(-37);
            $this->AliasNbPages();
            $this->Write(5, $this->PageNo() . ' de {nb}');
        }
    }

    $fpdf = new pdf('P', 'mm', 'letter', true);
    $fpdf->AddPage('portrait', 'letter');
    $fpdf->SetMargins(10,30,20);
    $fpdf->SetFont('Arial', 'B', 14);
    $fpdf->SetY(20);
    $fpdf->SetTextColor(68, 78, 78);
    $fpdf->Cell(0, 5, 'LIQUIDACION DE SALARIO', 0, 0, 'C');
    $fpdf->Ln(15);

    $fpdf->SetFont('Arial', 'B', 10);
    $fpdf->Cell(20, 5, 'Fecha');
    $fpdf->SetFont('Arial', '', 10);
    $fpdf->SetX(37);
    $fpdf->Cell(20, 5, ': ' . $hoy);
    $fpdf->Ln(6);

    $fpdf->SetFont('Arial', 'B', 10);
    $fpdf->Cell(20, 5, 'Periodo:');
    $fpdf->SetFont('Arial', '', 10);
    $fpdf->SetX(37);
    //$fpdf->Cell(20, 5, ': '.$empleado['periodoPago']);
    setlocale(LC_TIME,'es_ES', 'esp_esp');
    $date = $empleado['periodoPago'];
    $fpdf->Cell(20, 5, ': '.strftime("%B %G", strtotime($date)));
    $fpdf->Ln(6);

    $fpdf->SetFont('Arial', 'B', 10);
    $fpdf->Cell(20, 5, 'Empleado');
    $fpdf->SetFont('Arial', '', 10);
    $fpdf->SetX(37);
    $fpdf->Cell(20, 5, ': '.$empleado['empleado']);
    $fpdf->Ln(13);

    $fpdf->Cell(30, 7, 'CONCEPTO', 0, 0, 'L');
    $fpdf->Cell(155, 7, 'IMPORTE', 0, 0, 'R');
    $fpdf->SetLineWidth(0.5);
    $fpdf->Line(11, 67, 195, 67);
    $fpdf->SetFont('Arial', '', 10);
    $fpdf->Ln(8);
//print_r($empleados);
//die();
    $totalAsignacion = 0;
    $totalDescuentos = 0;
    $totalPercibido = 0;
    foreach ($empleados as $empleado) {
        $fpdf->Cell(30, 7, 'Salario', 0, 0, 'L');
        $fpdf->Cell(155, 7, number_format($empleado['salario'], 0, '.', '.'), 0, 0, 'R');
        $fpdf->Ln(10);
    };

    foreach ($devengos as $devengo) {
        $fpdf->Cell(30, 7, $devengo['TipoDevengo'], 0, 0, 'L');
        $fpdf->Cell(155, 7, number_format($devengo['montoDevengo'], 0, '.', '.'), 0, 0, 'R');
        $totalAsignacion+=$devengo['montoDevengo'];
        $fpdf->Ln();
    };
    $fpdf->Ln(10);

foreach ($deducciones as $deduccion) {
        $fpdf->Cell(30, 7, $deduccion['tipoDeduccion'], 0, 0, 'L');
        $fpdf->Cell(155, 7, number_format($deduccion['montoDeduccion'], 0, '.', '.'), 0, 0, 'R');
        $totalDescuentos+=$deduccion['montoDeduccion'];
        $fpdf->Ln();
    };

$totalPercibido = ($empleado['salario'] + $totalAsignacion)-$totalDescuentos;

$fpdf->Ln(10);
$fpdf->Cell(150, 7, 'TOTAL ASIGNACIONES', 1, 0, 'L');
$fpdf->Cell(35, 7, number_format($totalAsignacion, 0, '.', '.'), 1, 0, 'R');
$fpdf->Ln();
$fpdf->Cell(150, 7, 'TOTAL DESCUENTOS', 1, 0, 'L');
$fpdf->Cell(35, 7, number_format($totalDescuentos, 0, '.', '.'), 1, 0, 'R');
$fpdf->Ln();
$fpdf->Cell(150, 7, 'TOTAL A PERCIBIR', 1, 0, 'L');
$fpdf->Cell(35, 7, number_format($totalPercibido, 0, '.', '.'), 1, 0, 'R');
$fpdf->Ln();

$fpdf->SetLineWidth(0.3);
$fpdf->Line(11, 180, 195, 180);
$fpdf->SetY(182);
$fpdf->Cell(20, 5, 'Firma del empleado');
$fpdf->SetY(182);
$fpdf->SetX(182);
$fpdf->Cell(20, 5, 'Vo. Bo');


$fpdf->Output();
} else {
    header("location:index.php");
}



