<?php
include_once('../config/sessao.php');
include_once('layout/head.php');
include_once('../config/processamentoCliente.php');
?>


<body class="bg-light">
   </br>

   <div class="container">
      <div id="containerCliente">
         <div class="bg-light shadow rounded">
            <div class="col-md-9 py-3 px-4">
               <div class="form-wrap-cliente">
                  <div class="bg-light shadow rounded">
                     <div class="row">
                        <div class="col-md-9 py-1 px-4">
                           <h2>Informações Cliente</h2>
                        </div>
                        <div class="col-md-2 text-end">
                           <div class="link-wrapper">
                              <a href="tableCliente.php" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Voltar</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>

                  <label for="infoP">
                     <h5>Informações Pessoais</h5>
                  </label>

                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="nome">nome</label>
                        <p><span><?= $onlyCliente['nome'] ?></span></p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-5">
                        <div class="form-group">
                           <label for="data_nascimento">Data de Nascimento</label>
                           <p><span><?= $onlyCliente['data_nascimento'] ?></span></p>
                        </div>
                     </div>

                     <div class="col-md-7">
                        <div class="form-group">
                           <label for="cep">CEP:</label>
                           <p><span><?= $onlyCliente['cep'] ?></span></p>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <p><span><?= $onlyCliente['endereco'] ?></span></p>
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
                           <p><span><?= $onlyCliente['email'] ?></span></p>
                        </div>
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label for="telefone">Telefone</label>
                           <p><span><?= $onlyCliente['telefone'] ?></span></p>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="senha">CPF:</label>
                           <p><span><?= $onlyCliente['cpf'] ?></span></p>
                        </div>

                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="cpf">CPF</label>
                           <p><span><?= $onlyCliente['plano'] ?></span></p>
                        </div>
                     </div>

                  </div>

                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php
   include_once("layout/footer.php");
   ?>