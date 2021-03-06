<?php
include '../controlador/EmpleadoControlador.php';
require_once 'assets/PHPExcel/PHPExcel.php';

$resultado = EmpleadoControlador::mostrarEmpleados();

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Jose Paredes")
    ->setLastModifiedBy("Jose Paredes")
    ->setTitle("Listado de salarios - RRHH")
    ->setDescription("Reporte de salarios")
    ->setKeywords("Reporte de salarios")
    ->setCategory("Reporte de salarios");

$tituloReporte = "LISTADO DE EMPLEADOS";
$titulosColumnas = array('CI', 'FUNCIONARIO', 'DEPARTAMENTO', 'CARGO');

$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:D1');

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', $tituloReporte)
    ->setCellValue('A3', $titulosColumnas[0])
    ->setCellValue('B3', $titulosColumnas[1])
    ->setCellValue('C3', $titulosColumnas[2])
    ->setCellValue('D3', $titulosColumnas[3]);

$i = 4;

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$i,  number_format($fila['ci'], 0, '.', '.'))
        ->setCellValue('B'.$i,  $fila['nombre'].' '.$fila['apellido'])
        ->setCellValue('C'.$i,  $fila['nombreDepartamento'])
        ->setCellValue('D'.$i,  $fila['nombreCargo']);
    $i++;
}

$estiloTituloReporte = array(
    'font' => array(
        'name'      => 'Century Gothic',
        'bold'      => true,
        'italic'    => false,
        'strike'    => false,
        'size' =>16,
        'color'     => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type'	=> PHPExcel_Style_Fill::FILL_NONE
        //'color'	=> array('rgb' => 'FFFFFF')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_NONE
        )
    ),
    'alignment' =>  array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation'   => 0,
        'wrap'          => TRUE
    )
);

$estiloTituloColumnas = array(
    'font' => array(
        'name'      => 'Century Gothic',
        'bold'      => true,
        'color'     => array(
            'rgb' => '000000'
        )
    ),
    'fill' 	=> array(
        'type'		=> PHPExcel_Style_Fill::FILL_NONE,
        'rotation'   => 90,
        'startcolor' => array(
            'rgb' => 'c47cf2'
        ),
        'endcolor'   => array(
            'argb' => 'FF431a5d'
        )
    ),
    'borders' => array(
        'top'     => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            'color' => array(
                'rgb' => '143860'
            )
        ),
        'bottom'     => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            'color' => array(
                'rgb' => '143860'
            )
        )
    ),
    'alignment' =>  array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'       => TRUE
    ));

$estiloInformacion = new PHPExcel_Style();

$estiloInformacion->applyFromArray(
    array(
        'font' => array(
            'name'      => 'Century Gothic',
            'size' =>10,
            'color'     => array(
                'rgb' => '000000'
            )
        ),
        'fill' 	=> array(
            'type'		=> PHPExcel_Style_Fill::FILL_NONE,
            'color'		=> array('argb' => 'FFd9b7f4')
        ),
        'borders' => array(
            'allborders'=> array(
                'style' => PHPExcel_Style_Border::BORDER_THIN ,
                'color' => array(
                    'rgb' => '3a2a47'
                )
            )
        )
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A3:D3')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:D".($i-1));

for($i = 'A'; $i <= 'D'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)
        ->getColumnDimension($i)->setAutoSize(TRUE);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle('Empleados');

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);
// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte_de_empleados.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
