<?php
include_once("../config/url.php");
include_once("../config/conexao.php");

$id;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (!empty($id)) {
    $query = "SELECT * FROM tb_cliente WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $onlyCliente = $stmt->fetch(); // retorna apenas a linha referente ao id
    $AllClientes = []; // Inicializa a variável como um array vazio
} else {
    // Lógica de paginação
    $itensPorPagina = 9;
    $queryTotal = "SELECT COUNT(*) AS total FROM tb_cliente";
    $stmtTotal = $conn->prepare($queryTotal);
    $stmtTotal->execute();
    $totalRegistros = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];
    $totalPaginas = ceil($totalRegistros / $itensPorPagina);

    $paginaAtual = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($paginaAtual - 1) * $itensPorPagina;

    $query = "SELECT * FROM tb_cliente LIMIT :offset, :itensPorPagina";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':itensPorPagina', $itensPorPagina, PDO::PARAM_INT);
    $stmt->execute();
    $AllClientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        #var_dump($AllClientes); // Exibe o conteúdo do array
}

$data = $_POST;   // define as variáveis do formulário que usam POST


if (!empty($data)) {
    if ($data["type"] === "create") {
        try {
            $nome = $data["nome"];
            $data_nascimento = $data["data_nascimento"];
            $email = $data["email"];
            $telefone = $data["telefone"];
            $cpf = $data["cpf"];
            $endereco = $data["endereco"];
            $cep = $data["cep"];
            $plano = $data["plano"];
            $senha = $data["senha"];


            $query = "INSERT INTO tb_cliente 
            (nome, data_nascimento, email, telefone, cpf, endereco, cep, plano, senha) 

            VALUES (:nome, :data_nascimento, :email, :telefone, :cpf, :endereco, :cep, :plano, :senha)";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":data_nascimento", $data_nascimento);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":cep", $cep);
            $stmt->bindParam(":plano", $plano);
            $stmt->bindParam(":senha", $senha);

            $stmt->execute();
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo $erro;
        }
        header("Location:" . $BASE_URL . "/../templates/tableCliente.php");

        #header("Location:" . $BASE_URL . "/../config/processamentoCliente.php");
        #var_dump($_POST);

    } else if ($data["type"] === "edit") {
        try {
            $nome = $data["nome"];
            $data_nascimento = $data["data_nascimento"];
            $email = $data["email"];
            $telefone = $data["telefone"];
            $endereco = $data["endereco"];
            $cep = $data["cep"];
            $plano = $data["plano"];
            $senha = $data["senha"];
            $idPost = $data["id"];

            $query = "UPDATE tb_cliente SET
            nome=:nome,
            data_nascimento=:data_nascimento,
            email=:email,
            telefone=:telefone,
            endereco=:endereco,
            cep=:cep,
            plano=:plano,
            senha=:senha
                WHERE id=:idPost";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":data_nascimento", $data_nascimento);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":cep", $cep);
            $stmt->bindParam(":plano", $plano);
            $stmt->bindParam(":senha", $senha);
            $stmt->bindParam(":idPost", $idPost);
            $stmt->execute();
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo $erro;
        }

        header("Location:" . $BASE_URL . "/../templates/tableCliente.php");
    } //end else if adicionar funcionario

    else if ($data["type"] === "delete") {
        try {

            $idDelete = $data["id"];

            $query = "DELETE FROM tb_cliente WHERE id=:idDelete";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":idDelete", $idDelete);
            $stmt->execute();
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo $erro;
        }
        header("Location:" . $BASE_URL . "/../templates/tableCliente.php");
    } //end if delete

}//end post

