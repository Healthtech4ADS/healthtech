<?php
include_once('../config/sessao.php');
include_once("layout/head.php");
include_once("../config/processamentoFuncionarios.php");
?>

<body class="bg-light">
   </br></br></br>

   <div class="container">
      <div id="containerFuncionario">
         <div class="bg-light shadow rounded">
            <div class="col-md-9 py-3 px-4">
               <div class="form-wrap-funcionario">
                  <div class="bg-light shadow rounded">
                     <div class="row">
                        <div class="col-md-9 py-1 px-4">
                           <h2>Editar Funcionario</h2>
                        </div>
                        <div class="col-md-2 text-end">
                           <div class="link-wrapper">
                              <a href="tableFuncionario.php" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">voltar</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>

                  <form id="create-form" action="<?= $BASE_URL ?>/../config/processamentoFuncionarios.php" method="POST">
                     <input type="hidden" name="type" value="edit">
                     <input type="hidden" name="id" value="<?= $onlyfuncionarios['id'] ?>">


                     <label for="infoP">
                        <h5>Informações Pessoais</h5>
                     </label>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="nome">Nome</label>
                           <input type="text" id="nome" name="nome" placeholder="Digite o nome" value="<?= $onlyfuncionarios['nome'] ?>" class="form-control">
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-5">
                           <div class="form-group">
                              <label for="data_nascimento">Data de Nascimento</label>
                              <input type="text" id="data_nascimento" name="data_nascimento" placeholder="dd/mm/aaaa" onkeyup="adicionarBarraData(this)" maxlength="10" value="<?= $onlyfuncionarios['data_nascimento'] ?>" class="form-control">
                           </div>
                        </div>

                        <div class="col-md-7">
                           <div class="form-group">
                              <label for="cep">CEP:</label>
                              <input type="text" id="cep" name="cep" placeholder="12345-678" onkeyup="adicionarTracoCEP(this)" maxlength="9" value="<?= $onlyfuncionarios['cep'] ?>" class="form-control">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="endereco">Endereço:</label>
                           <input type="text" id="endereco" name="endereco" placeholder="Digite o endereço" value="<?= $onlyfuncionarios['endereco'] ?>" class="form-control">
                        </div>
                     </div>

                     <hr class="my-4">

                     <label for="infoT">
                        <h4>Informações para Contrato</h4>
                     </label>

                     <div class="row">
                        <div class="col-md-7">
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" id="email" name="email" placeholder="Digite o seu email" value="<?= $onlyfuncionarios['email'] ?>" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-5">
                           <div class="form-group">
                              <label for="telefone">Telefone</label>
                              <input type="text" id="telefone" name="telefone" placeholder="(01) 12345-6789" onkeyup="adicionarParentesesTelefone(this)" maxlength="15" value="<?= $onlyfuncionarios['telefone'] ?>" class="form-control">
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="senha">Senha:</label>
                              <input type="password" id="senha" name="senha" placeholder="Digite a senha" value="<?= $onlyfuncionarios['senha'] ?>" class="form-control">
                           </div>

                        </div>

                     </div>

                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="cargo">Cargo</label>
                              <select id="dropdown" name="cargo" class="form-control">
                                 <option value="<?= $onlyfuncionarios['cargo'] ?>" selected><?= $onlyfuncionarios['cargo'] ?></option>
                                 <option value="1">Gerente</option>
                                 <option value="2">Instrutor</option>
                                 <option value="3">Colaborador</option>
                              </select>
                           </div>
                        </div>

                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="admissao">Data de Admissão</label>
                              <input type="text" id="admissao" name="admissao" value="<?= $onlyfuncionarios['admissao'] ?>" class="form-control" placeholder="dd/mm/aaaa" onkeyup="adicionarBarraData(this)" maxlength="10">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="demissao"> Data de demissao:</label>
                              <input type="text" id="demissao" name="demissao" value="<?= $onlyfuncionarios['demissao'] ?>" class="form-control" placeholder="dd/mm/aaaa" onkeyup="adicionarBarraData(this)" maxlength="10">
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="modalidade">Modalidade</label>
                              <select id="modalidade" name="modalidade" value="" class="form-control">
                                 <option value="<?= $onlyfuncionarios['modalidade'] ?>" selected><?= $onlyfuncionarios['modalidade'] ?></option>
                                 <option value="yoga">Yoga</option>
                                 <option value="pilates">Pilates</option>
                                 <option value="danca">Dança</option>
                                 <option value="musculacao">Musculação</option>
                                 <option value="corrida">Corrida</option>
                                 <option value="artes marciais">Artes Marciais</option>
                                 <option value="treinamento funcional">Treinamento Funcional</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="salario">Salário:</label>
                              <input type="text" id="salario" name="salario" placeholder="digite o salario" value="<?= $onlyfuncionarios['salario'] ?>" class="form-control">
                           </div>
                        </div>
                     </div>

                     <br>
                     <div class="mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">atualizar</button>
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