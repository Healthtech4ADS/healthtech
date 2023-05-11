<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "healthtech";

// Cria a conexão com o banco de dados
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>