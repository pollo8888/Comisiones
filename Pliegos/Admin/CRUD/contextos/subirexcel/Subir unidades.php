<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'cirugias');
    $conn1 = include("con_db.php");


    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


        if (isset($_POST['save_excel_data'])) {
            $fileName = $_FILES['import_file']['name'];
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowed_ext = ['xls', 'xlsx'];
            if (in_array($file_ext, $allowed_ext)) {
                $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $count = "0";


                foreach ($data as $row) {
                    if ($count > 0) {
                        $Unidad = $row['0'];
                        $Clavep = $row['1'];
                    } else {
                        $count = "1";
                    }
                }
            }
        }



    ?>
















</body>

</html>