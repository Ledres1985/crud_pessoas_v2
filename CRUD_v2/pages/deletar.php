<div><h3>Deletar<h3></div>
<hr>

<?php
include('./pages/conexao.php');
$id = intval($_GET['id']);
$lin = [];

if(isset($_POST['deletar'])){
    
    $deletar = "DELETE FROM pessoas WHERE id = '$id'";

    $exec = $conn->query($deletar);
    if($exec){
        echo "<script>alert('registro deletado com sucesso')</script>";
        die(header("location: index.php"));
    }
    // die(header("location: index.php"));
}


$sql = "SELECT * FROM pessoas WHERE id = '$id'";
$exec = $conn->query($sql) or $conn->connect_error;
$lin = $exec->fetch_assoc();

?>

<div>
    <h4>Deseja realmente deletar este registro</h4>
    <?php
        echo 'Nome: '.$lin['nome']."<br>";
        echo 'Email: '.$lin['email'];
    ?>

    <form action="" method="post">
        <button class="btn btn-danger" style="margin: 20px 10px;"><a style="text-decoration: none; color:white;" href="index.php">Não</a></button>
        <input class="btn btn-success" style="margin: 20px 10px;" name="deletar" type="submit" value="Sim" onclick="alert('Dados excluídos com sucesso!!')">
    </form>
    
</div>
