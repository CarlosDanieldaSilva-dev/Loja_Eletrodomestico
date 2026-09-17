<?php

include(__DIR__ . "/../conexao.php");

$sql = "SELECT * FROM produtos WHERE destaque = TRUE ORDER BY nome ASC";

$resultado = $conexao->query($sql);

?>

<div class="container">

    <h1>Produtos em Destaques:</h1>

    <div class="row row-cols-1 row-cols-md-5 g-3">

        <?php while ($produto = $resultado->fetch(PDO::FETCH_ASSOC)): ?>

            <div class="col text-center">

                <div class="card h-100">

                    <img
                        src="/devmoderna/projeto/imagens/<?= $produto['imagem'] ?>"
                        class="card-img-top imagem-produto"
                        alt="<?= $produto['nome'] ?>"
                    >

                    <div class="card-body">

                        <h5 class="card-title">
                            <?= $produto['nome'] ?>
                        </h5>

                        <p class="card-text">
                            R$
                            <?= number_format(
                                $produto['preco'],
                                2,
                                ',',
                                '.'
                            ) ?>
                        </p>

                    </div>

                </div>

            </div>

        <?php endwhile; ?>

    </div>

</div>