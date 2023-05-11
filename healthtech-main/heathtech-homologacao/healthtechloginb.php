<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Healthtech</title>
    <!--Logos e fontes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!--Logos e fontes -->
    <!--CSS-->
    <link rel="stylesheet" href="css/heathtechcss.css">
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
            <div class="login-form">

                <div class="sign-up-htm">
                    <form action="config/processamento.php" method="post">
                     <input type="hidden" name="type" value="login">   
                    <div class="group">
                        <label for="user" class="label">Matrícula</label>
                        <input id="user" name="user" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Senha</label>
                        <input id="pass" name="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Mantenha-me conectado</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Login">
                    </div>
                    </form>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="redefinirSenha.php">Esqueceu a sua senha?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>