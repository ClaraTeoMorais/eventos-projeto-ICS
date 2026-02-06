<?php
    include('../../db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['id']);
        $nome = $_POST['nome'];

        $query = "UPDATE Categoria SET nome = '$nome' WHERE id = $id";
        mysqli_query($connect, $query) or die(mysqli_error($connect));

        header("Location: index_categoria.php");
        exit();
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $query = "SELECT * FROM Categoria WHERE id = $id";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

        if (mysqli_num_rows($result) == 0) {
            header("Location: index_categoria.php");
            exit();
        }

        $categoria = mysqli_fetch_assoc($result);
    } else {
        header("Location: index_categoria.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5 mb-5">

    <a href="index_categoria.php" class="btn btn-secondary mb-4">
        Voltar
    </a>

    <h1 class="mb-4">Editar Categoria</h1>

    <form method="post">
        <input type="hidden" name="id" value="<?= $categoria['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Nome da Categoria</label>
            <input 
                type="text" 
                name="nome" 
                class="form-control" 
                value="<?= htmlspecialchars($categoria['nome']); ?>" 
                required
            >
        </div>

        <button type="submit" class="btn btn-success">
            Salvar Alterações
        </button>
    </form>

</div>
</body>
</html>
