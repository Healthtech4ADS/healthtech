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
        if ($data["type"] === "remover") {
            try {
                $idUpdate = $data["id"];
    
                $query = "UPDATE tb_funcionario SET cargo = 3 WHERE id = :idUpdate";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":idUpdate", $idUpdate);
                $stmt->execute();
            } catch (PDOException $e) {
                $erro = $e->getMessage();
                echo $erro;
            }
            header("Location:" . $BASE_URL . "/../templates/tableAdmin.php");
        } elseif ($data["type"] === "adicionar") {
            try {
                $idUpdate = $data["id"];
    
                $query = "UPDATE tb_funcionario SET cargo = 1 WHERE id = :idUpdate";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":idUpdate", $idUpdate);
                $stmt->execute();
            } catch (PDOException $e) {
                $erro = $e->getMessage();
                echo $erro;
            }
            header("Location:" . $BASE_URL . "/../templates/tableAdmin.php");
        }

}//end post
