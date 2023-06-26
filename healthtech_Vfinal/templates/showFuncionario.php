<?php
include_once('../config/sessao.php');
include_once('layout/head.php');
include_once("../config/processamentoFuncionarios.php");
?>

<?php
include_once('../config/sessao.php');
include_once("layout/head.php");
include_once("../config/processamentoFuncionarios.php");
?>

<body class="bg-light">
</br></br>

    <div class="container">
        <div id="containerFuncionario">
            <div class="bg-light shadow rounded">
                <div class="col-md-9 py-3 px-4">
                    <div class="form-wrap-funcionario">
                        <div class="bg-light shadow rounded">
                            <div class="row">
                                <div class="col-md-9 py-1 px-4">
                                    <h2>Informações Funcionario</h2>
                                </div>
                                <div class="col-md-2 text-end">
                                    <div class="link-wrapper">
                                        <a href="tableFuncionario.php" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">voltar</a>
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
                                <label for="nome">Nome</label>
                                <p><span><?= $onlyfuncionarios['nome'] ?></span></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <p><span><?= $onlyfuncionarios['data_nascimento'] ?></span></p>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="cep">CEP:</label>
                                    <p><span><?= $onlyfuncionarios['cep'] ?></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="endereco">Endereço:</label>
                                <p><span><?= $onlyfuncionarios['endereco'] ?></span></p>
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
                                    <p><span><?= $onlyfuncionarios['email'] ?></span></p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <p><span><?= $onlyfuncionarios['telefone'] ?></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="cpf">CPF</label>
                                    <p><span><?= $onlyfuncionarios['cpf'] ?></span></p>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <p><span>
                                            <?php
                                            if ($onlyfuncionarios["cargo"] == 1) {
                                                echo "Gerente";
                                            } elseif ($onlyfuncionarios["cargo"] == 2) {
                                                echo "Instrutor";
                                            } elseif ($onlyfuncionarios["cargo"] == 3) {
                                                echo "Colaborador";
                                            } else {
                                                echo "Cargo Desconhecido";
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="admissao">Data de Admissão</label>
                                    <p><span><?= $onlyfuncionarios['admissao'] ?></span></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="demissao"> Data de demissao:</label>
                                    <p>
                                        <span>
                                            <?php if ($onlyfuncionarios["demissao"]) : ?>
                                                <?= $onlyfuncionarios["demissao"] ?>
                                            <?php else : ?>
                                                Essa pessoa ainda está contratada
                                            <?php endif; ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modalidade">Modalidade</label>
                                    <p><span><?= $onlyfuncionarios['modalidade'] ?></span></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="salario">Salário:</label>
                                    <p><span><?= $onlyfuncionarios['salario'] ?></span></p>
                                </div>
                            </div>
                        </div>

                        <br>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once("layout/footer.php");
    ?>