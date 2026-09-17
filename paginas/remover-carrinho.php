<?php

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$id_produto = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id_produto && isset($_SESSION['carrinho'][$id_produto])) {
    unset($_SESSION['carrinho'][$id_produto]);
}

header("Location: carrinho");
exit;