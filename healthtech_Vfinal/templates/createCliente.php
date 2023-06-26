<?php
include_once('../config/sessao.php');
include_once("layout/head.php");
include_once("../config/processamentoCliente.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cadastrar Cliente</title>
   <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
   </br></br>

   <div class="container">
      <div id="containerCliente">
         <div class="bg-light shadow rounded">
            <div class="col-md-9 py-3 px-4">
               <div class="form-wrap-cliente">
                  <div class="bg-light shadow rounded">
                     <div class="row">
                        <div class="col-md-9 py-1 px-4">
                           <h2>Cadastrar Cliente</h2>
                        </div>
                        <div class="col-md-2 text-end">
                           <div class="link-wrapper">
                              <a href="tableCliente.php" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Voltar</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>

                  <form id="create-form" action="<?= $BASE_URL ?>/../config/processamentoCliente.php" enctype="multipart/form-data" method="POST">
                     <input type="hidden" name="type" value="create">

                     <label for="infoP">
                        <h5>Informações Pessoais</h5>
                     </label>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="nome">Nome</label>
                           <input type="text" id="nome" name="nome" placeholder="Digite o nome" value="" class="form-control">
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-5">
                           <div class="form-group">
                              <label for="data_nascimento">Data de Nascimento</label>
                              <input type="text" id="data_nascimento" name="data_nascimento" placeholder="dd/mm/aaaa" value="" class="form-control" onkeyup="adicionarBarraData(this)" maxlength="10">
                           </div>
                        </div>

                        <div class="col-md-7">
                           <div class="form-group">
                              <label for="cep">CEP:</label>
                              <input type="text" id="cep" name="cep" placeholder="12345-678" value="" class="form-control" onkeyup="adicionarTracoCEP(this)" maxlength="9">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="endereco">Endereço:</label>
                           <input type="text" id="endereco" name="endereco" placeholder="Digite o endereço" value="" class="form-control">
                        </div>
                     </div>

                     <hr class="my-4">

                     <label for="infoT">
                        <h4>Informações para Cadastro</h4>
                     </label>

                     <div class="row">
                        <div class="col-md-7">
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" id="email" name="email" placeholder="Digite o seu email" value="" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-5">
                           <div class="form-group">
                              <label for="telefone">Telefone</label>
                              <input type="text" id="telefone" name="telefone" placeholder="(01) 12345-6789" value="" class="form-control" onkeyup="adicionarParentesesTelefone(this)" maxlength="15">
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="senha">Senha:</label>
                              <input type="password" id="senha" name="senha" placeholder="Digite a senha" value="" class="form-control">
                           </div>

                        </div>

                        <div class="col-md-5">
                           <div class="form-group">
                              <label for="cpf">CPF</label>
                              <input type="text" id="cpf" name="cpf" placeholder="123.456.789-10" value="" class="form-control" onkeyup="adicionarPontoCPF(this)" maxlength="14">
                           </div>
                        </div>

                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="plano">Plano</label>
                              <select id="dropdown" name="plano" class="form-control">
                                 <option value="" selected>selecione</option>
                                 <option value="pacote basico">Pacote Básico</option>
                                 <option value="pacote premium">Pacote Premium</option>
                                 <option value="pacote gold">Pacote Gold</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                     </div>

                  </form>
               </div>
            </div>
         </div>
      </div>


      <?php
      include_once("layout/footer.php");
      ?>