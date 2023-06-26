<header>

    <!-- Component Start -->
    <div class="sidebar ">

        <div class="top">
            <div class="dots flex">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>

            <div class="logo flex">
                <a href="menu.php">
                    <p>
                        <?php if ($_SESSION["cargo"] == 1) {
                            echo "gerente";
                        } elseif ($_SESSION["cargo"] == 2) {
                            echo "instrutor";
                        } elseif ($_SESSION["cargo"] == 3) {
                            echo "colaborador";
                        } elseif ($_SESSION["cargo"] == 4) {
                            echo "cliente";
                        } else {
                            echo "Visitante";
                        } ?>
                    </p>
                </a>
            </div>
        </div>



        <div class="menu">
            <?php if ($_SESSION['cargo'] != 4) : ?>
            <div class="menu-item flex">
                <div class="icon">
                    <a href="tableFuncionario.php">
                        <i class="fa fa-address-card"></i>
                    </a>
                </div>
                <a href="tableFuncionario.php">
                    <p class="hide" style="--delay: 250ms">Funcionários</p>
                </a>
            </div>
            <?php endif; ?>
            <div class="menu-item flex">
                <div class="icon">
                    <a href="tableCliente.php">
                        <i class="fas fa-users"></i>
                    </a>
                </div>
                <a href="tableCliente.php">
                    <p class="hide" style="--delay: 300ms">Clientes</p>
                </a>
            </div>

            <?php if ($_SESSION['cargo'] == 1) : ?>
            <div class="menu-item flex">
                <div class="icon">
                    <a href="tableAdmin.php">
                        <i class="fas fa-user-cog"></i>
                    </a>
                </div>
                <a href="tableAdmin.php">
                    <p class="hide" style="--delay: 280ms">Admin</p>
                </a>
            </div>
            <?php endif; ?>

            <div class="menu-item flex">
                <div class="icon">
                    <a href="../config/logout.php">
                        <i class="fas fa-sign-out"></i>
                    </a>
                </div>
                <a href="../config/logout.php">
                    <p class="hide" style="--delay: 150ms">logout</p>
                </a>
            </div>
        </div>

    </div>
    <!-- End Sidebar -->

    <!-- Component End  -->
</header>