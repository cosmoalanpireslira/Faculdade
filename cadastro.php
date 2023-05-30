<!DOCTYPE html>
<html>
<head>
  <title>Cadastro de Aluno</title>
</head>
<body>
  <?php
  // Dados do aluno
  $nome = $_POST['nome'];
  $matricula = $_POST['matricula'];
  $semestre = $_POST['semestre'];
  $turma = $_POST['turma'];

  // Conexão com o banco de dados (substitua pelos seus próprios dados)
  $servername = "localhost";
  $username = "seu_usuario";
  $password = "sua_senha";
  $dbname = "nome_do_banco";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
  }

  // Inserir dados do aluno no banco de dados
  $sql = "INSERT INTO alunos (nome, matricula, semestre, turma) VALUES ('$nome', '$matricula', '$semestre', '$turma')";

  if ($conn->query($sql) === TRUE) {
    echo "Aluno cadastrado com sucesso!";
  } else {
    echo "Erro ao cadastrar aluno: " . $conn->error;
  }

  $conn->close();
  ?>
</body>
</html>

