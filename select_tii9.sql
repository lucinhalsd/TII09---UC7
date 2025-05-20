
select * from clientes;
select * from produtos;

--Nesta query chamo os atributos da tabela específica
select nome, email from clientes;

--Nesta query posso multiplicar os valores da coluna com um número(12), o AS ajudar o organizar a forma como visualizar os dados da minha consulta

select produto, preço_unidade, preço_unidade * 12 from produtos;
select produto, preço_unidade, preço_unidade * 12 as duzia from produtos;

-- Order BY é uma cláusula opcional de instruçao, permitindo ordenar as linhas devolvidas
--pela instrução SELECT. Em ordem ascendente ou descendente.
select produto from produtos ORDER BY produto ASC;
select nome, email, cidade from clientes ORDER BY nome ASC;
select nome, email, cidade from clientes ORDER BY cidade ASC;
select nome, email, cidade from clientes ORDER BY cidade , nome;

-- Nesta consulta vamos buscar a encomenda mais recente.
select * from encomendas ORDER BY data_hora desc;

-- Nesta consulta vamos buscar os 10 primeiros clientes
select id, nome, email From clientes limit 10;

-- Nesta consulta vamos buscar os 10 ultimos clientes
select id, nome, email from clientes  ORDER BY id desc limit 10;

--
select id, nome, email from clientes  limit 3  offset 10;
select id, nome, email from clientes  limit 10, 3;
select * from produtos ORDER BY preco_unidade desc limit 1;

-- Where é uma condiçao de busca filtrada.
select * from clientes WHERE cidade = "Lisboa";

-- Nesta vamos buscar todos os clientes do sexo masculino
select * from clientes WHERE sexo = "m";

-- Usando os operdores lógicos
select * from clientes WHERE cidade = "Lisboa" AND sexo = "m";

SELECT * FROM produtos WHERE preco_unidade <= 1;

-- Intervalo de preço
SELECT * FROM produtos WHERE preco_unidade <= 1 And preco_unidade <= 2;

-- Nesta vamos buscar todos que morem em Lisboa ou que sejam do sexo masculino.
SELECT nome, email, cidade FROM clientes  WHERE cidade = "Lisboa" OR sexo = "m";