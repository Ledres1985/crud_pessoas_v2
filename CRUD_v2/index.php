<?php
    include("./pages/conexao.php");
    $erro=false;
    $consulta = "SELECT * FROM pessoas ORDER BY nome";
    $lin = [];


    if(isset($_POST['inserir'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        if(empty($nome))
            $erro = "Preencha o campo nome.";
        if($erro){
            echo $erro;
        }else{
            $sql = "INSERT INTO pessoas (nome, email)VALUES('$nome','$email')";
            $exec = $conn->query($sql);  
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="./recursos/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>crud</title>
</head>
<body>
    <header class="cabecalho">
        <h1>Crud Pessoas</h1>
        <!-- <?php if(isset($_POST['inserir'])){echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Dados inseridos com sucesso!!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";}?>*/ -->
    </header>
    <?php if(isset($_POST['inserir'])){echo "<script>alert('Dados iseridos con sucesso!!')</script>";}?>
    <div class="nav">
        <button class="btn btn-success" onclick="exibir_formulario()">➕ Novo</button>
    </div>
    <main class="principal">
        
        <div class="conteudo">
            <dialog class="table" style="margin-bottom: 200px; width: 40rem;">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="nome" class="form-label">nome</label>
                        <input class="form-control" type="text" name="nome" id="nome">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input class="form-control" type="text" name="email" id="email">
                    </div>
                    <div>
                        <input type="submit" name="inserir" onclick="fechar_formulario()" value="Salvar">
                        <button onclick="fechar_formulario()">Cancelar</button>
                    </div>
                </form>
            </dialog>
            <table class="table table-hover text-center">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                    <?php 
                        $linha = $conn->query($consulta);
                        
                            while($lin = $linha->fetch_assoc()){
                    ?>
           
                    <tr>
                        <td><?=$lin['id']?></td>
                        <td><?=$lin['nome']?></td>
                        <td><?=$lin['email']?></td>
                        <td>
                            <a href="exibir.php?dir=pages&file=editar&id=<?=$lin['id'];?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </a>
                            <a href="exibir.php?dir=pages&file=deletar&id=<?=$lin['id'];?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </main>
    <footer class="rodape">
        <?="by © Emerson Ledres ".Date("Y")?>
    </footer>
</body>
<script src="./recursos/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>