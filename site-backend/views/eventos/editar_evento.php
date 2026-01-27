<?php
    include('../../db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = intval($_POST['id']);
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $local = $_POST['local'];
        $categoria_id = !empty($_POST['categoria_id']) ? intval($_POST['categoria_id']) : "NULL";

        $query = "
            UPDATE Evento 
            SET 
                categoria_id = $categoria_id,
                titulo = '$titulo',
                descricao = '$descricao',
                data = '$data',
                horario = '$horario',
                local = '$local'
            WHERE id = $id
        ";

        mysqli_query($connect, $query) or die(mysqli_error($connect));

        header("Location: detail_evento.php?id=$id");
        exit();
    }

    if (!isset($_GET['id'])) {
        header("Location: index_evento.php");
        exit();
    }

    $id = intval($_GET['id']);

    $query = "
        SELECT * FROM Evento WHERE id = $id
    ";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

    if (mysqli_num_rows($result) == 0) {
        header("Location: index_evento.php");
        exit();
    }

    $evento = mysqli_fetch_assoc($result);

    $categorias = mysqli_query($connect, "SELECT * FROM Categoria ORDER BY nome");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5 mb-5">

    <a href="detail_evento.php?id=<?= $evento['id']; ?>" class="btn btn-secondary mb-4">Voltar</a>

    <h1 class="mb-4">Editar Evento</h1>

    <form method="post">
        <input type="hidden" name="id" value="<?= $evento['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input 
                type="text" 
                name="titulo" 
                class="form-control" 
                value="<?= htmlspecialchars($evento['titulo']); ?>" 
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="categoria_id" class="form-control">
                <option value="">Sem categoria</option>
                <?php
                    while ($cat = mysqli_fetch_assoc($categorias)) {
                        $selected = ($cat['id'] == $evento['categoria_id']) ? 'selected' : '';
                        echo "<option value='{$cat['id']}' $selected>" . htmlspecialchars($cat['nome']) . "</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4" required><?= htmlspecialchars($evento['descricao']); ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Data</label>
            <input 
                type="date" 
                name="data" 
                class="form-control" 
                value="<?= $evento['data']; ?>" 
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Horário</label>
            <input 
                type="time" 
                name="horario" 
                class="form-control" 
                value="<?= $evento['horario']; ?>" 
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Local</label>
            <input 
                type="text" 
                name="local" 
                class="form-control" 
                value="<?= htmlspecialchars($evento['local']); ?>" 
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
