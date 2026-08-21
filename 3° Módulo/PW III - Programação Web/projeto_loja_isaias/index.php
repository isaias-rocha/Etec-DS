<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Formulario de Cadastro de Produtos</title>
</head>
<body>

    <header>
        <nav class="navbar">
  <div class="nav-logo">
    <a href="#">MeuSite</a>
  </div>
  
  <ul class="nav-links">
    <li><a href="index.php" class="active">Início</a></li>
    <li><a href="#">Cadastrar</a></li>
    <li><a href="#">Buscar</a></li>
    <li><a href="#">Sobre</a></li>
  </ul>
</nav>
    </header>


    <main>
        <section>
            <a href="produtos.php" calss="sombra" id="verProdutos"> Ver todos os produtos </a>
            <form action="" method = "post" enctype = "multipart/form-data">
                <h1>Envio de Imagens</h1>

                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" class = "sombra">

                <label for="desc">Descrição</label>
                <textarea name= "desc" class = "sombra"></textarea>

                <label for="valor">Valor</label>
                <input type="text" name="valor" class = "sombra">

                <input type="file" name="foto[]" multiple class = "sombra meuInput">
                <input type="submit" id = "botao">
            </form>
        </section>
    </main>


    <footer>

    </footer>
    
</body>
</html>

<?php
if(isset($_POST['nome']))   {
    $nome       = addsLashes(   $_POST['nome']    );
    $valor      = addsLashes(   $_POST['valor']   );
    $descricao  = addsLashes(   $_POST['desc']    );
    $nome_arquivo = '';


    #cria o vetor para guardar o nome das fotos se o usuario enviar
    $fotos = array();
    
    #checa se foi enviada alguma foto
    if (isset($_FILES['foto'])  ) {
        $tipo = '';
        for ($i = 0;  $i < count($_FILES['foto']['name']) ;$i++) {
            if($_FILES['foto']['type'][$i] == 'image/jpeg'){
                $tipo = ".jpg";
            }else if($_FILES['foto']['type'][$i] == 'image/png'){
                $tipo = ".png";
            }else {
                $tipo = "outro";
            }

            # se o arquivo nao for JPG ou PNG, dispara a mensagem
            if( $tipo == "outro") {
                    echo "<script>alert('Só é possível enviar arquivos JPG e PNG')</script>";
            }else{
                $nome_arquivo = $_FILES['foto']['name'][$i].rand(1,999).$tipo;
                move_uploaded_file($_FILES['foto']['name'][$i], 'imagens/'.$nome_arquivo);
            }

            array_push($fotos, $nome_arquivo);

        }
    }
}