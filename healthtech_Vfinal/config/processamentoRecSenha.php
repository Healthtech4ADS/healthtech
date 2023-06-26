<?php
include_once("conexao.php");

function gerarNovaSenha() {
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $novaSenha = '';

    for ($i = 0; $i < 8; $i++) {
        $index = rand(0, strlen($caracteres) - 1);
        $novaSenha .= $caracteres[$index];
    }

    return $novaSenha;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se a requisição é do tipo POST, ou seja, se o formulário foi submetido

    if (isset($_POST["email"]) && isset($_POST["token"])) {
        $email = $_POST["email"];
        $token = $_POST["token"];

        // Verifica se o email está correto na tabela "tb_funcionarios"
        $stmt_email = $conn->prepare("SELECT * FROM tb_funcionario WHERE email = :email");
        $stmt_email->bindParam(':email', $email);
        $stmt_email->execute();

        if ($stmt_email->rowCount() > 0) {
            // Se o email estiver correto

            // Verifica se o token está correto na tabela "token"
            $stmt_token = $conn->prepare("SELECT * FROM token WHERE token = :token");
            $stmt_token->bindParam(':token', $token);
            $stmt_token->execute();

            if ($stmt_token->rowCount() > 0) {
                // Se o token estiver correto

                // Gera uma nova senha
                $novaSenha = gerarNovaSenha();

                // Atualiza o campo "senha" na tabela "tb_funcionarios" com a nova senha
                $stmt_update_senha = $conn->prepare("UPDATE tb_funcionario SET senha = :senha WHERE email = :email");
                $stmt_update_senha->bindParam(':senha', $novaSenha);
                $stmt_update_senha->bindParam(':email', $email);
                $stmt_update_senha->execute();

                // Redireciona para a página de login com a nova senha escrita no campo de senha
                header("Location: ../templates/login.php?senha=" . $novaSenha);
                exit();
            } else {
                echo "Token incorreto.";
            }
        } else {
            echo "Email incorreto.";
        }
    } else {
        echo "Os campos de email e token são obrigatórios.";
    }
}
?>
