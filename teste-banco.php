<?php error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . "/conexao.php");
echo "Conexão realizada com sucesso!<br>";
$resultado = $conexao->query("SELECT COUNT(*) FROM produtos");
$total = $resultado->fetchColumn();
echo "Produtos encontrados: " . $total;
