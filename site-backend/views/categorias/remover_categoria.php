<?php
    include('../../db.php');

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $query = "DELETE FROM Categoria WHERE id = $id";
        mysqli_query($db, $query) or die(mysqli_error($db));

        header("Location: index_categoria.php");
        exit();
    } else {
        header("Location: index_categoria.php");
        exit();
    }
?>
