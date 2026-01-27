<?php
    include('../../db.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Categorias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5">

        <!-- Botão voltar -->
        <a href="../../index.php" class="btn btn-secondary mb-4">Voltar</a>

        <h1 class="mb-4">Categorias</h1>

        <a href="adicionar_categoria.php" class="btn btn-primary mb-3">Adicionar nova categoria</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 100px;">ID</th>
                    <th>Nome</th>
                    <th style="width: 300px;">Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php
                $query = "SELECT * FROM Categoria";
                $result = mysqli_query($db, $query) or die(mysqli_error($db));

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                            echo "<td>";
                                echo "<a href='editar_categoria.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm me-2'>Editar</a>";
                                echo "<a href='remover_categoria.php?id=" . $row['id'] . "' 
                                        class='btn btn-danger btn-sm'
                                        onclick='return confirm(\"Tem certeza que deseja excluir esta categoria?\");'>
                                        Excluir
                                      </a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhuma categoria cadastrada.</td></tr>";
                }
            ?>

            </tbody>
        </table>
    </div>
</body>
</html>
