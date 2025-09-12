<?php
include_once 'backend/Database/Database.php';
include_once 'backend/model/contato.php';

$resultado = listarContatos($db);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <main>
        <h1 class="text-center">Lista de Contatos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>mensagem</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultado as $contato): ?>
                    <tr>   <!-- sanitizar os dados -->
                        <td><?php echo htmlspecialchars($contato['nome_contato']); ?></td>
                        <td><?php echo htmlspecialchars($contato['email_contato']); ?></td>
                        <td><?php echo htmlspecialchars($contato['telefone_contato']); ?></td>
                        <td><?php echo htmlspecialchars($contato['mensagem_contato']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

