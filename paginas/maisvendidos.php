<?php

include(__DIR__ . "/../conexao.php");

$sql = "
    SELECT
        p.id_produto,
        p.nome,
        p.marca,
        p.preco,
        p.imagem,
        SUM(iv.quantidade) AS total_vendido
    FROM produtos p
    INNER JOIN itens_vendidos iv
        ON p.id_produto = iv.id_produto
    GROUP BY
        p.id_produto,
        p.nome,
        p.marca,
        p.preco,
        p.imagem
    ORDER BY total_vendido DESC
";

$resultado = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mais Vendidos</title>

    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

    <div class="container">

        <h1 class="produtos-titulo">
            Produtos Mais Vendidos
        </h1>

        <p class="produtos-subtitulo">
            Confira os produtos mais vendidos da nossa loja
        </p>

        <div class="row row-cols-1 row-cols-md-5 g-3">

            <?php while ($produto = $resultado->fetch(PDO::FETCH_ASSOC)): ?>

                <div class="col text-center">

                    <div class="card card-produto h-100">

                        <img
                            src="imagens/<?= $produto['imagem'] ?>"
                            class="card-img-top imagem-produto"
                            alt="<?= $produto['nome'] ?>"
                        >

                        <div class="card-body">

                            <h5 class="card-title">
                                <?= $produto['nome'] ?>
                            </h5>

                            <p class="marca">
                                <?= $produto['marca'] ?>
                            </p>

                            <p class="preco">
                                R$
                                <?= number_format(
                                    $produto['preco'],
                                    2,
                                    ',',
                                    '.'
                                ) ?>
                            </p>

                            <p class="estoque">
                                <?= $produto['total_vendido'] ?>
                                unidades vendidas
                            </p>

                        </div>

                    </div>

                </div>

            <?php endwhile; ?>

        </div>

    </div>

</body>

</html>