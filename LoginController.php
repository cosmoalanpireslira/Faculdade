<?php
use PHPUnit\Framework\TestCase;

class LoginControllerTest extends TestCase
{
    public function testLoginComCredenciaisCorretas()
    {
        $controller = new LoginController();

        // Configura as credenciais corretas no $_POST
        $_POST['matricula'] = "123456";
        $_POST['senha'] = "senha123";

        // Captura a saída do processamento do login
        ob_start();
        $controller->processLogin();
        $output = ob_get_clean();

        // Verifica se a saída contém a string "Informações do Aluno"
        $this->assertStringContainsString("Informações do Aluno", $output);
    }

    public function testLoginComCredenciaisIncorretas()
    {
        $controller = new LoginController();

        // Configura as credenciais incorretas no $_POST
        $_POST['matricula'] = "123456";
        $_POST['senha'] = "senha456";

        // Captura a saída do processamento do login
        ob_start();
        $controller->processLogin();
        $output = ob_get_clean();

        // Verifica se a saída contém a string "Falha no login!"
        $this->assertStringContainsString("Falha no login!", $output);
    }
}
