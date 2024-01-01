<nav class="navbar navbar-expand navbar-dark bg-black static-top">
    <div class="container-fluid">

        <div class="dropdown">
            <button class="dropdown-toggle btn-sm text-black order-1 order-sm-0 rounded-pill" id="sidebarToggle" href="#" data-toggle="dropdown">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Sidebar -->
            <ul class="sidebarToggle dropdown-menu mt-4">
                <li class="nav-item dropdown-item">
                    <a class="nav-link" href="/">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Overview</span>
                    </a>
                </li>
                <li class="nav-item dropdown-item">
                    <a class="nav-link"></i>
                    <i class="fas fa-fw fa-motorcycle"></i>
                        <span>Motor</span>
                    </a>
                    <ul style="list-style: none;">
                        <li><a class="nav-link" href="/motor/data-motor">
                                <i class="fas fa-fw fa-circle"></i><span>Data Motor</span></a></li>
                        <li><a class="nav-link" href="/motor/input-data-motor">
                                <i class="fas fa-fw fa-circle"></i><span>Input Motor</span></a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown-item">
                    <a class="nav-link"></i>
                    <i class="fas fa-fw fa-users"></i>
                        <span>Customers</span>
                    </a>
                    <ul style="list-style: none;">
                        <li><a class="nav-link" href="/petugas/data-customers">
                                <i class="fas fa-fw fa-circle"></i><span>Data Customes</span></a></li>
                        <li><a class="nav-link" href="/petugas/input-data-customers">
                                <i class="fas fa-fw fa-circle"></i><span>Input Customers</span></a></li>
                    </ul>
                </li>
                <?php if (session()->get('login')['role'] == "owner") {
                    echo '<li class="nav-item dropdown-item">
        <a class="nav-link">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Users</span></a>
            <ul style="list-style: none;">
            <li><a class="nav-link" href="/data-user">
                    <i class="fas fa-fw fa-circle"></i><span>Data Users</span></a></li>
            <li><a class="nav-link" href="/registrasi">
                    <i class="fas fa-fw fa-circle"></i><span>Registrasi</span></a></li>
        </ul>
    </li>';
                }
                ?>
                                <li class="nav-item dropdown-item">
                    <a class="nav-link" href="/petugas/transaksi">
                        <i class="fas fa-fw fa-exchange-alt"></i>
                        <span>Transaksi</span></a>
                </li>
            </ul>
        </div>&nbsp;
        <a style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color : gold;" class="navbar-brand mr-1" href="/">Rentmo King</a>&nbsp;

        <!-- Navbar Search -->
        <?php if ($_SERVER['PHP_SELF'] == "/index.php/petugas/data-customers" || $_SERVER["PHP_SELF"] == "/index.php/motor/data-motor") {
            echo '<form method="post" action="" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>';
        } else {
        }
        ?>

        <!-- Navbar -->
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav ml-auto ml-md-0 justify-content-end">

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="/profil" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/img/<?= session()->get('login')['foto']; ?>" alt="" width="30px" style="border-radius: 50%;"> <?= session()->get('login')['username']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right collapse" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/profil">Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>