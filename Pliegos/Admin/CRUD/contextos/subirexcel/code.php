<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    set_time_limit(500);

    /**
     * Demostrar lectura de hoja de cálculo o archivo
     * de Excel con PHPSpreadSheet: leer todo el contenido
     * de un archivo de Excel
     *
     * @author parzibyte
     */
    # Cargar librerias y cosas necesarias
    require_once "vendor/autoload.php";
    $hacer = "false";

    $aniom_check = "false";
    $mesm_check = "false";
    $cvepresupuestal_check = "false";
    $NO_QUIR_check =  "false";
    $INTNO_check =  "false";
    $FEINTQ_check =  "false";
    $HRINI_check =  "false";
    $HRFIN_check =  "false";
    $fec_entrada_sala_check =  "false";
    $fec_inicio_iqx_check =  "false";
    $fec_termino_iqx_check =  "false";
    $fec_salida_sala_check =  "false";
    $hr_entrada_sala_check =  "false";
    $hr_inicio_iqx_check =  "false";
    $hr_termino_iqx_check =  "false";
    $hr_salida_sala_check =  "false";


    $aniom_check1 = 0;
    $mesm_check1 = 0;
    $cvepresupuestal_check1 = 0;
    $NO_QUIR_check1 = 0;
    $INTNO_check1 = 0;
    $FEINTQ_check1 = 0;
    $HRINI_check1 = 0;
    $HRFIN_check1 = 0;
    $fec_entrada_sala_check1 = 0;
    $fec_inicio_iqx_check1 = 0;
    $fec_termino_iqx_check1 = 0;
    $fec_salida_sala_check1 = 0;
    $hr_entrada_sala_check1 = 0;
    $hr_inicio_iqx_check1 = 0;
    $hr_termino_iqx_check1 = 0;
    $hr_salida_sala_check1 = 0;



    # Indicar que usaremos el IOFactory
    use PhpOffice\PhpSpreadsheet\IOFactory;

    if (isset($_POST['save_excel_data'])) {
        $fileName = $_FILES['import_file']['name'];
        $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowed_ext = ['xls', 'xlsx'];
        $rutaArchivo = $_FILES['import_file']['tmp_name'];
        $documento = IOFactory::load($rutaArchivo);

        # Recuerda que un documento puede tener múltiples hojas
        # obtener conteo e iterar
        $totalDeHojas = $documento->getSheetCount();

        # Iterar hoja por hoja
        for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $documento->getSheet($indiceHoja);
            $contador = 0;
            # Iterar filas
            foreach ($hojaActual->getRowIterator($startRow = 1, $endRow = 1) as $fila) {
                foreach ($fila->getCellIterator() as $celda) {
                    // Aquí podemos obtener varias cosas interesantes
                    #https://phpoffice.github.io/PhpSpreadsheet/master/PhpOffice/PhpSpreadsheet/Cell/Cell.html

                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();

                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();

                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();

                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();

                    $resuly = $valorRaw . $contador++;;





                    if ($valorRaw == "aniom") {
                        $aniom_check = "True";
                        $aniom_check1 = $contador - 1;
                    }
                    if ($valorRaw == "mesm") {
                        $mesm_check = "True";
                        $mesm_check1 = $contador - 1;
                    }
                    if ($valorRaw == "cvePresupuestal") {
                        $cvepresupuestal_check = "True";
                        $cvepresupuestal_check1 = $contador - 1;
                    }
                    if ($valorRaw == "NO_QUIR") {
                        $NO_QUIR_check =  "True";
                        $NO_QUIR_check1 = $contador - 1;
                    }
                    if ($valorRaw == "INTNO") {
                        $INTNO_check =  "True";
                        $INTNO_check1 = $contador - 1;
                    }
                    if ($valorRaw == "FEINTQ") {
                        $FEINTQ_check =  "True";
                        $FEINTQ_check1 = $contador - 1;
                    }
                    if ($valorRaw == "HRINI") {
                        $HRINI_check =  "True";
                        $HRINI_check1 = $contador - 1;
                    }
                    if ($valorRaw == "HRFIN") {
                        $HRFIN_check =  "True";
                        $HRFIN_check1 = $contador - 1;
                    }
                    if ($valorRaw == "fec_entrada_sala") {
                        $fec_entrada_sala_check =  "True";
                        $fec_entrada_sala_check1 = $contador - 1;
                    }
                    if ($valorRaw == "fec_inicio_iqx") {
                        $fec_inicio_iqx_check =  "True";
                        $fec_inicio_iqx_check1 = $contador - 1;
                    }
                    if ($valorRaw == "fec_termino_iqx") {
                        $fec_termino_iqx_check =  "True";
                        $fec_termino_iqx_check1 = $contador - 1;
                    }
                    if ($valorRaw == "fec_salida_sala") {
                        $fec_salida_sala_check =  "True";
                        $fec_salida_sala_check1 = $contador - 1;
                    }
                    if ($valorRaw == "hr_entrada_sala") {
                        $hr_entrada_sala_check =  "True";
                        $hr_entrada_sala_check1 = $contador - 1;
                    }
                    if ($valorRaw == "hr_inicio_iqx") {
                        $hr_inicio_iqx_check =  "True";
                        $hr_inicio_iqx_check1 = $contador - 1;
                    }
                    if ($valorRaw == "hr_termino_iqx") {
                        $hr_termino_iqx_check =  "True";
                        $hr_termino_iqx_check1 = $contador - 1;
                    }
                    if ($valorRaw == "hr_salida_sala") {
                        $hr_salida_sala_check =  "True";
                        $hr_salida_sala_check1 = $contador - 1;
                    }
                }
            }
        }
    }

    if ($aniom_check == "false" || $mesm_check == "false" || $cvepresupuestal_check == "false" || $NO_QUIR_check == "false" || $INTNO_check == "false" || $FEINTQ_check == "false" || $HRINI_check == "false" || $HRFIN_check == "false" || $fec_entrada_sala_check == "false" || $fec_inicio_iqx_check == "false" || $fec_termino_iqx_check == "false" || $fec_salida_sala_check == "false" || $hr_entrada_sala_check == "false" || $hr_inicio_iqx_check == "false" || $hr_termino_iqx_check == "false" || $hr_salida_sala_check == "false") {


        if ($aniom_check == "false") {
    ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: aniom</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'aniom_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: aniom',
                    imageUrl: '../img/aniom.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }

        if ($mesm_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: mesm</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'mesm_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: mesm',
                    imageUrl: '../img/mesm.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($cvepresupuestal_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: cvePresupuesta</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'cvePresupuestal_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: cvePresupuestal',
                    imageUrl: '../img/cvepresupuestal.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($NO_QUIR_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: NO_QUIR</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'NO_QUIR_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: NO_QUIR',
                    imageUrl: '../img/NO_QUIR.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($INTNO_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: INTNO</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'INTNO_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: INTNO',
                    imageUrl: '../img/INTNO.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }

        if ($FEINTQ_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: FEINTQ</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'FEINTQ_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: FEINTQ',
                    imageUrl: '../img/FEINTQ.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($HRINI_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: HRINI</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'HRINI_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: HRINI',
                    imageUrl: '../img/HRINI.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($HRFIN_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: HRFIN</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'HRFIN_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: HRFIN',
                    imageUrl: '../img/HRFIN.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($fec_entrada_sala_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: fec_entrada_sala</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'fec_entrada_sala_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: fec_entrada_sala',
                    imageUrl: '../img/fec_entrada_sala.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($fec_inicio_iqx_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: fec_inicio_iqx</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'fec_inicio_iqx_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: fec_inicio_iqx',
                    imageUrl: '../img/fec_inicio_iqx.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($fec_termino_iqx_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: fec_termino_iqx</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'fec_termino_iqx_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: fec_termino_iqx',
                    imageUrl: '../img/fec_termino_iqx.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($fec_salida_sala_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: fec_salida_sala</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'fec_salida_sala_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: fec_salida_sala',
                    imageUrl: '../img/fec_salida_sala.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($hr_entrada_sala_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: hr_entrada_sala</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'hr_entrada_sala_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: hr_salida_sala',
                    imageUrl: '../img/hr_entrada_sala.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($hr_inicio_iqx_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: hr_inicio_iqx</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'hr_inicio_iqx_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: hr_inicio_iqx',
                    imageUrl: '../img/hr_inicio_iqx.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($hr_termino_iqx_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: hr_termino_iqx</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'hr_termino_iqx_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: hr_termino_iqx',
                    imageUrl: '../img/hr_termino_iqx.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
        <?php
        }
        if ($hr_salida_sala_check == "false") {
        ?>
            <h1 style="color:red">Columna no valida favor de corroborar el nombre de la columna debe de ser: hr_salida_sala</h1>
            <script type="text/javascript">
                Swal.fire({
                    title: 'hr_salida_sala_check!',
                    text: 'Columna no valida favor de corroborar el nombre de la columna debe de ser: hr_salida_sala',
                    imageUrl: '../img/hr_salida_sala.PNG',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            </script>
    <?php
        }
    } else {
        $hacer = "True";
    }
    ?>

    <?php
    set_time_limit(500);
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'cirugias');
    $conn1 = include("con_db.php");


    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    if ($hacer == "True") {

        if (isset($_POST['save_excel_data'])) {
            $fileName = $_FILES['import_file']['name'];
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowed_ext = ['xls', 'xlsx'];
            if (in_array($file_ext, $allowed_ext)) {
                $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                $data = $spreadsheet->getActiveSheet()->toArray();

                $contarMigual9 = 0;
                $contarMigual8p5 = 0;
                $contarVigual14 = 0;
                $contarVigual14p5 = 0;
                $count = "1";
                $HospitalRe = $_SESSION['nombre'];
                $sql_eliminar = "DELETE FROM tblcirugias WHERE Hospital='$HospitalRe'";
                $resulteliminar = mysqli_query($con, $sql_eliminar);

                foreach ($data as $row) {
                    if ($count > 0) {
                        $aniom = $row[$aniom_check1];
                        $mesm = $row[$mesm_check1];
                        $cvepresupuestal = $row[$cvepresupuestal_check1];
                        $NO_QUIR = $row[$NO_QUIR_check1];
                        $INTNO = $row[$INTNO_check1];
                        $HRINI = $row[$hr_entrada_sala_check1];
                        $HRFIN = $row[$hr_salida_sala_check1];
                        $fec_entrada_sala = $row[$fec_entrada_sala_check1];
                        $fec_inicio_iqx = $row[$fec_inicio_iqx_check1];
                        $fec_termino_iqx = $row[$fec_termino_iqx_check1];
                        $fec_salida_sala = $row[$fec_salida_sala_check1];
                        $hr_entrada_sala = $row[$hr_entrada_sala_check1];
                        $hr_inicio_iqx = $row[$hr_inicio_iqx_check1];
                        $hr_termino_iqx = $row[$hr_termino_iqx_check1];
                        $hr_salida_sala = $row[$hr_salida_sala_check1];



                        $originalDate = $FEINTQ = $row[$FEINTQ_check1];




                        $date = $originalDate;
                        $date = str_replace('/', '-', $date);
                        $resultado = date('Y-m-d', strtotime($date));
                        if ($resultado >= "2019-01-01") {
                            $originalDate1 = $FEINTQ = $row[$FEINTQ_check1];
                            $newDate1 = date("Y-m-d", strtotime($originalDate1));
                            $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');

                            $fecha = $dias[date('N', strtotime($newDate1))];
                            $numeroQ = $NO_QUIR = $row[$NO_QUIR_check1];


                            if (str_contains($numeroQ, 'Q') || str_contains($numeroQ, 'M') || str_contains($numeroQ, 'q') || str_contains($numeroQ, 'm')) {
                                if ($INTNO = $row[$INTNO_check1] < 2) {
                                    if ($fecha == "Lunes" || $fecha == "Martes" || $fecha == "Miercoles" || $fecha == "Jueves" || $fecha == "Viernes") {
                                        if ($HRINI = $row[$hr_entrada_sala_check1] >= 8 && $HRINI = $row[$hr_entrada_sala_check1] <= 20) {
                                            $hrinicio = $HRINI = $row[$hr_entrada_sala_check1];
                                            $Hospital = $_SESSION['nombre'];
                                            if ($HRFIN = $row[$hr_salida_sala_check1] >= 8 && $HRFIN = $row[$hr_salida_sala_check1] <= 20) {
                                                $hrfin = $HRFIN = $row[$hr_salida_sala_check1];
                                                $cvepresupuestal = $row[$cvepresupuestal_check1];
                                                $studentQuery = "INSERT INTO tblcirugias(aniom,mesm,NO_QUIR,ClavePr,INTNO,FEINTQ,HRINI,HRFIN,fec_entrada_sala,fec_inicio_iqx,fec_termino_iqx,fec_salida_sala,hr_entrada_sala,hr_inicio_iqx,hr_termino_iqx,hr_salida_sala,NomDia,fech,Hospital) VALUES ('$aniom','$mesm','$NO_QUIR','$cvepresupuestal','$INTNO','$resultado','$hrinicio','$hrfin','$fec_entrada_sala','$fec_inicio_iqx','$fec_termino_iqx','$fec_salida_sala','$hr_entrada_sala','$hr_inicio_iqx','$hr_termino_iqx','$hr_salida_sala','$fecha','$resultado','$Hospital')";
                                                $result = mysqli_query($con, $studentQuery);
                                                $msg = true;
                                            }
                                            if ($HRFIN = $row[$hr_salida_sala_check1] > 20) {
                                                $convertir20 = "20";
                                                $studentQuery = "INSERT INTO tblcirugias(aniom,mesm,NO_QUIR,ClavePr,INTNO,FEINTQ,HRINI,HRFIN,fec_entrada_sala,fec_inicio_iqx,fec_termino_iqx,fec_salida_sala,hr_entrada_sala,hr_inicio_iqx,hr_termino_iqx,hr_salida_sala,NomDia,fech,Hospital) VALUES ('$aniom','$mesm','$NO_QUIR','$cvepresupuestal','$INTNO','$resultado','$hrinicio','$convertir20','$fec_entrada_sala','$fec_inicio_iqx','$fec_termino_iqx','$fec_salida_sala','$hr_entrada_sala','$hr_inicio_iqx','$hr_termino_iqx','$hr_salida_sala','$fecha','$resultado','$Hospital')";
                                                $result = mysqli_query($con, $studentQuery);
                                                $msg = true;
                                            }
                                        }


                                        if ($HRINI = $row[$hr_entrada_sala_check1] >= 8 && $HRINI = $row[$hr_entrada_sala_check1] <= 9.00) {
                                            $contarMigual9++;
                                        }

                                        if ($HRINI = $row[$hr_entrada_sala_check1] >= 8 && $HRINI = $row[$hr_entrada_sala_check1] <= 8.25) {
                                            $contarMigual8p5++;
                                        }


                                        if ($HRINI = $row[$hr_entrada_sala_check1] >= 14.50 && $HRINI = $row[$hr_entrada_sala_check1] <= 15.50) {
                                            $contarVigual14++;
                                        }

                                        if ($HRINI = $row[$hr_entrada_sala_check1] >= 14.50 && $HRINI = $row[$hr_entrada_sala_check1] <= 14.75) {
                                            $contarVigual14p5++;
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        $count = "1";
                    }
                }



                if ($conn1) {
                    $consulta = "SELECT * FROM tblcirugias WHERE Hospital='$Hospital' ";
                    $resultado = mysqli_query($con11, $consulta);
                    if ($resultado) {
                        while ($rowss = $resultado->fetch_array()) {
                            $HRINII = $rowss['HRINI'];
                            $idd = $rowss['tblid'];
                            $HRFINN = $rowss['HRFIN'];

                            $sumaee = ((float)$HRFINN - (float)$HRINII) + 0.33;
                            $sql2 = "UPDATE tblcirugias SET Eficiencia_Qx='$sumaee' WHERE tblid ='$idd' ";
                            $result = mysqli_query($con, $sql2);
                        }
                    }
                }

                if ($conn1) {

                    $fechaminima = "SELECT MIN(fech) FROM tblcirugias WHERE Hospital='$Hospital'";
                    $resultfechaminima = mysqli_query($con, $fechaminima);

                    while ($fechmin = $resultfechaminima->fetch_assoc()) {
                        $fechminn = $fechmin['MIN(fech)'];
                    }
                    $orDateMin = $fechminn;
                    $newDateMin = date("d/m/Y", strtotime($orDateMin));
                    $sql_eliminar2 = "DELETE FROM tblestadisticas WHERE Hospitall='$Hospital'";
                    $sql2211 = "INSERT INTO tblestadisticas (FechMin,Hospitall,HrinicioM,HriniciomM,HrinicioV,HriniciomV) VALUE ('$newDateMin','$Hospital','$contarMigual9','$contarMigual8p5','$contarVigual14','$contarVigual14p5') ";
                    $resulteeliminar = mysqli_query($con, $sql_eliminar2);
                    $resulte212 = mysqli_query($con, $sql2211);



                    $fechamaxima = "SELECT MAX(fech) FROM tblcirugias WHERE Hospital='$Hospital'";
                    $resultfechamaxima = mysqli_query($con, $fechamaxima);
                    while ($fechmax = $resultfechamaxima->fetch_assoc()) {
                        $fechmaxx = $fechmax['MAX(fech)'];
                    }
                    $orDateMax = $fechmaxx;
                    $newDateMax = date("d/m/Y", strtotime($orDateMax));
                    $sql2212 = "UPDATE tblestadisticas SET FechMax='$newDateMax' WHERE FechMin='$newDateMin' AND Hospitall='$Hospital' ";
                    $resulte2122 = mysqli_query($con, $sql2212);




                    function bussiness_days($begin_date, $end_date, $type = 'array')
                    {

                        $date_1 = date_create($begin_date);

                        $date_2 = date_create($end_date);

                        if ($date_1 > $date_2) return FALSE;

                        $bussiness_days = array();

                        while ($date_1 <= $date_2) {

                            $day_week = $date_1->format('w');

                            if ($day_week > 0 && $day_week < 6) {

                                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                            }

                            date_add($date_1, date_interval_create_from_date_string('1 day'));
                        }

                        if (strtolower($type) === 'sum') {

                            array_map(function ($k) use (&$bussiness_days) {

                                $bussiness_days[$k] = count($bussiness_days[$k]);
                            }, array_keys($bussiness_days));
                        }

                        return $bussiness_days;
                    }



                    $fechi = $fechminn;
                    $fechfin = $fechmaxx;
                    $dias_habiles = bussiness_days($fechi, $fechfin);
                    $totalss = 0;

                    foreach ($dias_habiles as $anio_mes => $dias) {

                        $dias_mes = count($dias);

                        $mensaje1 = "{$dias_mes}";

                        for ($i = 1; $i <= 1; $i++) {
                            $totalss = $totalss + $mensaje1;
                        }
                    }

                    $consultanoQ = "SELECT DISTINCT NO_QUIR FROM tblcirugias WHERE Hospital='$Hospital' ";
                    $resultadonoQ = mysqli_query($con, $consultanoQ);
                    if ($resultadonoQ) {
                        $contador = 0;
                        while ($rowss = $resultadonoQ->fetch_array()) {
                            $NO_QUIRq = $rowss['NO_QUIR'];
                            $contador++;
                        }
                    }

                    $sql22122 = "UPDATE tblestadisticas SET DiasHabiles='$totalss', NoQuirofanos='$contador' WHERE FechMin='$newDateMin' AND Hospitall='$Hospital' ";
                    $resulte21222 = mysqli_query($con, $sql22122);
                }


                if ($conn1) {
                    $consulta11 = "SELECT * FROM tblcirugias Where Hospital='$HospitalRe'";
                    $resultado11 = mysqli_query($con11, $consulta11);
                    if ($resultado11) {
                        $totalss = 0;
                        while ($rowss = $resultado11->fetch_array()) {
                            $totalss = $totalss + $rowss['Eficiencia_Qx'];
                        }
                        $consulta111 = "SELECT * FROM tblestadisticas Where Hospitall='$HospitalRe'";
                        $resultado111 = mysqli_query($con11, $consulta111);
                        if ($consulta111) {
                            while ($rowss = $resultado111->fetch_array()) {
                                $id = $rowss['tblidd'];
                                $FechMin = $rowss['FechMin'];
                            }

                            $sql221 = "UPDATE tblestadisticas SET Sumas='$totalss' WHERE tblidd='$id' ";
                            $resulte2 = mysqli_query($con, $sql221);
                        }
                    }
                }



                if ($conn1) {
                    $consultaResultado = "SELECT * FROM tblestadisticas Where Hospitall='$HospitalRe'";
                    $resultadoConsulta = mysqli_query($con11, $consultaResultado);
                    if ($consultaResultado) {
                        while ($rowss = $resultadoConsulta->fetch_array()) {
                            $Sumass = $rowss['Sumas'];
                            $DiasHabiless = $rowss['DiasHabiles'];
                            $NoQuirofanos = $rowss['NoQuirofanos'];
                            $idd = $rowss['tblidd'];
                        }

                        $dennominador = (12 * $NoQuirofanos * $DiasHabiless);

                        $sql221 = "UPDATE tblestadisticas SET Denominador='$dennominador' WHERE tblidd='$idd' ";
                        $resulte2 = mysqli_query($con, $sql221);
                    }
                }



                if ($conn1) {
                    $consultaResultado1 = "SELECT * FROM tblestadisticas  WHERE tblidd='$idd'";
                    $resultadoConsulta1 = mysqli_query($con11, $consultaResultado1);
                    if ($consultaResultado1) {
                        while ($rowss = $resultadoConsulta1->fetch_array()) {
                            $HrinicioM = $rowss['HrinicioM'];
                            $HriniciomM = $rowss['HriniciomM'];
                            $HrinicioV = $rowss['HrinicioV'];
                            $HriniciomV = $rowss['HriniciomV'];
                            $Denominadorr = $rowss['Denominador'];
                            $Sumass = $rowss['Sumas'];
                            $idd = $rowss['tblidd'];
                        }

                        $resultadoOpoM = round(($HriniciomM / $HrinicioM) * 100, 2);
                        $resultadoOpoV = round(($HriniciomV / $HrinicioV) * 100, 2);

                        $resultadoFinal = ($Sumass / $Denominadorr) * 100;
                        $resultadodosdecimas = round($resultadoFinal, 2);

                        $sqlFinal = "UPDATE tblestadisticas SET Resultado='$resultadodosdecimas',OpoM='$resultadoOpoM',OpoV='$resultadoOpoV' WHERE tblidd='$idd' ";
                        $resulteFinal = mysqli_query($con, $sqlFinal);
                    }
                }

                if ($conn1) {
                    $var1 = "";
                    $consulta1 = "SELECT `ClavePr` FROM `tblcirugias` WHERE Hospital='$HospitalRe' GROUP BY `ClavePr` HAVING COUNT(*)>0   ";
                    $resultado = mysqli_query($con11, $consulta1);
                    if ($resultado) {
                        $var1 = [];
                        while ($rowss = $resultado->fetch_array()) {
                            $ClaveP = $rowss['ClavePr'];


                            $verdb = "SELECT `Unidadd` FROM `tblunidades` WHERE `ClavePresupues` ='$ClaveP'";
                            $verdbResul = mysqli_query($con11, $verdb);
                            while ($rowsss = $verdbResul->fetch_array()) {
                                $unidadd = $rowsss['Unidadd'];

                                $var1[] = $unidadd = $rowsss['Unidadd'] . ": " . $ClaveP = $rowss['ClavePr'];
                            }
                        }
                        $cars = implode("<br>", $var1);
    ?>


    <?php
                    }
                }

                if (isset($msg)) {
                    $_SESSION['message'] = $cars;
                    header('Location: ../../../subirexcel.php');
                    exit(0);
                } else {
                    $_SESSION['message'] = "Upss Parece que algo fallo";
                    header('Location: ../../../subirexcel.php');
                    exit(0);
                }
            } else {
                $_SESSION['message'] = "Upss parece que el archivo no es compatible";
                header('Location: ../../../subirexcel.php');
                exit(0);
            }
        }
    }

    ?>
















</body>

</html>