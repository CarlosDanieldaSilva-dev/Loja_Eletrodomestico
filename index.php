<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Eletrodomésticos</title>

    <base href="/">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="short cut icon" href="imagens/iconeprojeto.png">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="imagens/LJE.logo.svg" alt="LJE">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produtos">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="maisvendidos">Mais Vendidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contato">Contato</a>
                    </li>
                </ul>
                <a href="carrinho" class="btn btn-outline-success">
                    <i class="bi bi-cart3"></i>
                    Carrinho
                </a>
            </div>
        </div>
    </nav>

    <main>
        <?php

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if (isset($_GET["param"])) {
            $p = explode("/", $_GET["param"]);
        }

        $page = $p[0] ?? "home";

        $pagina = "paginas/{$page}.php";

        //verificar se o arquivo existe
        if (file_exists($pagina)) {
            include $pagina;
        } else {
            include "paginas/erro.php";
        }
        ?>

    </main>

    <footer class="footer">
        <p class="text-center">
            Desenvolvido por Carlos
        </p>

    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/fslightbox.js"></script>
</body>

</html>