<?php


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuário</title>
</head>
<body>
    <div class="listar-container">
        <h1>Lista de Usuários</h1>
        <table class="tabela-usuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>TIPO</th>
                    <th>Ações</th>
                
                </thead>
                <tbody>
                    <?php foreach($usuarios as $u)?>
                    <td><?=$u['id']?></td>
                    <td><?=$u['nome']?></td>
                    <td><?=$u['email']?></td>
                    <td><?=ucfirst($u['tipo'])?></td>
                    
                    <td>
                        <a class="btn-editar" href="editar.php?id=<?=$u['id']?>">Editar</a>
                        <a class="btn-excluir" href="excluir.php?id=<?=$u['id']?>"
                        onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                    </td>
                </tbody>
            </tr>
        </table>

    </div>
</body>
</html>