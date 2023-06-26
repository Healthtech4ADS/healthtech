<?php 
session_start();
if (!isset($_SESSION['cargo']) && !isset($_SESSION['plano'])) {
  // Redirecione o usuário para a página de login ou exiba uma mensagem de erro
  header("Location: login.php"); // Substitua "login.php" pela página de login adequada
  exit;
}
?>
