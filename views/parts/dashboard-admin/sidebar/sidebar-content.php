<div class="sidebar-content">
    <ul class="nav nav-secondary">
        <li class="nav-item active">
            <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                <i class="fa fa-home"></i>
                <p>Dashboard</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="dashboard">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="<?= BASE_URL . "/views/pages/admin/index.php" ?>">
                            <span class="sub-item">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#base">
                <i class="fas fa-shoe-prints"></i>
                <p>Shoes</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="base">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="<?= BASE_URL . "/views/pages/admin/product-shoes/add-shoes.php" ?>">
                            <span class="sub-item">Add Shoes</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL . "/views/pages/admin/product-shoes/list-shoes.php" ?>">
                            <span class="sub-item">List Shoes</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#users">
                <i class="fas fa-user"></i>
                <p>Users</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="users">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="<?= BASE_URL . "/views/pages/admin/users/add-user.php" ?>">
                            <span class="sub-item">Add User</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL . "/views/pages/admin/users/list-user.php" ?>">
                            <span class="sub-item">List User</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
    </ul>
</div>