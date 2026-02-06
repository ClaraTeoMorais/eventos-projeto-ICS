<?php
    include('../../db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $local = $_POST['local'];
        $categoria_id = !empty($_POST['categoria_id']) ? intval($_POST['categoria_id']) : "NULL";

        $query = "
            INSERT INTO Evento (categoria_id, titulo, descricao, data, horario, local)
            VALUES ($categoria_id, '$titulo', '$descricao', '$data', '$horario', '$local')
        ";

        mysqli_query($connect, $query) or die(mysqli_error($connect));

        header("Location: index_evento.php");
        exit();
    }

    $categorias = mysqli_query($connect, "SELECT * FROM Categoria ORDER BY nome");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5 mb-5">

    <a href="index_evento.php" class="btn btn-secondary mb-4">Voltar</a>

    <h1 class="mb-4">Adicionar Evento</h1>

    <form method="post">

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="categoria_id" class="form-control">
                <option value="">Sem categoria</option>
                <?php
                    while ($cat = mysqli_fetch_assoc($categorias)) {
                        echo "<option value='{$cat['id']}'>" . htmlspecialchars($cat['nome']) . "</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="data" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Horário</label>
            <input type="time" name="horario" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Local</label>
            <input type="text" name="local" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Evento</button>

    </form>

</div>
</body>
</html>
