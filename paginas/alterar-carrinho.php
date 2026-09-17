<?php

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$id_produto = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$acao = $_GET['acao'] ?? '';

if (!$id_produto || !isset($_SESSION['carrinho'][$id_produto])) {
    header("Location: carrinho");
    exit;
}

if ($acao === 'aumentar') {

    include(__DIR__ . "/../conexao.php");

    $sql = "SELECT quantidade_estoque FROM produtos WHERE id_produto = :id_produto";

    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        ':id_produto' => $id_produto
    ]);

    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {

        $estoque = (int) $produto['quantidade_estoque'];
        $quantidade_atual = (int) $_SESSION['carrinho'][$id_produto]['quantidade'];

        if ($quantidade_atual < $estoque) {
            $_SESSION['carrinho'][$id_produto]['quantidade']++;
        }
    }

} elseif ($acao === 'diminuir') {

    if ($_SESSION['carrinho'][$id_produto]['quantidade'] > 1) {

        $_SESSION['carrinho'][$id_produto]['quantidade']--;

    } else {

        unset($_SESSION['carrinho'][$id_produto]);
    }
}

header("Location: carrinho");
exit;