<?php
    session_start();
    include_once('../config/dbconect.php');

    if (isset($_GET['id'])) {
        $database = new Connection();
        $db = $database->open();
        try {
            // Consulta para eliminar el registro por `tblid`
            $sql = "DELETE FROM comisiones WHERE tblid = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

            // Ejecutar consulta y definir mensaje de sesión
            $_SESSION['messageeliminar'] = ($stmt->execute()) ? 'Registro eliminado correctamente' : 'Hubo un error al eliminar el registro';
        } catch (PDOException $e) {
            $_SESSION['messageeliminar'] = $e->getMessage();
        }

        // Cerrar conexión
        $database->close();
    } else {
        $_SESSION['messageeliminar'] = 'Selecciona un registro para eliminar primero';
    }

    header('location: ../../inicio.php');
?>
