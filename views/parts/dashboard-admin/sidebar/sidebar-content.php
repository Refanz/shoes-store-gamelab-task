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
                <i class="fas fa-layer-group"></i>
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
            <a data-bs-toggle="collapse" href="#sidebarLayouts">
                <i class="fas fa-th-list"></i>
                <p>Sidebar Layouts</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="sidebar-style-2.html">
                            <span class="sub-item">Sidebar Style 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="icon-menu.html">
                            <span class="sub-item">Icon Menu</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#forms">
                <i class="fas fa-pen-square"></i>
                <p>Forms</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="forms">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="forms/forms.html">
                            <span class="sub-item">Basic Form</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#tables">
                <i class="fas fa-table"></i>
                <p>Tables</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="tables/tables.html">
                            <span class="sub-item">Basic Table</span>
                        </a>
                    </li>
                    <li>
                        <a href="tables/datatables.html">
                            <span class="sub-item">Datatables</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#maps">
                <i class="fas fa-map-marker-alt"></i>
                <p>Maps</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="maps">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="maps/googlemaps.html">
                            <span class="sub-item">Google Maps</span>
                        </a>
                    </li>
                    <li>
                        <a href="maps/jsvectormap.html">
                            <span class="sub-item">Jsvectormap</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#charts">
                <i class="far fa-chart-bar"></i>
                <p>Charts</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="charts/charts.html">
                            <span class="sub-item">Chart Js</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts/sparkline.html">
                            <span class="sub-item">Sparkline</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a href="widgets.html">
                <i class="fas fa-desktop"></i>
                <p>Widgets</p>
                <span class="badge badge-success">4</span>
            </a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#submenu">
                <i class="fas fa-bars"></i>
                <p>Menu Levels</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="submenu">
                <ul class="nav nav-collapse">
                    <li>
                        <a data-bs-toggle="collapse" href="#subnav1">
                            <span class="sub-item">Level 1</span>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="subnav1">
                            <ul class="nav nav-collapse subnav">
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Level 2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Level 2</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-bs-toggle="collapse" href="#subnav2">
                            <span class="sub-item">Level 1</span>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="subnav2">
                            <ul class="nav nav-collapse subnav">
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Level 2</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <span class="sub-item">Level 1</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>