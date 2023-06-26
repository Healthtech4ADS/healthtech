<?php
include_once('../config/sessao.php');
include_once("layout/head.php");
include_once("layout/header.php");
include_once("../config/processamentoCliente.php");
?>

<body class="tabela">
     <div class="total">
          <div class="container" style="margin-top:10px;">
               <div>
                    <main class="table">
                         <section>
                         </br>
                              <?php if (!empty($AllClientes) && count($AllClientes) > 0) : ?>
                         </section>
                         <section>
                              <div class="table-responsive">
                                   <table class="table table-striped table-hover">
                                        <thead>

                                             <tr>
                                                  <td colspan="6" class="fs-2"><strong>Clientes</strong></td>
                                                  <td class="text-center">
                                                       <?php if ($_SESSION['cargo'] == 1) : ?>
                                                            <div>
                                                                 <a href=" <?= $BASE_URL ?>/createCliente.php">
                                                                      <i class="fas fa-plus-circle"></i></ion-icon>
                                                                 </a>
                                                            </div>
                                                       <?php endif; ?>
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <th scope="col">Nome</th>
                                                  <th scope="col">Data de Nascimento</th>
                                                  <th scope="col">Email</th>
                                                  <th scope="col">Plano</th>
                                                  <th scope="col" class="text-center">Ver</th>
                                                  <?php if ($_SESSION['cargo'] == 1) : ?>
                                                       <th scope="col" class="text-center">Editar</th>
                                                       <th scope="col" class="text-center">Excluir</th>
                                                  <?php endif; ?>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php foreach ($AllClientes as $cliente) : ?>
                                                  <tr>
                                                       <td><?= $cliente["nome"] ?></td>
                                                       <td><?= $cliente["data_nascimento"] ?></td>
                                                       <td><?= $cliente["email"] ?></td>
                                                       <td><?= $cliente["plano"] ?></td>
                                                       <!-- Elemento de acesso total exclusivo para o nível de acesso 1 (Administrador)
                                                            outros níveis veem apenas referentes ao seu id -->
                                                       <!-- ler -->

                                                       <td class="text-center">
                                                            <a href="<?= $BASE_URL ?>/showCliente.php?id=<?= $cliente["id"] ?>">
                                                                 <i class="fas fa-book"></i>
                                                            </a>
                                                       </td>

                                                       <!-- Elementos exclusivos para o nível de acesso 1 (Administrador) -->
                                                       <!-- atualizar -->
                                                       <?php if ($_SESSION['cargo'] == 1) : ?>
                                                            <td class="text-center">
                                                                 <a href="<?= $BASE_URL ?>/editCliente.php?id=<?= $cliente["id"] ?>">
                                                                      <i class="fas fa-pen-square"></i>
                                                                 </a>
                                                            </td>
                                                            <td class="text-center">
                                                                 <!-- delete -->
                                                                 <form class="delete-form" action="<?= $BASE_URL ?>/../config/processamentoCliente.php" method="POST">
                                                                      <input type="hidden" name="type" value="delete">
                                                                      <input type="hidden" name="id" value="<?= $cliente["id"] ?>">
                                                                      <button type="submit" class="btn btn-link text-danger p-0">
                                                                           <i class="fas fa-minus-square"></i>
                                                                      </button>
                                                                 </form>
                                                            </td>
                                                       <?php endif; ?>

                                                  </tr>
                                             <?php endforeach; ?>
                                        </tbody>
                                   </table>
                              </div>
                         </section>
                         <?php if ($totalPaginas > 1) : ?>
                              <nav aria-label="Page navigation">
                                   <ul class="pagination justify-content-center"> <!-- Add 'justify-content-center' class -->
                                        <?php if ($paginaAtual > 1) : ?>
                                             <li class="page-item">
                                                  <a class="page-link btn btn-primary" href="<?= $BASE_URL ?>/tableCliente.php?page=<?= $paginaAtual - 1 ?>" aria-label="Previous">
                                                       <span aria-hidden="true">&laquo;</span>
                                                       <span class="sr-only">Previous</span>
                                                  </a>
                                             </li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
                                             <li class="page-item <?= $i == $paginaAtual ? 'active' : '' ?>">
                                                  <a class="page-link btn btn-primary" href="<?= $BASE_URL ?>/tableCliente.php?page=<?= $i ?>"><?= $i ?></a>
                                             </li>
                                        <?php endfor; ?>

                                        <?php if ($paginaAtual < $totalPaginas) : ?>
                                             <li class="page-item">
                                                  <a class="page-link btn btn-primary" href="<?= $BASE_URL ?>/tableCliente.php?page=<?= $paginaAtual + 1 ?>" aria-label="Next">
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
                                             <div>
                                                  <a href="<?= $BASE_URL ?>/createFuncionario.php"><i class="fas fa-plus-circle"></i></ion-icon></a>
                                             </div>
                                        <?php endif; ?>
                                   </tr>
                                   <tr>
                                   <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Modalidade</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col" class="text-center">Ver</th>
                                        <?php if ($_SESSION['cargo'] == 1) : ?>
                                             <th scope="col" class="text-center">Editar</th>
                                             <th scope="col" class="text-center">Excluir</th>
                                        <?php endif; ?>
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