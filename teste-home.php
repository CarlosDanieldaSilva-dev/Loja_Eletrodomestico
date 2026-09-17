<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include(__DIR__ . "/conexao.php");

echo "<h2>Conexão OK</h2>";

$sql = "SELECT * FROM produtos WHERE destaque = TRUE ORDER BY nome ASC";

echo "<p>Executando consulta...</p>";

$resultado = $conexao->query($sql);

echo "<p>Consulta executada!</p>";

$produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);

echo "<p>Produtos encontrados: " . count($produtos) . "</p>";

echo "<pre>";
print_r($produtos);
echo "</pre>";