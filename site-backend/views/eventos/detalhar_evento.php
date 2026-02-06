<?php
    include('../../db.php');

    if (!isset($_GET['id'])) {
        header("Location: index_evento.php");
        exit();
    }

    $id = intval($_GET['id']);

    $query = "
        SELECT 
            Evento.*,
            Categoria.nome AS categoria
        FROM Evento
        LEFT JOIN Categoria ON Evento.categoria_id = Categoria.id
        WHERE Evento.id = $id
    ";

    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

    if (mysqli_num_rows($result) == 0) {
        header("Location: index_evento.php");
        exit();
    }

    $evento = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5 mb-5">

    <a href="index_evento.php" class="btn btn-secondary mb-4">Voltar</a>

    <h1 class="mb-4">Detalhes do Evento</h1>

    <table class="table table-bordered">
        <tr>
            <th style="width: 200px;">ID</th>
            <td><?= $evento['id']; ?></td>
        </tr>
        <tr>
            <th style="width: 200px;">Título</th>
            <td><?= htmlspecialchars($evento['titulo']); ?></td>
        </tr>
        <tr>
            <th style="width: 200px;">Categoria</th>
            <td><?= $evento['categoria'] ?? 'Sem categoria'; ?></td>
        </tr>
        <tr>
            <th style="width: 200px;">Descrição</th>
            <td><?= htmlspecialchars($evento['descricao']); ?></td>
        </tr>
        <tr>
            <th style="width: 200px;">Data</th>
            <td><?= $evento['data']; ?></td>
        </tr>
        <tr>
            <th style="width: 200px;">Horário</th>
            <td><?= $evento['horario']; ?></td>
        </tr>
        <tr>
            <th style="width: 200px;">Local</th>
            <td><?= htmlspecialchars($evento['local']); ?></td>
        </tr>
    </table>

    <div class="mt-3">
        <a href="editar_evento.php?id=<?= $evento['id']; ?>" class="btn btn-warning">
            Editar
        </a>
        <a href="remover_evento.php?id=<?= $evento['id']; ?>" 
           class="btn btn-danger"
           onclick="return confirm('Tem certeza que deseja excluir este evento?');">
            Excluir
        </a>
    </div>

</div>
</body>
</html>
