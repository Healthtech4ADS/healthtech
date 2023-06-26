<?php
include_once("url.php");
include_once("conexao.php");

if (isset($_POST['email']) && isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        // Handle the case where the email was not provided
    } else if (strlen($_POST['senha']) == 0) {
        // Handle the case where the password was not provided
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            $sql = "SELECT * FROM tb_funcionario WHERE email = :email AND senha = :senha";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            $quantidade = $stmt->rowCount();

            if ($quantidade == 1) {
                $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "Quantidade de resultados: " . $quantidade;
                
                // Start the session
                if (!isset($_SESSION)) {
                    session_start();
                }
                
                // Assign the value of the cargo and id to the session
                $_SESSION['cargo'] = $funcionario['cargo'];
                $_SESSION['id'] = $funcionario['id'];
                var_dump($funcionario);

                // Redirect the user
                header("Location: ".$BASE_URL."/../templates/menu.php");
            } else {
                // Check if the user is a member of the "tb_cliente" table
                $sql_cliente = "SELECT * FROM tb_cliente WHERE email = :email AND senha = :senha";
                $stmt_cliente = $conn->prepare($sql_cliente);
                $stmt_cliente->bindParam(':email', $email);
                $stmt_cliente->bindParam(':senha', $senha);
                $stmt_cliente->execute();
                $quantidade_cliente = $stmt_cliente->rowCount();
                
                if ($quantidade_cliente == 1) {
                    $cliente = $stmt_cliente->fetch(PDO::FETCH_ASSOC);
                    echo "Quantidade de resultados: " . $quantidade_cliente;
                                    
                // Start the session
                if (!isset($_SESSION)) {
                    session_start();
                }
                
                    // Assign the value of the plano and id to the session
                    $_SESSION['cargo'] = $cliente['cargo'];
                    $_SESSION['id'] = $cliente['id'];
                    var_dump($cliente);
                
                    // Redirect the user to menu.php
                    header("Location: ".$BASE_URL."/../templates/menu.php");

                } else {
                    echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                    <strong>Falha ao logar! E-mail ou senha incorretos</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                }
            }
        } catch (PDOException $e) {
            echo "Erro na execução do código SQL: " . $e->getMessage();
        }
    }
}
?>
