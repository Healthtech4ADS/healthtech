<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/redefinirSenha.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
		<h2>Redefinir Senha</h2>
		<form action="config/processamento.php" method="POST">
			<input type="hidden" name="type" value="redefinir">
			<label for="text">CPF:</label>
			<input type="cpf" id="cpf" name="cpf" required><br>

			<label for="password">Nova senha:</label>
			<input type="password" id="password" name="password" required><br>

			<label for="confirm_password">Confirmar nova senha:</label>
			<input type="password" id="confirm_password" name="confirm_password" required><br><br>

			<input type="submit" value="Redefinir senha">
		</form>
		<div class="link">
			<a href="healthtechloginb.php">Voltar para a página de login</a>
		</div>
	</div>
</body>
</html>