<?php
    include('../../db.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Eventos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5">

        <a href="../../index.php" class="btn btn-secondary mb-4">Voltar</a>


        <h1 class="mb-4">Eventos</h1>

        <a href="adicionar_evento.php" class="btn btn-primary mb-3">
            Adicionar novo evento
        </a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 100px;">ID</th>
                    <th>Nome do Evento</th>
                    <th style="width: 300px;">Categoria</th>
                    <th style="width: 150px;">Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php
                $query = "
                    SELECT 
                        Evento.id,
                        Evento.titulo,
                        Categoria.nome AS categoria
                    FROM Evento
                    LEFT JOIN Categoria ON Evento.categoria_id = Categoria.id
                    ORDER BY Evento.id
                ";

                $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".htmlspecialchars($row['titulo'])."</td>";
                            echo "<td>".($row['categoria'] ?? 'Sem categoria')."</td>";
                            echo "<td>";
                                echo "<a href='detalhar_evento.php?id=".$row['id']."' class='btn btn-info btn-sm'>
                                        Detalhar
                                    </a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum evento cadastrado.</td></tr>";
                }
            ?>

            </tbody>
        </table>
    </div>

</body>
</html>
