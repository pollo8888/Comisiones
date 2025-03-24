<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "comisiones");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");

// Consulta para la tabla de comisiones próximas a vencer
$query_expiring = "SELECT folio, nombre_comisionado, fecha_termino_num,
                   DATEDIFF(fecha_termino_num, CURDATE()) AS dias_restantes
                   FROM comisiones
                   WHERE DATEDIFF(fecha_termino_num, CURDATE()) <= 7 AND DATEDIFF(fecha_termino_num, CURDATE()) > 0";
$result_expiring = $conexion->query($query_expiring);

// Consulta para el gráfico de comisiones por categoría
$query_category = "SELECT categoria, COUNT(*) as total FROM comisiones GROUP BY categoria";
$result_category = $conexion->query($query_category);
$categories = [];
$category_totals = [];
while ($row = $result_category->fetch_assoc()) {
    $categories[] = $row['categoria'];
    $category_totals[] = $row['total'];
}

// Consulta para el gráfico de duración de comisiones
$query_duration = "SELECT DATEDIFF(fecha_termino_num, fecha_inicio_num) as duracion, COUNT(*) as total 
                   FROM comisiones 
                   WHERE fecha_termino_num IS NOT NULL AND fecha_inicio_num IS NOT NULL 
                   GROUP BY duracion";
$result_duration = $conexion->query($query_duration);
$durations = [];
$duration_totals = [];
while ($row = $result_duration->fetch_assoc()) {
    $durations[] = $row['duracion'];
    $duration_totals[] = $row['total'];
}

// Consulta para el gráfico de comisiones por mes de inicio
$query_month = "SELECT MONTH(fecha_inicio_num) as month, COUNT(*) as total FROM comisiones GROUP BY month";
$result_month = $conexion->query($query_month);
$months = [];
$month_totals = [];
while ($row = $result_month->fetch_assoc()) {
    $months[] = $row['month'];
    $month_totals[] = $row['total'];
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard de Comisiones</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Inicio</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Comisiones</a>
                    </li>
                </ul>
            </div>
            
            <!-- Tabla de Comisiones Próximas a Vencer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Comisiones Próximas a Vencer</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="comisiones-vencer" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Folio</th>
                                            <th>Nombre Comisionado</th>
                                            <th>Fecha Término</th>
                                            <th>Días Restantes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        while ($row = $result_expiring->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $row['folio'] ?></td>
                                                <td><?= $row['nombre_comisionado'] ?></td>
                                                <td><?= $row['fecha_termino_num'] ?></td>
                                                <td><?= $row['dias_restantes'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row for Additional Charts -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total de Comisiones por Categoría</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chartCommissionsByCategory"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Duración de Comisiones (en días)</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chartCommissionsDuration"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Comisiones por Mes de Inicio</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chartCommissionsByMonth"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Core JS Files and Plugins -->
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- DataTables Initialization Script -->
<script>
    $(document).ready(function () {
        $('#comisiones-vencer').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            responsive: true,
            paging: true
        });
    });
</script>

<!-- Chart JS Script -->
<script>
    // Gráfico de Comisiones por Categoría
    const ctxCategory = document.getElementById('chartCommissionsByCategory').getContext('2d');
    new Chart(ctxCategory, {
        type: 'bar',
        data: {
            labels: <?= json_encode($categories) ?>,
            datasets: [{
                label: 'Total Comisiones',
                data: <?= json_encode($category_totals) ?>,
                backgroundColor: '#FF9F40'
            }]
        },
        options: { responsive: true }
    });

    // Gráfico de Duración de Comisiones
    const ctxDuration = document.getElementById('chartCommissionsDuration').getContext('2d');
    new Chart(ctxDuration, {
        type: 'bar',
        data: {
            labels: <?= json_encode($durations) ?>,
            datasets: [{
                label: 'Número de Comisiones',
                data: <?= json_encode($duration_totals) ?>,
                backgroundColor: '#36A2EB'
            }]
        },
        options: { responsive: true }
    });

    // Gráfico de Comisiones por Mes de Inicio
    const ctxMonth = document.getElementById('chartCommissionsByMonth').getContext('2d');
    new Chart(ctxMonth, {
        type: 'line',
        data: {
            labels: <?= json_encode($months) ?>,
            datasets: [{
                label: 'Comisiones por Mes',
                data: <?= json_encode($month_totals) ?>,
                borderColor: '#FF6384',
                fill: false
            }]
        },
        options: { responsive: true }
    });
</script>

</body>
</html>
