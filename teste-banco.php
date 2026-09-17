<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include(__DIR__ . "/conexao.php");

echo "Conexão OK<br>";

$resultado = $conexao->query("SELECT * FROM produtos LIMIT 1");

echo "SELECT executado!<br>";

$produto = $resultado->fetch(PDO::FETCH_ASSOC);

echo "Produto encontrado:<br>";

echo "<pre>";
print_r($produto);
echo "</pre>";