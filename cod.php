<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Solicitações</title>
</head>
<body>
    <h1>Gerenciamento de Solicitações</h1>

    <!-- Cadastro de Clientes -->
    <form action="" method="POST">
        <h2>Cadastrar Cliente</h2>
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="cpf" placeholder="CPF" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <button type="submit" name="cadastrar_cliente">Cadastrar</button>
    </form>

    <!-- Registro de Solicitações -->
    <form action="" method="POST">
        <h2>Registrar Solicitação</h2>
        <input type="number" name="id_cliente" placeholder="ID do Cliente" required>
        <textarea name="descricao" placeholder="Descrição" required></textarea>
        <select name="urgencia" required>
            <option value = 1>Baixa</option>
            <option value = 2>Média</option>
            <option value = 3>Alta</option>
        </select>
        <button type="submit" name="registrar_solicitacao">Registrar</button>
    </form>

    <!-- Lista de Solicitações -->
    <h2>Solicitações</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Descrição</th>
            <th>Urgência</th>
        </tr>
        <?php
        // Conexão com o banco de dados
        $conexao = new mysqli("localhost", "root", "root", "pratica_II");

        // Verifica erros na conexão
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Cadastro de Cliente
        if (isset($_POST['cadastrar_cliente'])) {
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $sql = "INSERT INTO cliente (nome_cliente, cpf_cliente, email_cliente) VALUES ('$nome', '$cpf', '$email')";
            $conexao->query($sql);
        }

        // Registro de Solicitação
        if (isset($_POST['registrar_solicitacao'])) {
            $id_cliente = $_POST['id_cliente'];
            $descricao = $_POST['descricao'];
            $urgencia = $_POST['urgencia'];
            $sql = "INSERT INTO solicitacoes (id_cliente, descricao, id_urgencia) VALUES ('$id_cliente', '$descricao', '$urgencia')";
            $conexao->query($sql);
        }

        // Exibição de Solicitações
        $result = $conexao->query("SELECT id_solicitacoes, id_cliente, descricao, id_urgencia FROM solicitacoes");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id_solicitacoes']}</td>
                    <td>{$row['id_cliente']}</td>
                    <td>{$row['descricao']}</td>
                    <td>{$row['id_urgencia']}</td>
                </tr>";
            }
        }
        ?>
    </table>
</body>
</html>
