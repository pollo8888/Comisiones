<?php
class Conexion{	  
    public static function Conectar() {        
        define('servidor', 'localhost');
        define('nombre_bd', 'cirugias');
        define('usuario', 'root');
        define('password', '');					        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es: ". $e->getMessage());
        }
    }
}
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$id  = $_GET['id'];
$consulta = "SELECT * FROM pliegos WHERE tblid='$id'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $pliegostra) {

}



$num_pliego = $pliegostra['num_pliego'];
$fecha_elaboracion = $pliegostra['fecha_elaboracion'];
$fecha = new DateTime($fecha_elaboracion);
$fecha->modify('-1 day');
$fecha_elaboracionCorrecta=$fecha->format('d/m/Y');

$fechaString = $fecha_elaboracionCorrecta;

// Convierte la cadena de fecha a un objeto DateTime
$fechaObj = DateTime::createFromFormat('d/m/Y', $fechaString);

if ($fechaObj) {
    // Obtiene el nombre del día, el día del mes, el nombre del mes y el año
    $nombreDia = obtenerNombreDiaEnEspanol($fechaObj->format('l'));
    $dia = $fechaObj->format('d');
    $nombreMes = obtenerNombreMesEnEspanol($fechaObj->format('F'));
    $ano = $fechaObj->format('Y');

    // Imprime la fecha en el formato deseado
    $fecha_elaboracion_fin= "$nombreDia, $dia de $nombreMes de $ano";
} else {
    echo "Formato de fecha incorrecto";
}

function obtenerNombreDiaEnEspanol($nombreDiaIngles) {
    $diasEnEspanol = array(
        'Monday' => 'lunes',
        'Tuesday' => 'martes',
        'Wednesday' => 'miércoles',
        'Thursday' => 'jueves',
        'Friday' => 'viernes',
        'Saturday' => 'sábado',
        'Sunday' => 'domingo'
    );

    return $diasEnEspanol[$nombreDiaIngles];
}

function obtenerNombreMesEnEspanol($nombreMesIngles) {
    $mesesEnEspanol = array(
        'January' => 'enero',
        'February' => 'febrero',
        'March' => 'marzo',
        'April' => 'abril',
        'May' => 'mayo',
        'June' => 'junio',
        'July' => 'julio',
        'August' => 'agosto',
        'September' => 'septiembre',
        'October' => 'octubre',
        'November' => 'noviembre',
        'December' => 'diciembre'
    );

    return $mesesEnEspanol[$nombreMesIngles];
}











$matricula_solicitante = $pliegostra['matricula_solicitante'];
$nombre_solicitante = $pliegostra['nombre_solicitante'];
$cargo_solicitante = $pliegostra['cargo_solicitante'];
$matricula_comisionado = $pliegostra['matricula_comisionado'];
$gpo_jerarquico_comisionado = $pliegostra['gpo_jerarquico_comisionado'];
$contratacion_del_comisionado = $pliegostra['contratacion_del_comisionado'];
$nombre_comisionado = $pliegostra['nombre_comisionado'];
$matricula_autoriza = $pliegostra['matricula_autoriza'];
$nombre_autoriza = $pliegostra['nombre_autoriza'];
$motivo_comision = $pliegostra['motivo_comision'];
$lugar_comision = $pliegostra['lugar_comision'];


$inicio_comision = $pliegostra['inicio_comision'];
$termino_comision = $pliegostra['termino_comision'];
$medio_transporte = $pliegostra['medio_transporte'];
$num_econ = $pliegostra['num_econ']; // Obtén este valor solo si está seteado

$fechaInicio = new DateTime($inicio_comision);
$fechaFin = new DateTime($termino_comision);
$intervalo = $fechaInicio->diff($fechaFin);
$fechaInicioBien=$fechaInicio->format('d/m/Y');
$fechaTerminoBien=$fechaFin->format('d/m/Y');
// Sumar 1 al número total de días para incluir la fecha de inicio
$numDias = $intervalo->days + 1;


$fechaInicioObj = DateTime::createFromFormat('d/m/Y', $fechaInicioBien);

// Obtener el año
$ano11 = $fechaInicioObj->format('Y');


function obtenerMesEnLetrasMayusculas($numeroMes) {
    $meses = [
        1 => 'ENERO',
        2 => 'FEBRERO',
        3 => 'MARZO',
        4 => 'ABRIL',
        5 => 'MAYO',
        6 => 'JUNIO',
        7 => 'JULIO',
        8 => 'AGOSTO',
        9 => 'SEPTIEMBRE',
        10 => 'OCTUBRE',
        11 => 'NOVIEMBRE',
        12 => 'DICIEMBRE',
    ];

    return isset($meses[$numeroMes]) ? $meses[$numeroMes] : 'Mes no válido';
}

// Convertir la fecha a un objeto DateTime
$fechaInicioObj = DateTime::createFromFormat('d/m/Y', $fechaInicioBien);

// Obtener el número del mes
$numeroMes = (int)$fechaInicioObj->format('m');

// Utilizar la función obtenerMesEnLetrasMayusculas
$mesEnLetrasMayusculas = obtenerMesEnLetrasMayusculas($numeroMes);



$anticipo_viaticos = isset($pliegostra['anticipo_viaticos']) ? $pliegostra['anticipo_viaticos'] : 0;
if ($anticipo_viaticos === "00") {
    $anticipo_viaticos = 0;
} elseif ($anticipo_viaticos === "0" || is_null($anticipo_viaticos)) {
    $anticipo_viaticos = ((float)($numDias - 0.5) * 1870.53) * 0.8;

} else {
    // Mantener el valor existente de $anticipo_viaticos
}


function convertirNumeroATexto($numero) {
    $unidades = array('', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve');
    $decenas = array('', 'diez', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa');
    $centenas = array('', 'cien', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos');

    $num = (float) $numero;

    if ($num >= 1 && $num <= 9) {
        return $unidades[$num];
    } elseif ($num >= 10 && $num <= 99) {
        if ($num % 10 == 0) {
            return $decenas[$num / 10];
        } else {
            return $decenas[floor($num / 10)] . ' y ' . convertirNumeroATexto($num % 10);
        }
    } elseif ($num >= 100 && $num <= 999) {
        if ($num % 100 == 0) {
            return $centenas[$num / 100];
        } else {
            return $centenas[floor($num / 100)] . ' ' . convertirNumeroATexto($num % 100);
        }
    } elseif ($num >= 1000 && $num <= 999999) {
        if ($num % 1000 == 0) {
            return convertirNumeroATexto($num / 1000) . ' mil';
        } elseif ($num >= 1000 && $num < 2000) {
            return 'mil ' . convertirNumeroATexto($num % 1000);
        } else {
            return convertirNumeroATexto(floor($num / 1000)) . ' mil ' . convertirNumeroATexto($num % 1000);
        }
    } else {
        // Agrega más casos según sea necesario para cantidades mayores
        return "Número no soportado";
    }
}

$cantidad = $anticipo_viaticos;
$texto = convertirNumeroATexto($cantidad);


$dineroTexto = $texto . " pesos";
if($anticipo_viaticos=="0"){
    $dineroTexto = "Cero" . " pesos";
}
$dineroTexto = strtoupper($dineroTexto);


$anticipo_viaticos = round($anticipo_viaticos, 0);








$anticipo_gastos_vehiculo = $pliegostra['anticipo_gastos_vehiculo'];
$anticipo_pasajes = $pliegostra['anticipo_pasajes'];
$anticipo_gastos_peaje = $pliegostra['anticipo_gastos_peaje'];
$disponible_1603 = $pliegostra['disponible_1603'];
$disponible_1623 = $pliegostra['disponible_1623'];
$unidad_adscripcion = $pliegostra['unidad_adscripcion'];
$clave_presupuestal = $pliegostra['clave_presupuestal'];
$act_realizadas=$pliegostra['act_realizadas'];
$res_obtenidos=$pliegostra['res_obtenidos'];

$qsubio = $pliegostra['qsubio'];



require __DIR__ . "/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


 
$documento = new Spreadsheet();
$nombreDelDocumento = "Comprobacion.xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');

$spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load('PlantillaPliego.xlsx');
$worksheet = $spreadsheet->SetActiveSheetIndex(0);
$worksheet->setTitle("PLIEGO DELEGACIONAL");
$worksheet->getCell("W4")->setValue("$num_pliego");
$worksheet->getCell("Q6")->setValue($fecha_elaboracion_fin);
$worksheet->getCell("I12")->setValue("$nombre_solicitante");
$worksheet->getCell("E14")->setValue("$cargo_solicitante");
$worksheet->getCell("W14")->setValue("$matricula_solicitante");
$worksheet->getCell("I18")->setValue("$nombre_comisionado");
$worksheet->getCell("V18")->setValue("$contratacion_del_comisionado");
$worksheet->getCell("F20")->setValue("$matricula_comisionado");
$worksheet->getCell("L20")->setValue("$gpo_jerarquico_comisionado");
$worksheet->getCell("H22")->setValue("$motivo_comision");
$worksheet->getCell("I24")->setValue("$lugar_comision");
$worksheet->getCell("F26")->setValue("$fechaInicioBien");
$worksheet->getCell("M26")->setValue("$fechaTerminoBien");
$worksheet->getCell("W26")->setValue("$numDias");  
$worksheet->getCell("B36")->setValue("$nombre_solicitante");  
$worksheet->getCell("N36")->setValue("$nombre_autoriza");  
$worksheet->getCell("AF3")->setValue("$anticipo_viaticos");  
$worksheet->getCell("AG3")->setValue("$anticipo_gastos_peaje"); 
$worksheet->getCell("AH3")->setValue("$anticipo_gastos_vehiculo");   
$worksheet->getCell("AI3")->setValue("$anticipo_pasajes");  
$worksheet->getCell("AJ3")->setValue("$mesEnLetrasMayusculas");  
$worksheet->getCell("AK3")->setValue("$ano11");  
$worksheet->getCell("H28")->setValue("$medio_transporte". " " . "$num_econ"."(ACOMPAÑANTE)");  

$worksheet->getCell("T62")->setValue("$clave_presupuestal");
$worksheet->getCell("J84")->setValue("$dineroTexto"." "."00/100 M.N"); 

$worksheet->getCell("N89")->setValue("$nombre_comisionado");  


$worksheet = $spreadsheet->SetActiveSheetIndex(1);
$worksheet->setTitle("SOLICITUD");
if($medio_transporte==="AUTOBUS"){
    $worksheet->getCell("B31")->setValue("XX");  
}elseif($medio_transporte==="VEHICULO PROPIO"){
    $worksheet->getCell("G31")->setValue("XX");  
}elseif($medio_transporte==="VEHICULO OFICIAL"){
    $worksheet->getCell("L31")->setValue("XX"); 
    $worksheet->getCell("L32")->setValue("$num_econ");   
}elseif($medio_transporte==="AVION"){
    $worksheet->getCell("Q31")->setValue("XX");
}else{
    $worksheet->getCell("L31")->setValue("XX");
}










$consultaHospedaje = "SELECT  `No_Factura`, `Proveedor`, `Fecha`, `Importe` FROM `facturas` WHERE `Tipo_factura` = 'HOSPEDAJE' AND PliegoID='$id'";
$resultadoHospedaje = $conexion->prepare($consultaHospedaje);
$resultadoHospedaje->execute();
$datosHospedaje = $resultadoHospedaje->fetchAll(PDO::FETCH_ASSOC);


$consultaTransporte = "SELECT  `No_Factura`, `Proveedor`, `Fecha`, `Importe` FROM `facturas` WHERE `Tipo_factura` = 'TRANSPORTE' AND PliegoID='$id'";
$resultadoTransporte = $conexion->prepare($consultaTransporte);
$resultadoTransporte->execute();
$datosTransporte = $resultadoTransporte->fetchAll(PDO::FETCH_ASSOC);

$consultaOtro = "SELECT  `No_Factura`, `Proveedor`, `Fecha`, `Importe` FROM `facturas` WHERE `Tipo_factura` = 'OTRO' AND PliegoID='$id' ";
$resultadoOtro = $conexion->prepare($consultaOtro);
$resultadoOtro->execute();
$datosOtro = $resultadoOtro->fetchAll(PDO::FETCH_ASSOC);

$consultaAlimentacion = "SELECT  `No_Factura`, `Proveedor`, `Fecha`, `Importe` FROM `facturas` WHERE `Tipo_factura` = 'ALIMENTACION' AND PliegoID='$id' ";
$resultadoAlimentacion = $conexion->prepare($consultaAlimentacion);
$resultadoAlimentacion->execute();
$datosAlimentacion = $resultadoAlimentacion->fetchAll(PDO::FETCH_ASSOC);



$worksheet = $spreadsheet->SetActiveSheetIndex(3);
$worksheet->setTitle("autgas 1");
$filaInicioHospedaje = 19;
$filaInicioAlimentacion = 27;
$filaInicioTransporte = 41;
$filaInicioOtro = 49;

foreach ($datosHospedaje as $row_data) {
    $worksheet->fromArray($row_data, NULL, 'XEW' . $filaInicioHospedaje);
    $filaInicioHospedaje++;
}

foreach ($datosAlimentacion as $row_data) {
    $worksheet->fromArray($row_data, NULL, 'XEW' . $filaInicioAlimentacion);
    $filaInicioAlimentacion++;
}

foreach ($datosTransporte as $row_data) {
    $worksheet->fromArray($row_data, NULL, 'XEW' . $filaInicioTransporte);
    $filaInicioTransporte++;
}

foreach ($datosOtro as $row_data) {
    $worksheet->fromArray($row_data, NULL, 'XEW' . $filaInicioOtro);
    $filaInicioOtro++;
}

$worksheet = $spreadsheet->SetActiveSheetIndex(5);
$worksheet->setTitle("PROY. INFORME DE COMISION 06");
$worksheet->getCell("C22")->setValue("$act_realizadas");  
$worksheet->getCell("C39")->setValue("$res_obtenidos"); 


$worksheet = $spreadsheet->SetActiveSheetIndex(0);

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;


?>
