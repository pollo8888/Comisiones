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
    if ($cadena2 == "IN17D") {
        $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowed_ext = ['xls', 'xlsx'];
        if (in_array($file_ext, $allowed_ext)) {
            $inputFileNamePath = $_FILES['import_file2']['tmp_name'];
            $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
            $data = $spreadsheet->getSheetByName('Indicadores_IP2014')->toArray();
            $count = "0";
            $Unidadd=[];
            $NumeradorG = [];
            $DenominadorF = [];

            foreach ($data as $row) {
                if ($count > 0) {
                    $Unidadd[]= $row['0'];
                    $DenominadorF[] = str_replace(",", "", $row['18']);
                    $NumeradorG[] = str_replace(",", "", $row['23']);






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
            unset($Unidaddd[64]);




            unset($DenominadorF[1]);
            unset($DenominadorF[0]);
            unset($DenominadorF[2]);
            unset($DenominadorF[3]);
            unset($DenominadorF[4]);
            unset($DenominadorF[5]);
            unset($DenominadorF[6]);
            unset($DenominadorF[7]);
            unset($DenominadorF[8]);
            unset($DenominadorF[9]);
            unset($DenominadorF[10]);
            unset($DenominadorF[11]);
            unset($DenominadorF[12]);
            unset($DenominadorF[13]);
            unset($DenominadorF[64]);

           



            unset($NumeradorG[0]);
            unset($NumeradorG[1]);
            unset($NumeradorG[2]);
            unset($NumeradorG[3]);
            unset($NumeradorG[4]);
            unset($NumeradorG[5]);
            unset($NumeradorG[6]);
            unset($NumeradorG[7]);
            unset($NumeradorG[8]);
            unset($NumeradorG[9]);
            unset($NumeradorG[10]);
            unset($NumeradorG[11]);
            unset($NumeradorG[12]);
            unset($NumeradorG[13]);
            unset($NumeradorG[64]);







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
                    html: '<?php echo "El archivo IN17D es incorrecto o contiene otro nombre favor de corroborar! <br><br> El nombre del archivo introducido es: <br>" . $fileName ?> ',
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


    require __DIR__ . "/vendor/autoload.php";

if ($cadena2 == "IN17D") {
    $documento = new Spreadsheet();
    $nombreDelDocumento = "Estadísticas DM04.xlsx";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
    header('Cache-Control: max-age=0');

    $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load('plantillaDM04.xlsx');
    $worksheet = $spreadsheet->SetActiveSheetIndex(0);
    $worksheet->setTitle("Estadísticas DM04");



    $Count0 = 1;
    foreach ($Unidaddd as $Unidaddd0) {
        $Count0++;
        $worksheet->getCell("A" . $Count0)->setValue("$Unidaddd0");
    }

    $Count2 = 1;
    foreach ($DenominadorF as $DenominadorF01) {
        $Count2++;
        $worksheet->getCell("B" . $Count2)->setValue("$DenominadorF01");
    }


    $Count3 = 1;
    foreach ($NumeradorG as $NumeradorG01) {
        $Count3++;
        $worksheet->getCell("C" . $Count3)->setValue("$NumeradorG01");
    }



   





    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
}
