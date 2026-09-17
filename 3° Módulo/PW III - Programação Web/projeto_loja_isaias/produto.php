<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produto    .css">
    <title>Produtos</title>
</head>
<body>

 <section>
        <?php 
        require "classe/Produto.class.php";
        $p   = new Produto();
        $con = $p->conecta();
        if(!$con) {
            echo "<script>alert('Erro ao conectar com o banco de dados!');</script>";
            exit();
        }else{
            $dadosProduto = $p->buscarProdutos();
            if(empty($dadosProduto)){
                echo "<script>alert('Não há produtos cadastrados!');</script>";
            }else{
                foreach($dadosProduto as $produto){ 
                    ?>
                    <a href="exibir_produtos.php?id=<?php echo $produto['id_produto']; ?>"><?php echo $produto['nome_produto']; ?>
                        <div>
                            <img src="imagens/<?php echo $produto['foto_capa']; ?>">;
                            <h2>
                                <?php echo $produto['nome_produto']; ?>
                            </h2>
                        </div>
                    </a>
                    <?php
                }
            }
        }
        ?>
    </section>   

</body>
</html>