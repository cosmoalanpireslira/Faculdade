<?php
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    public function testFazerLoginComCredenciaisCorretas()
    {
        // Cria uma instância de Aluno com credenciais corretas
        $aluno = new Aluno("123456", "senha123", "ADS", 4, ["Matemática", "Programação", "Banco de Dados"], [8.5, 9.0, 7.5]);
        // Verifica se o método fazerLogin retorna true para as credenciais corretas
        $this->assertTrue($aluno->fazerLogin("123456", "senha123"));
    }

    public function testFazerLoginComCredenciaisIncorretas()
    {
        // Cria uma instância de Aluno com credenciais corretas
        $aluno = new Aluno("123456", "senha123", "ADS", 4, ["Matemática", "Programação", "Banco de Dados"], [8.5, 9.0, 7.5]);
        // Verifica se o método fazerLogin retorna false para as credenciais incorretas
        $this->assertFalse($aluno->fazerLogin("123456", "senha456"));
    }
}
