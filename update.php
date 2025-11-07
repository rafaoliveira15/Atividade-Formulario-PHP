<?php
include 'conexao.php'; // inclui o arquivo de conexao

if (isset($_GET['id'])) { // verifica se o ID foi passado 
    $id = $_GET['id'];  // recebe o id
    $sql = "SELECT * FROM pilotos_f1 WHERE id=$id"; // consulta o piloto
    $result = $conn->query($sql); // executa a consulta
    $piloto = $result->fetch_assoc(); // obtém os dados do piloto
}

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome']; // recebe o novo nome
    $equipe = $_POST['equipe']; // recebe a nova equipe
    $pais = $_POST['pais']; // recebe o novo país

    $sql = "UPDATE pilotos_f1 SET nome='$nome', equipe='$equipe', pais='$pais' WHERE id=$id"; // prepara a atualização

    if ($conn->query($sql) === TRUE) {
        header ("Location: atividade.php"); // redireciona após atualizar
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Piloto</title>
</head>
<body>
    <h1>Atualizar Piloto</h1>
    <form action="" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $piloto['nome']; ?>" required>
        <br>
        <label>Equipe:</label>
        <input type="text" name="equipe" value="<?php echo $piloto['equipe']; ?>" required>
        <br>
        <label>País:</label>
        <input type="text" name="pais" value="<?php echo $piloto['pais']; ?>" required>
        <br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="atividade.php">Cancelar</a> <!-- Link para voltar -->
</body>
</html>