<?php
require_once 'Aluno.php';
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase {
  public function testGetNome() {
    $aluno = new Aluno('João', '12345', '2', 'TI');
    $this->assertEquals('João', $aluno->getNome());
  }

  public function testGetMatricula() {
    $aluno = new Aluno('João', '12345', '2', 'TI');
    $this->assertEquals('12345', $aluno->getMatricula());
  }
}
?>

