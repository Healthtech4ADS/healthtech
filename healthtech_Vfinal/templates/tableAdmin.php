<?php
include_once('../config/sessao.php');
include_once("layout/head.php");
include_once("layout/header.php");
include_once("../config/ProcessamentoAdmin.php");
?>

<body class="body-table">
    <div class="total">
        <div class="container" style="margin-top:10px;">
            <div>
                <main class="table">
                    <section>
                        </br>
                        <?php if (!empty($Allfuncionarios) && count($Allfuncionarios) > 0) : ?>
                    </section>
                    <section>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead>
                                    <tr>
                                        <td colspan="5" class="fs-2"><strong>Admins</strong></td>
                                        <td class="text-center">
                                            <?php if ($_SESSION['cargo'] == 1) : ?>
                                                
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col" class="text-center">Adicionar</th>
                                        <th scope="col" class="text-center">Retirar Acesso</th>
                                    </tr>
                                </thead>
                                <?php if ($_SESSION['cargo'] == 1) : ?>
                                <tbody>
                                    <?php foreach ($Allfuncionarios as $funcionario) : ?>
                                        <tr>
                                            <td><?= $funcionario["nome"] ?></td>
                                            <td><?= $funcionario["email"] ?></td>
                                            <td><?php
                                                if ($funcionario["cargo"] == 1) {
                                                    echo "Gerente";
                                                } elseif ($funcionario["cargo"] == 2) {
                                                    echo "Instrutor";
                                                } elseif ($funcionario["cargo"] == 3) {
                                                    echo "Colaborador";
                                                } else {
                                                    echo "Cargo Desconhecido";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                    <!-- retirar acesso -->
                                                    <form class="create-form" action="<?= $BASE_URL ?>/../config/processamentoAdmin.php" method="POST">
                                                        <input type="hidden" name="type" value="adicionar">
                                                        <input type="hidden" name="id" value="<?= $funcionario["id"] ?>">
                                                        <button type="submit" class="btn btn-link p-0">
                                                            <i class="fas fa-plus-circle "></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <!-- retirar acesso -->
                                                    <form class="delete-form" action="<?= $BASE_URL ?>/../config/processamentoAdmin.php" method="POST">
                                                        <input type="hidden" name="type" value="remover">
                                                        <input type="hidden" name="id" value="<?= $funcionario["id"] ?>">
                                                        <button type="submit" class="btn btn-link text-danger p-0">
                                                            <i class="fas fa-minus-square"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <?php endif; ?>
                            </table>
                        </div>
                    </section>
                    <?php if ($totalPaginas > 1) : ?>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php if ($paginaAtual > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link btn btn-primary" href="<?= $BASE_URL ?>/tableAdmin.php?page=<?= $paginaAtual - 1 ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
                                    <li class="page-item <?= $i == $paginaAtual ? 'active' : '' ?>">
                                        <a class="page-link btn btn-primary" href="<?= $BASE_URL ?>/tableAdmin.php?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($paginaAtual < $totalPaginas) : ?>
                                    <li class="page-item">
                                        <a class="page-link btn btn-primary" href="<?= $BASE_URL ?>/tableAdmin.php?page=<?= $paginaAtual + 1 ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>

                <?php else : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <?php if ($_SESSION['cargo'] == 1) : ?>

                                <?php endif; ?>
                            </tr>
                            <tr>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Cargo</th>
                                    <th scope="col" class="text-center">Excluir</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td colspan="9" style="text-align: center;">não existem dados cadastrados</td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
                </main>
            </div>
        </div>
    </div>

    <?php
    include_once("layout/footer.php");
    ?>