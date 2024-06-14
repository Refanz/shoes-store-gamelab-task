<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Users</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Pages</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">List User</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            List User
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-head-bg-primary">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($result->num_rows < 1) {
                                        echo '<tr>
                                                <td class="text-center" colspan="5">
                                                Data sepatu kosong!
                                                </td>
                                              </tr>';
                                    } ?>

                                    <?php foreach ($datas as $row): ?>
                                        <tr>
                                            <td><?= $row[0] ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                            <td><?= $row[4] ?></td>
                                            <td>
                                                <a class="btn btn-primary"
                                                   href="<?= BASE_URL . '/views/pages/admin/users/edit-user.php?id=' . $row[0] ?>">Edit</a>
                                                <a class="btn btn-danger"
                                                   href="<?= BASE_URL . '/actions/delete-user.php?id=' . $row[0] ?>">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>