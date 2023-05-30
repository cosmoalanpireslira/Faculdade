<?php
require_once 'Turma.php';
use PHPUnit\Framework\TestCase;

class TurmaTest extends TestCase {
  public function testGetNome() {
    $turma = new Turma('TI');
    $this->assertEquals('TI', $turma->getNome());
  }
}
?>

