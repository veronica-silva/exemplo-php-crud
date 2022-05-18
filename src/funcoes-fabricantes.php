<?php
require_once "../src/conecta.php";
// carregar os dados dos fabricantes
function lerFabricantes(PDO $conexao):array{
        //string com comando sql
        $sql = "SELECT id, nome FROM fabricantes";
    try{
            //preparação do comando
            $consulta = $conexao->prepare($sql);
            //execução do comando
            $consulta->execute();   
            //capturar os resultados
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);       
    } catch (Exception $erro){
        die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}
function inserirFabricante(PDO $conexao, string $nome):void{ //:void para a função não retornar
    $sql = "INSERT INTO fabricantes(nome) VALUES (:nome)";
    try {
        $consulta = $conexao->prepare($sql);
        /*bindParam(':nomedoparametro', $variavelcomvalor, constantedeverificacao) */
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}
function lerUmFabricante(PDO $conexao, int $id):array{
    $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC); 
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    } return $resultado;
}
function atualizarFabricante(PDO $conexao, int $id, string $nome):void{
    $sql = "UPDADE fabricantes SET nome = :nome WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}