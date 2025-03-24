<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'cirugias');
$conn1 = include("con_db.php");


require __DIR__ . "/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if (isset($_POST['save_excel_data'])) {
    $fileName = $_FILES['import_file2']['name'];
    $cadena2 = substr($fileName, 0, 5);
    if ($cadena2 == "CP03D") {
        $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowed_ext = ['xls', 'xlsx'];
        if (in_array($file_ext, $allowed_ext)) {
            $inputFileNamePath = $_FILES['import_file2']['tmp_name'];
            $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
            $data = $spreadsheet->getSheetByName('04CobDM_HTA_COL')->toArray();
            $count = "0";
            $Unidadd=[];
            $Poblacionn = [];
            $NumeroCo = [];
            $PoblacionnF = [];
            $NumeroCoG = [];

            foreach ($data as $row) {
                if ($count > 0) {
                    $Unidadd[]= $row['0'];
                    $Ejemplo1 = $row['1'];
                    $Ejemplo2 = $row['2'];
                    $Ejemplo3 = $row['5'];
                    $Ejemplo4 = $row['6'];


                    $Poblacionn[] = str_replace(",", "", $row['13']);
                    $NumeroCo[] = str_replace(",", "", $row['14']);
                    $PoblacionnF[] = str_replace(",", "", $row['17']);
                    $NumeroCoG[] = str_replace(",", "", $row['18']);





                } else {
                    $count = "1";
                }
            }



  
            $Unidaddd = array_filter($Unidadd);
            unset($Unidaddd[0]);
            unset($Unidaddd[1]);
            unset($Unidaddd[2]);
            unset($Unidaddd[3]);
            unset($Unidaddd[4]);
            unset($Unidaddd[5]);
            unset($Unidaddd[6]);
            unset($Unidaddd[7]);
            unset($Unidaddd[8]);


            $Poblacionnn = array_filter($Poblacionn);
            unset($Poblacionnn[4]);
            unset($Poblacionnn[0]);
            unset($Poblacionnn[5]);
            unset($Poblacionnn[6]);

            



            $NumeroCoo = array_filter($NumeroCo);
            unset($NumeroCoo[6]);
            unset($NumeroCoo[5]);
            unset($NumeroCoo[4]);
            unset($NumeroCoo[3]);
            unset($NumeroCoo[0]);




            $PoblacionnFF = array_filter($PoblacionnF);
            unset($PoblacionnFF[0]);
            unset($PoblacionnFF[6]);
            unset($PoblacionnFF[5]);

            


            $NumeroCoGG = array_filter($NumeroCoG);
            unset($NumeroCoGG[0]);
            unset($NumeroCoGG[6]);



        }
    } else {
?>

        <html>

        <body>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Oops...',
                    html: '<?php echo "El archivo CP03D es incorrecto o contiene otro nombre favor de corroborar! <br><br> El nombre del archivo introducido es: <br>" . $fileName ?> ',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ACEPTAR',
                }).then(function() {
                    window.location = "../../../DM-subirexcel.php";
                });
            </script>
        </body>

        </html>
<?php
    }
}




if (isset($_POST['save_excel_data'])) {
    $fileName1 = $_FILES['import_file']['name'];
    $cadena3 = substr($fileName1, 0, 14);
    if ($cadena3 == "IMCob_NumDenom") {

        $file_ext1 = pathinfo($fileName1, PATHINFO_EXTENSION);
        $allowed_ext1 = ['xls', 'xlsx'];
        if (in_array($file_ext1, $allowed_ext1)) {
            $inputFileNamePath1 = $_FILES['import_file']['tmp_name'];
            $spreadsheet1 = PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath1);
            $dataaa = $spreadsheet1->getSheetByName('tb_IMCP_08_SM_Del')->toArray();
            $dataaa1 = $spreadsheet1->getSheetByName('tb_IMCP_09_SH_Del')->toArray();
            $dataaa2 = $spreadsheet1->getSheetByName('tb_IMCP_10_SY_Del')->toArray();
            $counts = "0";
            $counts1 = "0";
            $counts2 = "0";


            $Det_Diabetes_45_59_M8 = [];
            $Prev_Diabetes_PobM_45_598 = [];
            $Det_Diabetes_45_59_H9 = [];
            $Prev_Diabetes_PobH_45_599 = [];
            $Det_Diabetes_60_10 = [];
            $Prev_Diabetes_Pob_60_10 = [];






            foreach ($dataaa as $rows) {
                if ($counts > 0) {
                    $Det_Diabetes_45_59_M823 =  $rows['56'];
                    $Prev_Diabetes_PobM_45_5982323 = $rows['55'];
                    

                    $Det_Diabetes_45_59_M8[] = str_replace(",", "", $rows['56']);
                    $Prev_Diabetes_PobM_45_598[] = str_replace(",", "", $rows['55']);
                } else {
                    $counts = "1";
                }
            }

            foreach ($dataaa1 as $rows1) {
                if ($counts1 > 0) {
                    $Det_Diabetes_45_59_H9232 =  $rows1['36'];
                    $Prev_Diabetes_PobH_45_5992323 = $rows1['35'];


                    $Det_Diabetes_45_59_H9[] = str_replace(",", "", $rows1['36']);
                    $Prev_Diabetes_PobH_45_599[] = str_replace(",", "", $rows1['35']);
                    
                } else {
                    $counts1 = "1";
                }
            }

            foreach ($dataaa2 as $rows2) {
                if ($counts2 > 0) {
                    $Det_Diabetes_60_10232 =  $rows2['34'];
                    $Prev_Diabetes_Pob_60_1023= $rows2['33'];

                    
                    $Det_Diabetes_60_10[] = str_replace(",", "", $rows2['34']);
                    $Prev_Diabetes_Pob_60_10[] = str_replace(",", "", $rows2['33']);
                } else {
                    $counts2 = "1";
                }
            }



            $Det_Diabetes_45_59_M88 = array_filter($Det_Diabetes_45_59_M8);
            unset($Det_Diabetes_45_59_M88[5]);



            $Prev_Diabetes_PobM_45_5988 = array_filter($Prev_Diabetes_PobM_45_598);
            unset($Prev_Diabetes_PobM_45_5988[5]);




            $Det_Diabetes_45_59_H99 = array_filter($Det_Diabetes_45_59_H9);
            unset($Det_Diabetes_45_59_H99[5]);



            $Prev_Diabetes_PobH_45_5999 = array_filter($Prev_Diabetes_PobH_45_599);
            unset($Prev_Diabetes_PobH_45_5999[5]);



            $Det_Diabetes_60_100 = array_filter($Det_Diabetes_60_10);
            unset($Det_Diabetes_60_100[5]);



            $Prev_Diabetes_Pob_60_100 = array_filter($Prev_Diabetes_Pob_60_10);
            unset($Prev_Diabetes_Pob_60_100[5]);



            $Count = 0;
        }
    } else {
        ?>

        <html> 

        <body>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Oops...',
                    html: '<?php echo "El archivo IMCob_NumDenom es incorrecto o contiene otro nombre favor de corroborar! <br><br> El nombre del archivo introducido es: <br>" . $fileName1 ?> ',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ACEPTAR',
                }).then(function() {
                    window.location = "../../../DM-subirexcel.php";
                });
            </script>
        </body>

        </html>
<?php
    }

    require __DIR__ . "/vendor/autoload.php";
}

if ($cadena2 == "CP03D" && $cadena3 == "IMCob_NumDenom") {
    $documento = new Spreadsheet();
    $nombreDelDocumento = "Estadísticas EH01.xlsx";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
    header('Cache-Control: max-age=0');

    $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load('EH01.xlsx');
    $worksheet = $spreadsheet->SetActiveSheetIndex(0);
    $worksheet->setTitle("Estadísticas EH01");



    $Count0 = 2;
    foreach ($Unidaddd as $Unidaddd0) {
        $Count0++;
        $worksheet->getCell("A" . $Count0)->setValue("$Unidaddd0");
    }

    $Count1 = 2;
    foreach ($Poblacionnn as $Poblacionnn1) {
        $Count1++;
        $worksheet->getCell("B" . $Count1)->setValue("$Poblacionnn1");
    }


    $Count2 = 2;
    foreach ($NumeroCoo as $NumeroCoo1) {
        $Count2++;
        $worksheet->getCell("C" . $Count2)->setValue("$NumeroCoo1");
    }


    $Count3 = 2;
    foreach ($PoblacionnFF as $PoblacionnFF1) {
        $Count3++;
        $worksheet->getCell("D" . $Count3)->setValue("$PoblacionnFF1");
    }

    $Count4 = 2;
    foreach ($NumeroCoGG as $NumeroCoGG11) {
        $Count4++;
        $worksheet->getCell("E" . $Count4)->setValue("$NumeroCoGG11");
    }


    



    $Count5 = 2;
    foreach ($Det_Diabetes_45_59_M88 as $Det_Diabetes_45_59_M881) {
        $Count5++;
        $worksheet->getCell("G" . $Count5)->setValue("$Det_Diabetes_45_59_M881");
    }

    $Count6 = 2;
    foreach ($Prev_Diabetes_PobM_45_5988 as $Prev_Diabetes_PobM_45_59881) {
        $Count6++;
        $worksheet->getCell("F" . $Count6)->setValue("$Prev_Diabetes_PobM_45_59881");
    }


    $Count7 = 2;
    foreach ($Det_Diabetes_45_59_H99 as $Det_Diabetes_45_59_H991) {
        $Count7++;
        $worksheet->getCell("I" . $Count7)->setValue("$Det_Diabetes_45_59_H991");
    }


    $Count8 = 2;
    foreach ($Prev_Diabetes_PobH_45_5999 as $Prev_Diabetes_PobH_45_59991) {
        $Count8++;
        $worksheet->getCell("H" . $Count8)->setValue("$Prev_Diabetes_PobH_45_59991");
    }

    $Count9 = 2;
    foreach ($Det_Diabetes_60_100 as $Det_Diabetes_60_1001) {
        $Count9++;
        $worksheet->getCell("K" . $Count9)->setValue("$Det_Diabetes_60_1001");
    }

    $Count10 = 2;
    foreach ($Prev_Diabetes_Pob_60_100 as $Prev_Diabetes_Pob_60_1001) {
        $Count10++;
        $worksheet->getCell("J" . $Count10)->setValue("$Prev_Diabetes_Pob_60_1001");
    }




    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
}
