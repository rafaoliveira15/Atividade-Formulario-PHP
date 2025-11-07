<?php
include 'conexao.php';

// Criar tabela de pilotos da Fórmula 1, se não existir
$sql = "CREATE TABLE IF NOT EXISTS pilotos_f1 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    equipe VARCHAR(255),
    país VARCHAR(255)
)";
$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Cadastro de Pilotos de Fórmula 1</title>
</head>
<body>

<h1>🏎️ Cadastro de Pilotos de Fórmula 1</h1>

<?php
// Exibir formulário
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo '
    <form method="POST">
        Nome do Piloto: <input type="text" name="nome" required><br>
        Equipe: <input type="text" name="equipe" required><br>
        País: <input type="text" name="pais" required><br>
        <input type="submit" value="Adicionar Piloto">
    </form>';
}

// Receber e inserir dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $equipe = $_POST["equipe"];
    $pais = $_POST["pais"];

    if ($nome == "" || $equipe == "" || $pais == "") {
        echo "Preencha todos os campos corretamente.<br>";
    } else {
        $sqlinsert = "INSERT INTO pilotos_f1 (nome, equipe, pais) VALUES ('$nome', '$equipe', '$pais')";
        if ($conn->query($sqlinsert) === TRUE) {
            echo "Piloto inserido com sucesso!<br>";

            // Mostrar o último registro inserido
            $ultimo_id = $conn->insert_id;
            $sqlSelect = "SELECT * FROM pilotos_f1 WHERE id = $ultimo_id";
            $resultado = $conn->query($sqlSelect);
            $piloto = $resultado->fetch_assoc();

            echo "ID: " . $piloto['id'] . 
                 "Nome: " . $piloto['nome'] . 
                 "Equipe: " . $piloto['equipe'] . 
                 " País: " . $piloto['pais'] . "<br>";
        } else {
            echo "Erro ao inserir: " . $conn->error . "<br>";
        }
    }
}

// Listar todos os pilotos
echo "<h3>Pilotos Cadastrados</h3>";
$sqlALL = "SELECT * FROM pilotos_f1";
$result = $conn->query($sqlALL);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Equipe</th>
        <th>País</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["equipe"] . "</td>
                <td>" . $row["pais"] . "</td>
                
                <td>
                 <a href= 'update.php?id=" . $row["id"] . " '>Editar</a>
                 <a href='delete.php?id=" . $row["id"] . " '>Excluir</a>
               </td>

              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum piloto cadastrado.<br>";
}

// 🔤 Mostrar pilotos ordenados por nome
echo "<h3>Pilotos ordenados por nome (A-Z)</h3>";
$sqlOrderNome = "SELECT * FROM pilotos_f1 ORDER BY nome ASC";
$resOrderNome = $conn->query($sqlOrderNome);

if ($resOrderNome->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Equipe</th>
        <th>País</th>
    </tr>";
    while ($row = $resOrderNome->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["equipe"] . "</td>
                <td>" . $row["pais"] . "</td>

                <td>
                 <a href= 'update.php?id=" . $row["id"] . " '>Editar</a>
                 <a href='delete.php?id=" . $row["id"] . " '>Excluir</a>
               </td>
               
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum piloto cadastrado.<br>";
}


// Contar total de pilotos
$sqlCount = "SELECT COUNT(*) AS total FROM pilotos_f1";
$resCount = $conn->query($sqlCount);
$linhaCount = $resCount->fetch_assoc();
echo "<br>Total de pilotos cadastrados: " . $linhaCount['total'] . "<br>";

// Fechar conexão
$conn->close();
?>

</body>
</html>