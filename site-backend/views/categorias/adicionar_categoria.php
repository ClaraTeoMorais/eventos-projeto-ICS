<?php
    include('../../db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];

        $query = "INSERT INTO Categoria (nome) VALUES ('$nome')";
        mysqli_query($db, $query) or die(mysqli_error($db));

        header("Location: index_categoria.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Categoria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5 mb-5">

    <a href="index_categoria.php" class="btn btn-secondary mb-4">Voltar</a>

    <h1 class="mb-4">Adicionar Categoria</h1>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nome da Categoria</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Categoria</button>
    </form>

</div>
</body>
</html>
