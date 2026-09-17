<?php

include(__DIR__ . "/../conexao.php");

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$id_produto = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id_produto) {
    header("Location: produtos");
    exit;
}

$sql = "SELECT * FROM produtos WHERE id_produto = :id_produto";

$stmt = $conexao->prepare($sql);

$stmt->execute([
    ':id_produto' => $id_produto
]);

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    header("Location: produtos");
    exit;
}

if ($produto['quantidade_estoque'] <= 0) {
    header("Location: produtos");
    exit;
}

if (isset($_SESSION['carrinho'][$id_produto])) {

    if (
        $_SESSION['carrinho'][$id_produto]['quantidade']
        < $produto['quantidade_estoque']
    ) {
        $_SESSION['carrinho'][$id_produto]['quantidade']++;
    }

} else {

    $_SESSION['carrinho'][$id_produto] = [
        'id_produto' => $produto['id_produto'],
        'nome' => $produto['nome'],
        'marca' => $produto['marca'],
        'preco' => $produto['preco'],
        'imagem' => $produto['imagem'],
        'quantidade' => 1
    ];
}

header("Location: produtos");
exit;