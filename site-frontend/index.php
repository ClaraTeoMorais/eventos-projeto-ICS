<?php
    include('../db.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Eventos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .evento-card {
            border: 2px solid #000;
            border-radius: 15px;
            padding: 20px;
            height: 100%;
        }

        .evento-titulo {
            font-size: 1.3rem;
            font-weight: bold;
        }

        .evento-info {
            font-size: 0.95rem;
            color: #333;
        }

        .evento-descricao {
            font-size: 0.95rem;
            margin-top: 10px;
        }
    </style>
</head>

<body>
<div class="container mt-5 mb-5">

    <h1 class="mb-4 text-center">Acompanhe os eventos do CNAT</h1>

    <div class="row g-4">

        <?php
            $query = "
                SELECT 
                    Evento.*,
                    Categoria.nome AS categoria
                FROM Evento
                LEFT JOIN Categoria ON Evento.categoria_id = Categoria.id
                ORDER BY Evento.data
            ";

            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($evento = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-6 col-lg-4">
                <div class="evento-card">

                    <div class="evento-titulo">
                        <?= htmlspecialchars($evento['titulo']); ?>
                    </div>

                    <div class="evento-info mt-2">
                        <strong>Data:</strong> <?= $evento['data']; ?><br>
                        <strong>Hora:</strong> <?= $evento['horario']; ?><br>
                        <strong>Local:</strong> <?= htmlspecialchars($evento['local']); ?>
                    </div>

                    <div class="evento-descricao">
                        <?= htmlspecialchars($evento['descricao']); ?>
                    </div>

                    <div class="mt-3">
                        <?php if ($evento['categoria']) { ?>
                            <span class="badge bg-primary">
                                <?= htmlspecialchars($evento['categoria']); ?>
                            </span>
                        <?php } else { ?>
                            <span class="badge bg-secondary">
                                Sem categoria
                            </span>
                        <?php } ?>
                    </div>

                </div>
            </div>
        <?php
                }
            } else {
                echo "<p>Nenhum evento disponível no momento.</p>";
            }
        ?>

    </div>
</div>
</body>
</html>