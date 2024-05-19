<div><h3>Editar</h3></div>
<hr>

<?php
    include ('./pages/conexao.php');

    $id = intval($_GET['id']);

    if(isset($id)){
        $sql = "SELECT * FROM pessoas WHERE id = $id";
        $consulta = $conn->query($sql) or "Falha: ".$conn->connect_error;
        $res = $consulta->fetch_assoc();
    }

    if(isset($_POST['atualizar'])){
        $nome=$_POST['nome'];
        $email=$_POST['email'];

        $sql_update = "UPDATE pessoas SET nome = '$nome', email = '$email' WHERE id = $id";
        $exec = $conn->query($sql_update) or "Erro: ".$conn->connect_error;

        $deu_certo = $exec;

        if($deu_certo){
            header("location: index.php");
        }
    }
?>

<div>
    <form method="post" action="">
        <div class="mb-3">
            <label for="nome" class="form-label">nome</label>
            <input class="form-control" type="text" name="nome" id="nome" value="<?=$res['nome']?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input class="form-control" type="text" name="email" id="email" value="<?=$res['email']?>">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" name="atualizar" onclick="alert('Dados atulizados com sucesso!')" value="Alterar">
            <a class="btn btn-secondary" href="index.php">Voltar</a>
        </div>
    </form>
</div>