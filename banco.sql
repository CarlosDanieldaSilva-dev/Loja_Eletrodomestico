-- TABELA: CLIENTES

CREATE TABLE clientes (
    id_cliente SERIAL PRIMARY KEY,
    nome TEXT NOT NULL,
    cpf TEXT,
    telefone TEXT
);

-- TABELA: PRODUTOS

CREATE TABLE produtos (
    id_produto SERIAL PRIMARY KEY,
    nome TEXT NOT NULL,
    marca TEXT,
    preco NUMERIC(10,2) NOT NULL,
    quantidade_estoque INTEGER NOT NULL DEFAULT 0,
    imagem TEXT,
    destaque BOOLEAN DEFAULT FALSE
);

-- TABELA: VENDAS

CREATE TABLE vendas (
    id_venda SERIAL PRIMARY KEY,
    id_cliente INTEGER NOT NULL,
    data_venda DATE NOT NULL DEFAULT CURRENT_DATE,

    CONSTRAINT fk_venda_cliente
        FOREIGN KEY (id_cliente)
        REFERENCES clientes(id_cliente)
);

-- TABELA: ITENS VENDIDOS

CREATE TABLE itens_vendidos (
    id_item SERIAL PRIMARY KEY,
    id_venda INTEGER NOT NULL,
    id_produto INTEGER NOT NULL,
    quantidade INTEGER NOT NULL,

    CONSTRAINT fk_item_venda
        FOREIGN KEY (id_venda)
        REFERENCES vendas(id_venda),

    CONSTRAINT fk_item_produto
        FOREIGN KEY (id_produto)
        REFERENCES produtos(id_produto)
);

-- RELACIONAMENTOS

-- clientes 1:N vendas

-- vendas 1:N itens_vendidos

-- produtos 1:N itens_vendidos

-- vendas N:N produtos
-- através da tabela itens_vendidos