<?php
include_once("conecta.php");

$data = $_POST;

//verifica se o post não está o vazio
if (!empty($data)) {
    if ($data["type"] === "login") {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass_md5 = md5($pass);

        $query = "SELECT * FROM tb_cliente WHERE usuario = '$user' AND senha = '$pass_md5'";
        $resultado = $conexao->query($query);

        //verifica se a consulta retornou registros
        if ($resultado->num_rows == 1) {
            echo "matrícula e senha corretos!";
        } else {
            echo "senha ou matrícula incorretos!  ";
        }
    } else if ($data["type"] === "redefinir") {

        $cpf = $_POST['cpf'];
        $new_pass = $_POST['password'];
        $new_passmd5 = md5($new_pass);
        $confirm_pass = $_POST['confirm_password'];
        $confirm_passmd5 = md5($confirm_pass);

        //verifica se as senhas passadas são iguais
        if ($new_passmd5 === $confirm_passmd5) {

            $query = "SELECT * FROM tb_cliente WHERE cpf = '$cpf'";
            $resultado = $conexao->query($query);

            //verifica se existe um CPF igual o passado pelo usuário
            if (mysqli_num_rows($resultado) === 1) {
                $query = "UPDATE tb_cliente SET senha = '$new_passmd5' WHERE $cpf = cpf";
                mysqli_query($conexao, $query);
                header('location: ../healthtechloginb.php');
            } else {
                echo "CPF não cadastrado";
            }
        } else {
            echo "As senhas não coincidem";
        }

    }
}

?>