<?php
    include('../../db.php');

    if (isset($_GET['id'])) {

        $id = intval($_GET['id']);

        $query = "DELETE FROM Evento WHERE id = $id";
        mysqli_query($connect, $query) or die(mysqli_error($connect));

    }

    header("Location: index_evento.php");
    exit();
?>
