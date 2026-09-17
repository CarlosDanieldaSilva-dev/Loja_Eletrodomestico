<?php

function calcularSubtotal($preco, $quantidade)
{
    $preco = (float) $preco;
    $quantidade = (int) $quantidade;

    return $preco * $quantidade;
}


function calcularTotalCarrinho($carrinho)
{
    $total = 0;

    foreach ($carrinho as $item) {

        $total += calcularSubtotal(
            $item['preco'],
            $item['quantidade']
        );
    }

    return $total;
}


if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$carrinho = $_SESSION['carrinho'];

$total = calcularTotalCarrinho($carrinho);

?>

<div class="container py-4">

    <h1 class="produtos-titulo">
        Meu Carrinho
    </h1>

    <?php if (empty($carrinho)): ?>

        <div class="alert alert-info">
            Seu carrinho está vazio.
        </div>

        <a href="produtos" class="btn btn-primary">
            Continuar comprando
        </a>

    <?php else: ?>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($carrinho as $item): ?>

                        <?php
                            $subtotal = calcularSubtotal(
                            $item['preco'],
                            $item['quantidade']
                             );
                        ?>

                        <tr>

                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    <img
                                        src="/imagens/<?= htmlspecialchars($item['imagem']) ?>"
                                        alt="<?= htmlspecialchars($item['nome']) ?>"
                                        style="width: 80px; height: 80px; object-fit: contain;"
                                    >

                                    <div>

                                        <strong>
                                            <?= htmlspecialchars($item['nome']) ?>
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            <?= htmlspecialchars($item['marca']) ?>
                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>
                                R$
                                <?= number_format(
                                    $item['preco'],
                                    2,
                                    ',',
                                    '.'
                                ) ?>
                            </td>

                            <td>

                                <div class="d-flex align-items-center gap-2">

                                    <a
                                     href="alterar-carrinho?id=<?= $item['id_produto'] ?>&acao=diminuir"
                                        class="btn btn-outline-secondary btn-sm">                                   
                                        −
                                    </a>

                                    <span class="fw-bold">
                                        <?= $item['quantidade'] ?>
                                    </span>

                                    <a
                                        href="alterar-carrinho?id=<?= $item['id_produto'] ?>&acao=aumentar"
                                        class="btn btn-outline-secondary btn-sm">
                                        +
                                    </a>

                                </div>

                            </td>

                            <td>

                                <strong>
                                    R$
                                    <?= number_format(
                                        $subtotal,
                                        2,
                                        ',',
                                        '.'
                                    ) ?>
                                </strong>

                            </td>

                            <td>

                                <a
                                    href="remover-carrinho?id=<?= $item['id_produto'] ?>"
                                    class="btn btn-outline-danger btn-sm"
                                >
                                    <i class="bi bi-trash"></i>
                                    Remover
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

        <div class="row justify-content-end">

            <div class="col-12 col-md-5">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">
                            Resumo do pedido
                        </h4>

                        <hr>

                        <div class="d-flex justify-content-between">

                            <span>
                                Total:
                            </span>

                            <strong>
                                R$
                                <?= number_format(
                                    $total,
                                    2,
                                    ',',
                                    '.'
                                ) ?>
                            </strong>

                        </div>

                        <div class="d-grid gap-2 mt-4">

                            <a
                                href="produtos"
                                class="btn btn-outline-secondary"
                            >
                                Continuar comprando
                            </a>

                            <button class="btn btn-success">
                                Finalizar compra
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>

</div>