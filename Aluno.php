class Aluno {
  private $nome;
  private $matricula;
  private $semestre;
  private $turma;

  public function __construct($nome, $matricula, $semestre, $turma) {
    $this->nome = $nome;
    $this->matricula = $matricula;
    $this->semestre = $semestre;
    $this->turma = $turma;
  }

  public function getNome() {
    return $this->nome;
  }

  public function getMatricula() {
    return $this->matricula;
  }

  public function getSemestre() {
    return $this->semestre;
  }

  public function getTurma() {
    return $this->turma;
  }
}

