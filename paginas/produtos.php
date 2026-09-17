<?php

include(__DIR__ . "/../conexao.php");

$ordenacao = $_GET['ordenacao'] ?? 'nome';
$pesquisa = trim($_GET['pesquisa'] ?? '');


switch ($ordenacao) {

    case 'menor_preco':
        $sql = "SELECT * FROM produtos ORDER BY preco ASC";
        break;

    case 'maior_preco':
        $sql = "SELECT * FROM produtos ORDER BY preco DESC";
        break;

    case 'az':
        $sql = "SELECT * FROM produtos ORDER BY nome ASC";
        break;

    case 'za':
        $sql = "SELECT * FROM produtos ORDER BY nome DESC";
        break;

    default:
        $sql = "SELECT * FROM produtos ORDER BY nome ASC";
}

$resultado = $conexao->query($sql);
$produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);

if ($pesquisa !== '') {

    $produtos = array_filter($produtos, function ($produto) use ($pesquisa) {

        return stripos($produto['nome'], $pesquisa) !== false
            || stripos($produto['marca'], $pesquisa) !== false;

    });

}

?>

<div class="container">

    <h1 class="produtos-titulo">
        Todos os Produtos
    </h1>

    <p class="produtos-subtitulo">
        Encontre os melhores eletrodomésticos
    </p>

    <form action="produtos" method="GET" class="mb-4">
        <div class="input-group">

            <input
                type="text"
                name="pesquisa"
                class="form-control"
                placeholder="Pesquisar produto..."
                value="<?= htmlspecialchars($pesquisa) ?>"
            >
            <button
             type="submit"
                class="btn btn-outline-success">
            
                <i class="bi bi-search"></i>
                Pesquisar
            </button>

        </div> 
    </form>  

    <div class="filtros">

        <span>Ordenar por:</span>

        <a href="produtos?ordenacao=az&pesquisa=<?= urlencode($pesquisa) ?>">
            A - Z
        </a>

        <a href="produtos?ordenacao=za&pesquisa=<?= urlencode($pesquisa) ?>">
            Z - A
        </a>

        <a href="produtos?ordenacao=menor_preco&pesquisa=<?= urlencode($pesquisa) ?>">
            Menor preço
        </a>

        <a href="produtos?ordenacao=maior_preco&pesquisa=<?= urlencode($pesquisa) ?>">
            Maior preço
        </a>

    </div>

    <div class="row g-4">

        <?php foreach ($produtos as $produto): ?>

            <div class="col-12 col-md-6 col-lg-4">

                <div class="card card-produto">

                    <img
                        src="imagens/<?= htmlspecialchars($produto['imagem']) ?>"
                        class="imagem-produto"
                        alt="<?= htmlspecialchars($produto['nome']) ?>"
                    >

                    <div class="card-body">

                        <h2 class="card-title">
                            <?= htmlspecialchars($produto['nome']) ?>
                        </h2>

                        <p class="marca">
                            <?= htmlspecialchars($produto['marca']) ?>
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
                            Estoque:
                            <?= htmlspecialchars($produto['quantidade_estoque']) ?>
                        </p>

                        <div class="d-flex gap-2">

                            <button class="btn btn-comprar flex-fill">
                             Comprar
                            </button>

                            <a
                                href="adicionar-carrinho?id=<?= $produto['id_produto'] ?>"
                                class="btn btn-outline-success flex-fill">
    
                                <i class="bi bi-cart-plus"></i>
                                Adicionar ao carrinho
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>