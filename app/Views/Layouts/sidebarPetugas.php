<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item ">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <li class="dropdown nav-item">
        <a class="nav-link dropdown-toggle" id="dropdownMenuButton1" href="#" role="button" data-toggle="dropdown">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Motor</span>
        </a>
        <ul class="dropdown-menu nav-item" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/petugas/data-motor">
                    <i class="fas fa-fw fa-circle"></i><span>Data Motor</span></a></li>
            <li><a class="dropdown-item" href="/petugas/data-motor">
                    <i class="fas fa-fw fa-circle"></i><span>Input Motor</span></a></li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/petugas/customers">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span></a>
    </li>
    <?php if (session()->get('login')['role'] == "Owner") {
        echo '<li class="nav-item">
        <a class="nav-link" href="/user">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Data User</span></a>
    </li>';
    }
    ?>
    <li class="nav-item">
        <a class="nav-link" href="/logout">
            <i class="fas fa-fw fa-minus"></i>
            <span>Logout</span></a>
    </li>
</ul>