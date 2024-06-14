<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold"><?= $_SESSION["user"]["name"] ?></span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="u-text">
                                    <h4><?= $_SESSION["user"]["name"] ?></h4>
                                    <p class="text-muted"><?= $_SESSION["user"]["email"] ?></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="<?= BASE_URL . "/actions/logout.php" ?>">
                                <button class="btn btn-link" type="submit">Logout</button>
                            </form>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>