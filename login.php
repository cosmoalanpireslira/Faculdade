<?php

class Aluno {
    private $matricula;
    private $senha;
    private $curso;
    private $semestre;
    private $disciplinas;
    private $notas;

    public function __construct($matricula, $senha, $curso, $semestre, $disciplinas, $notas) {
        $this->matricula = $matricula;
        $this->senha = $senha;
        $this->curso = $curso;
        $this->semestre = $semestre;
        $this->disciplinas = $disciplinas;
        $this->notas = $notas;
    }

    public function fazerLogin($matricula, $senha) {
        if ($matricula == $this->matricula && $senha == $this->senha) {
            return true;
        } else {
            return false;
        }
    }

    public function getCurso() {
        return $this->curso;
    }

    public function getSemestre() {
        return $this->semestre;
    }

    public function getDisciplinas() {
        return $this->disciplinas;
    }

    public function getNotas() {
        return $this->notas;
    }
}

// Configurações do banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "nome_do_banco";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se as credenciais de login estão corretas
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    try {
        // Conexão com o banco de dados utilizando PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Prepara a consulta SQL para buscar as informações do aluno
        $stmt = $conn->prepare("SELECT matricula, senha, curso, semestre, disciplinas, notas FROM alunos WHERE matricula = :matricula");
        $stmt->bindParam(':matricula', $matricula);
        $stmt->execute();

        // Obtém o resultado da consulta
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $aluno = new Aluno($result['matricula'], $result['senha'], $result['curso'], $result['semestre'], explode(",", $result['disciplinas']), explode(",", $result['notas']));

            if ($aluno->fazerLogin($matricula, $senha)) {
                $curso = $aluno->getCurso();
                $semestre = $aluno->getSemestre();
                $disciplinas = $aluno->getDisciplinas();
                $notas = $aluno->getNotas();
            } else {
                echo "Falha no login!<br>";
            }
        } else {
            echo "Aluno não encontrado!<br>";
        }
    } catch(PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Faculdade</title>
    <script>
        function exibirInformacoesAluno(curso, semestre, disciplinas, notas) {
            document.getElementById("curso").innerHTML = curso;
            document.getElementById("semestre").innerHTML = semestre;
            document.getElementById("disciplinas").innerHTML = "";
            for (var i = 0; i < disciplinas.length; i++) {
                var listItem = document.createElement("li");
                listItem.textContent = disciplinas[i];
                document.getElementById("disciplinas").appendChild(listItem);
            }
            document.getElementById("notas").innerHTML = "";
            for (var i = 0; i < notas.length; i++) {
                var listItem = document.createElement("li");
                listItem.textContent = notas[i];
                document.getElementById("notas").appendChild(listItem);
            }
        }
        <?php
        if (isset($curso) && isset($semestre) && isset($disciplinas) && isset($notas)) {
            echo "window.onload = function() { exibirInformacoesAluno('$curso', '$semestre', " . json_encode($disciplinas) . ", " . json_encode($notas) . "); }";
        }
        ?>
    </script>
</head>
<body>
    <h1>Login do Aluno</h1>
    <form method="POST" action="login.php">
        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" id="matricula" required>
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br><br>
        <input type="submit" value="Entrar">
    </form>

    <h2>Informações do Aluno</h2>
    <p>Curso: <span id="curso"></span></p>
    <p>Semestre: <span id="semestre"></span></p>
    <p>Disciplinas:</p>
    <ul id="disciplinas"></ul>
    <p>Notas:</p>
    <ul id="notas"></ul>
</body>
</html>
