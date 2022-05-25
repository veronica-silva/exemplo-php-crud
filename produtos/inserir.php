<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserir</title>
</head>
<body>
    <div class="container">
        <h1>Produtos | Inserir</h1>
        <hr>
        <p><a href="../produtos/listar.php">Voltar para a lista de produtos</a></p>
        <form action="" method="post">
        <div class="little-form-container">
        <p>
        <label for="nome"> Inserir Produto</label>
        <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto" required>
        </p>
        <label for="fabricante">Fabricante</label>
        <select name="fabricante" id="fabricante" required>
            <option value="">Selecione o Fabricante</option>
            <?php 
            require_once "../fabricantes/listar.php";
            foreach($listaDeFabricantes as $fabricante){ 
                      
            ?>
            <option value="<?= $fabricante['id']?>"> <?= $fabricante['nome']?></option>
            
            <?php  
            }
            ?>
            </select>
        <p>
        <label for="preco"> Preço</label>
        <input type="number" name="preco" id="preço" max="10000" step="0.01" required>
        </p>
        <label for="quantidade"> Quantidade</label>
        <input type="number" name="preco" id="preço" max="100" required>
        </p>
        <label for=""> Descrição </label>
        <textarea name="descricao" id="descricao" cols="28" rows="5" required></textarea>
        </p>
        <button type="submit" name="inserir">
            Inserir
        </button>
        </div>
    </div>
</body>
</html>

<?php

?>