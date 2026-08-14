<?php
require 'classes\Produto.class.php';

$produto = new Produto();
$retorno = $produto->conecta();

if ($retorno){
    echo "<script>
    alert('Conectado ao banco!')
    </script>";
} 
else {
    echo "<script>alert('Banco indisponivel. Tente mais tarde!')</script>";
}

echo "<h1> Teste de conexao com o banco </h1>";