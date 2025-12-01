<?php
require_once '../conexao.php';
$mensagem="";
if($_SERVER['REQUEST_METHOD']==='POST'){
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 
    $tipo = $_POST['tipo'];//para a gegurança da senha

    try{
        $sql= "INSERT INTO usuarios(nome,email,senha,tipo)
                VALUES(:nome,:email,:senha,:tipo)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha,
            ':tipo' => $tipo
        ]);
        $mensagem="<p class='sucesso'>Cadastro efetivado</p>";
        header("location:../painel.php");
    }catch(PDOException $e){
        $mensagem = "<p class='erro'>Erro ao Cadastrar.". $e->getMessage()."</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuario</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>
<body>
    <h1>Cadastro Usuario</h1>
    <?=$mensagem;?>
    <form action="" method="post">
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="pasword" name="senha" placeholder="Senha" required><br>
        <select name="tipo" id="tipo">
            <option value="admin">Admin</option>
            <option value="aluno">Aluno</option>
        </select>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>