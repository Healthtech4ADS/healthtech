<?php
include_once("../config/url.php");
include_once("../config/conexao.php");


$id;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (!empty($id)) {
    $query = "SELECT * FROM tb_funcionario WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $onlyfuncionarios = $stmt->fetch(); // retorna apenas a linha referente ao id
    $Allfuncionarios = []; // Inicializa a variável como um array vazio
} else {
    // Lógica de paginação
    $itensPorPagina = 9;
    $queryTotal = "SELECT COUNT(*) AS total FROM tb_funcionario";
    $stmtTotal = $conn->prepare($queryTotal);
    $stmtTotal->execute();
    $totalRegistros = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];
    $totalPaginas = ceil($totalRegistros / $itensPorPagina);

    $paginaAtual = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($paginaAtual - 1) * $itensPorPagina;

    $query = "SELECT * FROM tb_funcionario LIMIT :offset, :itensPorPagina";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':itensPorPagina', $itensPorPagina, PDO::PARAM_INT);
    $stmt->execute();
    $Allfuncionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            $admissao = $data["admissao"];
            $cargo = $data["cargo"];
            $modalidade = $data["modalidade"];
            $salario = $data["salario"];
            $senha = $data["senha"];


            $query = "INSERT INTO tb_funcionario 
            (nome, data_nascimento, email, telefone, cpf, endereco, cep, admissao, cargo, modalidade, 
            salario, senha) 

            VALUES (:nome, :data_nascimento, :email, :telefone, :cpf, :endereco, :cep, :admissao, 
            :cargo, :modalidade, :salario, :senha)";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":data_nascimento", $data_nascimento);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":cep", $cep);
            $stmt->bindParam(":admissao", $admissao);
            $stmt->bindParam(":cargo", $cargo);
            $stmt->bindParam(":modalidade", $modalidade);
            $stmt->bindParam(":salario", $salario);
            $stmt->bindParam(":senha", $senha);

            $stmt->execute();
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo $erro;
        }
        header("Location:" . $BASE_URL . "/../templates/tableFuncionario.php");

    } else if ($data["type"] === "edit") {
        try {
            $nome = $data["nome"];
            $data_nascimento = $data["data_nascimento"];
            $email = $data["email"];
            $telefone = $data["telefone"];
            $endereco = $data["endereco"];
            $cep = $data["cep"];
            $admissao = $data["admissao"];
            $cargo = $data["cargo"];
            $modalidade = $data["modalidade"];
            $salario = $data["salario"];
            $demissao = $data["demissao"];
            $senha = $data["senha"];
            #$id_admin = $data["id_admin"];
            $idPost = $data["id"];

            $query = "UPDATE tb_funcionario SET
            nome=:nome,
            data_nascimento=:data_nascimento,
            email=:email,
            telefone=:telefone,
            endereco=:endereco,
            cep=:cep,
            admissao=:admissao,
            cargo=:cargo,
            modalidade=:modalidade,
            salario=:salario,
            demissao=:demissao,
            senha=:senha
                WHERE id=:idPost";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":data_nascimento", $data_nascimento);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":cep", $cep);
            $stmt->bindParam(":admissao", $admissao);
            $stmt->bindParam(":cargo", $cargo);
            $stmt->bindParam(":modalidade", $modalidade);
            $stmt->bindParam(":salario", $salario);
            $stmt->bindParam(":demissao", $demissao);
            $stmt->bindParam(":senha", $senha);
            #$stmt->bindParam(":id_admin", $id_admin);
            $stmt->bindParam(":idPost", $idPost);
            $stmt->execute();
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo $erro;
        }

        header("Location:" . $BASE_URL . "/../templates/tableFuncionario.php");
        #var_dump($_POST);
    } //end else if adicionar funcionario

    else if ($data["type"] === "delete") {
        try {

            $idDelete = $data["id"];

            $query = "DELETE FROM tb_funcionario WHERE id=:idDelete";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":idDelete", $idDelete);
            $stmt->execute();
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo $erro;
        }
        header("Location:" . $BASE_URL . "/../templates/tableFuncionario.php");
    } //end if delete

}//end post
