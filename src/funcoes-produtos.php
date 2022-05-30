<?php
require_once "../src/conecta.php";

function lerProdutos(PDO $conexao):array{
    $sql = "SELECT produtos.id AS idproduto, produtos.nome AS produto, produtos.preco, produtos.quantidade, produtos.descricao, fabricantes.id, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id ORDER BY produto";

    try {
        setlocale(LC_ALL, 'pt_BR');
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}




function dump($dados){
    echo "<pre>";
    var_dump($dados);
    echo "<pre>";
}

function inserirProduto(PDO  $conexao, string $nome, float $preco, int $quantidade, string $descricao, int $fabricante_id):void{
    $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id) VALUES(:nome, :preco, :quantidade, :descricao, :fabricante_id)";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':preco', $preco, PDO::PARAM_STR);
        $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $consulta->bindParam(':fabricante_id', $fabricante_id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }

}

function lerUmProduto(PDO $conexao, int $id):array{
    $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id FROM produtos WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        //$resultado = $consulta->fetch(PDO::FETCH_ASSOC); 
        $resultado1 = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    } 
    return $resultado1;
}

function atualizarProduto(PDO  $conexao, int $id, string $nome, float $preco, int $quantidade, string $descricao, int $fabricante_id):void{
    $sql = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao, fabricante_id = :fabricante_id WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':preco', $preco, PDO::PARAM_STR);
        $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $consulta->bindParam(':fabricante_id', $fabricante_id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }
}
