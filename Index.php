<!DOCTYPE html>
<html>
<head>
  <title>Sistema de Faculdade</title>
</head>
<body>
  <h1>Sistema de Faculdade</h1>

  <form action="cadastro.php" method="POST">
    <h2>Cadastro de Aluno</h2>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>

    <label for="matricula">Matrícula:</label>
    <input type="text" name="matricula" required><br>

    <label for="semestre">Semestre:</label>
    <input type="text" name="semestre" required><br>

    <label for="turma">Turma:</label>
    <select name="turma" required>
      <option value="TI">TI</option>
      <option value="ADS">ADS</option>
      <option value="Engenharia">Engenharia</option>
      <option value="Estatística">Estatística</option>
    </select><br>

    <input type="submit" value="Cadastrar">
  </form>
</body>
</html>

