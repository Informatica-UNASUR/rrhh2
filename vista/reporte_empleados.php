<?php
include '../controlador/EmpleadoControlador.php';
require '../vendor/fpdf/fpdf.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
        $pdf = new FPDF('p', 'mm', 'A4');
        $i = 0;
        $idDepartamento = $_POST["idDepartamento"];
        $nombreDepartamento = '';
        $hoy = date("d/m/y");
        $empleados = EmpleadoControlador::mostrarSalariosEmpleados($idDepartamento);
        foreach ($empleados as $empleado) {
            $i++;
        }
    //echo json_encode($empleados);


    if($idDepartamento == '0') {
            $nombreDepartamento = 'Todos';
        } else {
            $nombreDepartamento = $empleado['nombreDepartamento'];
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
                $this->SetX(-29);
                $this->AliasNbPages();
                $this->Write(5, $this->PageNo() . ' de {nb}');
            }
        }

        $fpdf = new pdf('P', 'mm', 'letter', true);
        $fpdf->AddPage('portrait', 'letter');
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->SetY(20);
        $fpdf->SetTextColor(68, 78, 78);
        $fpdf->Cell(0, 5, 'LISTADO DE EMPLEADOS ACTIVOS', 0, 0, 'C');
        $fpdf->Ln(15);
        $fpdf->SetFont('Arial', 'B', 10);

        $fpdf->Cell(20, 5, 'Fecha');
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->SetX(38);
        $fpdf->Cell(20, 5, ': ' . $hoy);
        $fpdf->Ln(6);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(20, 5, 'Departamento');
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->SetX(38);
        //$fpdf->Cell(20, 5, ': Todos');
        $fpdf->Cell(20, 5, ': '.$nombreDepartamento);
        $fpdf->Ln(6);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(20, 5, 'Total empleados');
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->SetX(38);
        $fpdf->Cell(20, 5, ': ' . $i);

        $fpdf->Ln(13);

        $fpdf->Cell(30, 7, 'CI', 0, 0, 'L');
        $fpdf->Cell(90, 7, 'EMPLEADO', 0, 0, 'L');
        $fpdf->Cell(66, 7, 'SALARIO', 0, 0, 'R');
        $fpdf->SetLineWidth(0.5);
        $fpdf->Line(11, 67, 195, 67);
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Ln(8);
//print_r($empleados);
//die();
        foreach ($empleados as $empleado) {
            $fpdf->Cell(30, 7, number_format($empleado['ci'], 0, '.', '.'), 0, 0, 'L');
            $fpdf->Cell(90, 7, $empleado['nombre'] . ' ' . $empleado['apellido'], 0, 0, 'L');
            $fpdf->Cell(66, 7, number_format($empleado['salarioFijo'], 0, '.', '.'), 0, 0, 'R');
            $fpdf->Ln();
        };


        $fpdf->Output();
} else {
    header("location:index.php");
}


